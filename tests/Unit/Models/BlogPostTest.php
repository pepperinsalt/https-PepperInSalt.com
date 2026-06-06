<?php

namespace Tests\Unit\Models;

use App\Models\BlogPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BlogPostTest extends TestCase
{
    use RefreshDatabase;

    public function test_is_published_returns_true_when_status_published_and_published_at_in_past()
    {
        $post = new BlogPost([
            'status' => 'published',
            'published_at' => now()->subDay(),
        ]);

        $this->assertTrue($post->isPublished());
    }

    public function test_is_published_returns_false_when_published_at_in_future()
    {
        $post = new BlogPost([
            'status' => 'published',
            'published_at' => now()->addDay(),
        ]);

        $this->assertFalse($post->isPublished());
    }

    public function test_is_published_returns_false_when_published_at_is_null()
    {
        $post = new BlogPost([
            'status' => 'published',
            'published_at' => null,
        ]);

        $this->assertFalse($post->isPublished());
    }

    public function test_is_published_returns_false_when_status_is_not_published()
    {
        $post = new BlogPost([
            'status' => 'draft',
            'published_at' => now()->subDay(),
        ]);

        $this->assertFalse($post->isPublished());
    }
}
