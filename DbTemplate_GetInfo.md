# Introduction #

GetInfo() is used to pull a single result from the database based on the primary\_key of the table and class or a set of conditions

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

// Set the requested primary key and get its info
if ($_GET['id'] != ''){
	// Set the priarmy key
	$myAuthor->SetPrimary((int)$_GET['id']);
	
	// Try to get the information
	if (!$myAuthor->GetInfo()){
		SetAlert('Invalid Author, please try again');
		$myAuthor->ResetValues();
	}
}else if ($_GET['email'] != ''){
	// Get the author information by email
	$conditions = array('email' => (string)$_GET['email']);
	
	// Try to get the information
	if (!$myAuthor->GetInfo(NULL, $conditions)){
		SetAlert('Invalid Author, please try again');
		$myAuthor->ResetValues();
	}
}

// View the Authors information
$myAuthor->View();
```

## GetInfo ##
```
GetInfo($fields = array(), $conditions = array()) -> Boolean
```
Pull a single result from the database based on the primary\_key or based on a set of conditions. All fields will be pulled in to the class unless the $fields array is passed to the function.

```
$fields = array('first_name', 'last_name', 'email');

$conditions = array(
  'email' => (string)$_GET['email'],
  'first_name' => 'Joe'
);
```