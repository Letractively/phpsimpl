# Introduction #

The Simpl class is the main class for Simpl framework, its task is to load classes and to clear the various caches globally.

When including Simpl in your web application this is the only class that is loaded. It is used for loading additional classes during runtime.

# Example #

```
// Simpl Framework
include_once(FS_SIMPL . 'simpl.php');
```

# Functions #

**Simpl**
```
__construct() -> NULL
```
Main Class Constructor. It will clear the cache is there is a _GET['clear'] used._

**Load (depricated)**
```
Load($classname) -> Boolean
```
Load a Simpl Class and returns if it was successfully included or not. Include happens just once so Load() can be called multiple times without conflict. This function was depricated after Rev. 187 when Simpl went PHP5 only. Classes are now loaded automatically with the autoload function.

**Cache**
```
Cache($action) -> Boolean
```
Use to clear all the cache, or just the table cache or just the query cache. Returns if the cache was successfully cleared.