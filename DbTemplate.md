# Introduction #

The DbTemplate class is used to mirror a database table. No setup is needed, just give the class the database and table names and it does all the work for you. The table structure is cached to improve performance.

# Example #
```
CREATE TABLE `author` (
  `author_id` int(10) unsigned NOT NULL auto_increment,
  `date_entered` datetime NOT NULL,
  `first_name` varchar(32) NOT NULL,
  `last_name` varchar(32) NOT NULL,
  `email` varchar(48) NOT NULL,
  PRIMARY KEY  (`author_id`),
  UNIQUE KEY `email` (`email`)
)

class Author extends DbTemplate {
	/**
	 * Class Constuctor
	 * 
	 * @param $data array
	 * @return null
	 */
	function __construct(){
		// Call the parent constructor
		parent::__construct('author', DB_DEFAULT);
		
		// Set the required
		$this->SetRequired(array('first_name','last_name','email'));
		
		// Set the Display
		$this->SetDisplay(array('first_name','last_name','email'));
	}
}

// Create the Author Class
$myAuthor = new Author;

// If they are saving the Information
if ($_POST['submit_button'] == 'Save Author'){
	// Get all the Form Data
	$myAuthor->SetValues($_POST);
	
	// Save the info to the DB if there is no errors
	if ($myAuthor->Save())
		SetAlert('Author Information Saved.','success');
}

// If Deleting the Page
if ($_POST['submit_button'] == 'Delete'){
	// Get all the form data
	$myAuthor->SetValues($_POST);
	
	// Remove the info from the DB
	if ($myAuthor->Delete()){
		// Set alert and redirect
		SetAlert('Author Deleted Successfully','success');
		header('location:authors.php');
		die();
	}else{
		SetAlert('Error Deleting Author, Please Try Again');
	}
}

// Set the requested primary key and get its info
if ($_GET['id'] != '' && $myAuthor->GetPrimary() == ''){
	// Set the priarmy key
	$myAuthor->SetPrimary((int)$_GET['id']);
	
	// Try to get the information
	if (!$myAuthor->GetInfo()){
		SetAlert('Invalid Author, please try again');
		$myAuthor->ResetValues();
	}
}

// Report status to the user
Alert(GetAlert('success'),'success');

<form name="form_author" id="form_author" method="post" action="<?php echo $_SERVER['REQUEST_URI']; ?>">
  <?php $myAuthor->Form(); ?>
  <fieldset class="submit_button">
    <div class="submit">
      <label for="submit_button">&nbsp;</label><input type="submit" name="submit_button" id="submit_button" value="Save Author" />
      <?php echo ($myAuthor->GetPrimary() != '')?' <input name="submit_button" type="submit" value="Delete" />':''; ?>
    </div>
  </fieldset>
</form>
```

## Form Output ##
![http://phpsimpl.com/images/examples/dbtemplate-style.png](http://phpsimpl.com/images/examples/dbtemplate-style.png)

# Functions #
**construct**
```
__construct($table, $database) -> Boolean
```
Creates an instance of the DbTemplate class. This function is actually not called since this class should always be extended.

**[GetInfo](DbTemplate_GetInfo.md)**
```
GetInfo($fields, $conditions) -> Boolean
```
Pull a single result from the database based on the primary\_key or based on a set of conditions. All fields will be pulled in to the class unless the $fields array is passed to the function.

**[Save](DbTemplate_Save.md)**
```
Save($options=array()) -> Boolean
```
Save the class data into the database. This will automatically insert or update depending on if the primary key is set. If the function inserts then the newly inserted key will be set in the class. The options array is used primarily to determine the next display order. The same object must be passed in the array with fields set and it will automatically determine the next available display order before inserting into the database.

**Delete**
```
Delete($options=array()) -> Boolean
```
Deletes from the database where the primary key is equal to the class. The options array is used in the same manner the Save $options is used. If there is a display order a helper class can be passed to ensure the display order stays in intact.

**GetList**
```
GetList($fields, $order_by, $sort, $offset, $limit) -> Array
```
Gets a list of the items in the database matching the values set in the class. The fields array will limit the fields returned. Order\_by is the field to order by and Sort is the ASC/DESC. $offset and $limit can be used to only pull certain amounts of fields at a time.

**Search**
```
Search($keywords, $search_fields, $return_fields) -> Int
```
Similar to the GetList except it uses regular expressions to search through the database in the array of $search\_fields for the string $keywords. Once it finds records it sets them to the $this->results array and returns the number of items found.

**GetAssoc**
```
GetAssoc($field, $order_by, $sort, $offset, $limit) -> Array
```
Used to get an associative array for a single field with the primary key as the array key and the value as the array value. This is very helpful when populating a drop down list since this can used directly in an $options array.

**Move**
```
Move($direction, $options) -> Array
```
Move the object up or down in display order depending on the options set in the $options array object passed.

**FormField**
```
FormField($field, $hidden, $options, $config) -> Null
```
Displays an individual xhtml form field to the screen with its options and config values. $field is a string of the field and $hidden is a boolean.

**Form**
```
Form($display, $hidden, $options, $config, $omit) -> Null
```
Display an xhtml form with all the fields in the $display, if $display is not an array all fields will be displayed that are not in the $omit array.

**View**
```
View($display, $options) -> Null
```
View all the fields associated with the class and their values in a table format. $display array can limit the fields show and the $options array can be used to associate keys with their values.

**DisplayList**
```
DisplayList($display, $format, $options, $force_check) -> Null
```
Display a list of the $this->results array in a table format. The $display array determines what columns will be shown. The $format array can be used to create links inside of the table cell. $options array can be used to associate keys with their values. And the $force\_check boolean can be used to re-pull the data from the database before displaying the table.

**SetPrimary**
```
SetPrimary($value) -> Boolean
```
Set the value of the primary key for the table.

**GetPrimary**
```
GetPrimary() -> Mixed
```
Get the value of the primary key for the table.

**SetValue**
```
SetValue($field, $value) -> Boolean
```
Set the $value of a certain $field for the table.

**Results**
```
Results($type) -> Mixed
```
Return the results array in various formats. Types are: "array", "json". Default type is an array.

**Join**
```
Join($join_class, $join_on, $type) -> Boolean
```
Used to join the current class with another DbTemplate class. This allows the GetList to cross tables and join another table on the $join\_on field with a join $type.