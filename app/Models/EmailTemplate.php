<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class EmailTemplate extends Model
{
    protected $fillable = [
        'name', 'slug', 'category', 'subject', 'body', 'variables', 'notes', 'is_active',
    ];

    protected $casts = [
        'variables' => 'array',
        'is_active' => 'boolean',
    ];

    protected static function booted(): void
    {
        static::creating(function (EmailTemplate $t) {
            if (empty($t->slug)) {
                $t->slug = Str::slug($t->name);
            }
        });
    }

    public function render(array $data = []): string
    {
        $body = $this->body;
        if (empty($body)) {
            return (string) $body;
        }
        foreach ($data as $key => $value) {
            $body = preg_replace('/\{\{\s*'.preg_quote($key, '/').'\s*\}\}/', str_replace('$', '\$', (string) $value), $body);
        }

        return $body;
    }
}
