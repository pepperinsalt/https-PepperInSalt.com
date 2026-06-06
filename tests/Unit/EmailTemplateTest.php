<?php

namespace Tests\Unit;

use App\Models\EmailTemplate;
use PHPUnit\Framework\TestCase;

class EmailTemplateTest extends TestCase
{
    public function test_it_replaces_variables_without_spaces(): void
    {
        $template = new EmailTemplate;
        $template->body = 'Hello {{name}}!';

        $result = $template->render(['name' => 'Alice']);

        $this->assertEquals('Hello Alice!', $result);
    }

    public function test_it_replaces_variables_with_spaces(): void
    {
        $template = new EmailTemplate;
        $template->body = 'Hello {{ name }}!';

        $result = $template->render(['name' => 'Bob']);

        $this->assertEquals('Hello Bob!', $result);
    }

    public function test_it_replaces_multiple_variables_and_repeated_variables(): void
    {
        $template = new EmailTemplate;
        $template->body = '{{ greeting }} {{ name }}! Your total is {{ amount }}. Goodbye {{name}}!';

        $result = $template->render([
            'greeting' => 'Hi',
            'name' => 'Charlie',
            'amount' => '$10.00',
        ]);

        $this->assertEquals('Hi Charlie! Your total is $10.00. Goodbye Charlie!', $result);
    }

    public function test_it_ignores_extraneous_variables_in_template(): void
    {
        $template = new EmailTemplate;
        $template->body = 'Hello {{ name }}, where is {{ other }}?';

        $result = $template->render(['name' => 'Dave']);

        $this->assertEquals('Hello Dave, where is {{ other }}?', $result);
    }

    public function test_it_ignores_extra_data_variables(): void
    {
        $template = new EmailTemplate;
        $template->body = 'Hello {{ name }}!';

        $result = $template->render([
            'name' => 'Eve',
            'ignored' => 'Value',
        ]);

        $this->assertEquals('Hello Eve!', $result);
    }

    public function test_it_handles_empty_body(): void
    {
        $template = new EmailTemplate;
        $template->body = '';

        $result = $template->render(['name' => 'Frank']);

        $this->assertEquals('', $result);
    }

    public function test_it_handles_null_body(): void
    {
        $template = new EmailTemplate;
        $template->body = null;

        $result = $template->render(['name' => 'Grace']);

        $this->assertEquals('', $result);
    }

    public function test_it_handles_empty_data_array(): void
    {
        $template = new EmailTemplate;
        $template->body = 'Hello {{ name }}!';

        $result = $template->render([]);

        $this->assertEquals('Hello {{ name }}!', $result);
    }
}
