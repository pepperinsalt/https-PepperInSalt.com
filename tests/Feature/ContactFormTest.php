<?php

namespace Tests\Feature;

use App\Mail\ContactInquiry;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class ContactFormTest extends TestCase
{
    private function validPayload(array $overrides = []): array
    {
        return array_merge([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'service' => 'Web Design & Development',
            'budget' => '$3,000 – $7,500',
            'message' => 'Hello, I would like to start a project with you.',
        ], $overrides);
    }

    public function test_valid_submission_redirects_with_success(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload())
            ->assertRedirect()
            ->assertSessionHas('success');
    }

    public function test_valid_submission_sends_contact_inquiry_email(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload());

        Mail::assertSent(ContactInquiry::class, function (ContactInquiry $mail) {
            return $mail->senderName === 'Jane Smith'
                && $mail->senderEmail === 'jane@example.com';
        });
    }

    public function test_name_is_required(): void
    {
        $this->post('/contact', $this->validPayload(['name' => '']))
            ->assertSessionHasErrors('name');
    }

    public function test_email_is_required(): void
    {
        $this->post('/contact', $this->validPayload(['email' => '']))
            ->assertSessionHasErrors('email');
    }

    public function test_email_must_be_valid(): void
    {
        $this->post('/contact', $this->validPayload(['email' => 'not-an-email']))
            ->assertSessionHasErrors('email');
    }

    public function test_message_is_required(): void
    {
        $this->post('/contact', $this->validPayload(['message' => '']))
            ->assertSessionHasErrors('message');
    }

    public function test_optional_fields_may_be_omitted(): void
    {
        Mail::fake();

        $this->post('/contact', $this->validPayload(['service' => null, 'budget' => null]))
            ->assertRedirect()
            ->assertSessionHas('success');
    }

    public function test_name_enforces_max_length(): void
    {
        $this->post('/contact', $this->validPayload(['name' => str_repeat('a', 101)]))
            ->assertSessionHasErrors('name');
    }

    public function test_message_enforces_max_length(): void
    {
        $this->post('/contact', $this->validPayload(['message' => str_repeat('a', 3001)]))
            ->assertSessionHasErrors('message');
    }

    public function test_rate_limit_rejects_after_five_submissions(): void
    {
        Mail::fake();

        for ($i = 0; $i < 5; $i++) {
            $this->post('/contact', $this->validPayload())->assertRedirect();
        }

        $this->post('/contact', $this->validPayload())->assertStatus(429);
    }
}
