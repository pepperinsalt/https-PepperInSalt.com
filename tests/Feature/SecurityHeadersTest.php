<?php

namespace Tests\Feature;

use PHPUnit\Framework\Attributes\DataProvider;
use Tests\TestCase;

class SecurityHeadersTest extends TestCase
{
    #[DataProvider('securityHeaders')]
    public function test_security_header_is_present(string $header, string $expectedValue): void
    {
        $this->get('/')->assertHeader($header, $expectedValue);
    }

    public static function securityHeaders(): array
    {
        return [
            'X-Content-Type-Options' => ['X-Content-Type-Options', 'nosniff'],
            'X-Frame-Options' => ['X-Frame-Options', 'SAMEORIGIN'],
            'X-XSS-Protection' => ['X-XSS-Protection', '1; mode=block'],
            'Referrer-Policy' => ['Referrer-Policy', 'strict-origin-when-cross-origin'],
            'Permissions-Policy' => ['Permissions-Policy', 'camera=(), microphone=(), geolocation=()'],
        ];
    }
}
