## 2026-06-12 - [Cache Sitemap Generation]
**Learning:** Generating the sitemap dynamically on each request can be slow and unnecessary, particularly for paths that do not change constantly. In Laravel, using `Spatie\Sitemap\Sitemap::create()` can be cached by fetching its `render()` string output instead of generating a response dynamically.
**Action:** Always consider caching the outputs of CPU/memory intensive operations, such as sitemap generation, that do not require real-time updates.
