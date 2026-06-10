## 2025-02-23 - Eloquent Collection Avg vs Query Builder Avg
**Learning:** Loading all models into an Eloquent Collection via `get()` and then calling `avg()` can be a significant memory and processing bottleneck when the dataset is large. Calling `avg()` directly on the Query Builder pushes the aggregation to the database level, which is substantially faster.
**Action:** When calculating aggregations (like averages, counts, max/min), perform them on the Query Builder before fetching results unless you already need the hydrated models for other operations in memory.
