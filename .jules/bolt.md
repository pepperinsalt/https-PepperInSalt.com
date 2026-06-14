## 2024-05-24 - Database aggregation over Collection aggregation
**Learning:** In Laravel, `->get()->avg('column')` pulls all rows into memory as Eloquent models, and then performs the calculation within PHP. This can become a performance and memory bottleneck if the dataset is large. It's more efficient to perform calculations on the database level using `selectRaw('AVG(column)')` or similar query builder methods.
**Action:** Use database-level aggregations (`AVG()`, `SUM()`, `COUNT()`) where possible instead of using Eloquent collection methods.
