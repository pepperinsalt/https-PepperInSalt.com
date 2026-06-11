## 2024-06-04 - Hydration bottleneck on dashboard widget
**Learning:** Loading large amounts of Eloquent models into memory (e.g. `->get()`) just to perform collection methods like `->avg()` can create significant memory and performance bottlenecks, especially in high-traffic areas like dashboard widgets.
**Action:** Use SQL aggregation (`->selectRaw('AVG(column)')->first()`) to offload calculations to the database whenever models don't need to be hydrated.
