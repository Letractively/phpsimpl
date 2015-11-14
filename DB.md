# Introduction #

The DB class is used for interacting with a MySQL database. It wraps the function calls in a simple to use class that can be abstracted further if needed.

# Example #
```
// Make the DB connection
$db = new DB;

// Connect to the database
$db->Connect($server, $username, $password, $database);

// Create the query
$query = 'SELECT * FROM `users` WHERE `is_active` = 1 ORDER BY `last_name` ASC';

// Query the database
$result = $db->Query($query);

// If there are Rows
if ($db->NumRows($result) > 0){
  // Loop through all the records
  while ($info = $db->FetchArray($result)){
    // Set the Users Info
    $myUser->SetValues($info);

    // Disable the User
    $myUser->SetValue('is_active', 0);

    // Save the Users Info
    $myUser->Save();
  }
}

// Close the DB connection
$db->Close();
```

# Functions #
**DB**
```
DB() -> NULL
```
Constructor used to reset if the database is connected and reset the query\_count. This should only be called once.

**Connect**
```
Connect($server, $username, $password, $database) -> Boolean
```
Makes the initial connection to the database. In actuality it does not connect at this time but stores the information and waits for the actual first query to avoid query less connections.

**Query**
```
Query($query) -> MySQL Resource
```
Takes a raw query and returns the result from the database. If this query is cached then it will return an array else it will return a MySQL resource.

**Perform**
```
Perform($table, $data_array, $action, $parameters, $database) -> MySQL Resource
```
Will take an array and perform the action on the database table. It will automatically format the insert or update query. Action can be "insert" or "update"

**Close**
```
Close() -> Boolean
```
Close the database connection if the database is connected and returns the result.

**Change**
```
Change($datebase) -> Boolean
```
Change the current database to another and returns if it was successful.

**FetchArray**
```
FetchArray($result) -> Array
```
Takes a MySQL Result Resource or array from the query and returns the next item in the results.

**NumRows**
```
NumRows($result) -> Int
```
Returns the number of items in a results array.

**InsertID**
```
InsertID() -> Int
```
Returns the last inserted ID into the database.

**FreeResult**
```
FreeResult($result) -> Boolean
```
Frees the results from memory.

**FetchField**
```
FetchField($result) -> MySQL Object
```
Fetches the Field information and returns the MySQL object of the field.

**FieldLength**
```
FieldLength($result) -> Int
```
Returns the length of a specific field.

**Output**
```
Output($string) -> String
```
Formats a string from the database for use on the page.

**Prepare**
```
Prepare($string) -> String
```
Prepares a string to be inserted into the database. Depending on its type will add slashes  or real escape string. This prevents most SQL injection attacks.