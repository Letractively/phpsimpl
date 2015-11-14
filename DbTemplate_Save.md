# Introduction #

Save() function is used to take the values from the class and transfer them to the database, it will auto detect if a primary key is present and insert or update based on its value.

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

// Report status to the user
Alert(GetAlert('success'),'success');

// Author Form
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

## Save ##
```
Save($options=array(), $force='', $force_on=array()) -> Boolean
```
The basic save just interacts with the database and the single local object. The first parameter $options is to be used if there is a display\_order field in the table. $options is an associative array with the key being the field name and the data being an object to compare with. So a similar item but with certain parameters set to determine the next display\_order in the list, the new item will be placed at the bottom.

The $force can be a string of either "insert" or "update", this can be used at any time but should always be used on table without a primary key.

$force\_on is an associative array with the key=>data pairs to force the update on, for example it would produce the WHERE statement in the following SQL command.

```
"UPDATE `author` SET `first_name` = 'Joe' WHERE `email` = 'joe@domain.com'
```

'date\_entered' and'created\_on' fields will automatically be set to NOW() when inserting. The 'last\_updated' and 'updated\_on' fields will be updated automatically if updating.

```
$options = array(
  'first_name' => $myObject
);
  
$force = (string)'insert' or 'update'

$force_on = array(
  'email' => (string)'joe@domain.com'
);
```