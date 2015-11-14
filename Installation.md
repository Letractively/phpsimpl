# Introduction #

  1. Download the newest version of Simpl from this site.
  1. Copy the "simpl" directory to your web root (ex. /usr/local/www/). _It is not required to install in a web viewable directory_
  1. Define some basic directories for Simpl
```
// Directories
// Always Include trailing slash "/" in Direcories
define('DIR_ABS', '/usr/local/www/mysite/');
define('FS_SIMPL', DIR_ABS . 'simpl/');
define('FS_CACHE', DIR_ABS . 'cache/');

// Database Connection Options
define('DB_USER', '');
define('DB_HOST', '');
define('DB_PASS', '');
define('DB_DEFAULT', '');
```
  1. Include the Simpl class
```
// Simpl Framework
include_once(FS_SIMPL . 'simpl.php');
```
  1. Connect to the database
```
// Make the DB Connection
$db = new DB;
$db->Connect();
```
  1. Include your application level classes and you are good to go


## Next Step ##
Read the [BaseClasses](BaseClasses.md) page to get a full understanding of Simpl's abilities.
