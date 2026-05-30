<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class PagesTest extends TestCase
{
    #[DataProvider('publicPages')]
    public function test_all_public_pages_return_200(string $url): void
    {
        $this->get($url)->assertStatus(200);
    }

    public static function publicPages(): array
    {
        return [
            'home' => ['/'],
            'about' => ['/about'],
            'services' => ['/services'],
            'work' => ['/work'],
            'skills' => ['/skills'],
            'experience' => ['/experience'],
            'contact' => ['/contact'],
        ];
    }

    public function test_404_returns_custom_error_page(): void
    {
        $this->get('/this-page-does-not-exist')->assertStatus(404);
    }

    public function test_sitemap_returns_xml(): void
    {
        $this->get('/sitemap.xml')
            ->assertStatus(200)
            ->assertHeaderContains('Content-Type', 'xml');
    }

    public function test_robots_txt_file_disallows_admin(): void
    {
        $path = public_path('robots.txt');
        $this->assertFileExists($path);
        $this->assertStringContainsString('Disallow: /admin', file_get_contents($path));
    }
}
