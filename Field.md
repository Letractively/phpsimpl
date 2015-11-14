# Introduction #

The field class is used to represent one field in a form, from its value to label to validation type.

# Example #
```
// Set all the field info
$myField = new Field;
$myField->Set('name', 'q');
$myField->Set('value', '');
$myField->Set('required', true);
$myField->Set('label', 'Search');
$myField->Set('example', 'DbTemplate prototype');

// Display an XHTML form
echo '<form name="find" id="find" method="get" action="/">';
echo '<fieldset><legend>PHPSimpl Search</legend>';
$myField->Form();
echo '<label for="search">&nbsp;</label><input type="submit" name="submit" value="Search" id="search" class="submit" />';
echo '</fieldset>';
echo '</form>';
```

## Base Output ##
![http://phpsimpl.com/images/examples/field-nostyle.png](http://phpsimpl.com/images/examples/field-nostyle.png)

## Same Output w/Stylesheet ##
![http://phpsimpl.com/images/examples/field-style.png](http://phpsimpl.com/images/examples/field-style.png)

# Functions #
**Field**
```
__construct() -> Boolean
```
Sets up the field class.

**Get**
```
Get($property) -> Mixed
```
Returns the value of a property associated with the field.

**Set**
```
Set($property, $value) -> Boolean
```
Set the value for a certain property for a field and returns if it was successful.

**Validate**
```
Validate() -> Boolean
```
Validate the field object against it being required, its regular expression type and its length.

**Label**
```
Label($append) -> String
```
Get a human readable label for the field and append the ending if desired.

**Form**
```
Form($options, $config) -> NULL
```
Printed to the screen an XHTML compliant form based on the field type and values. $options can be an object which will call the Form() function of that object to display its particular form or if $options is an array depending on the $config type will display a drop-down, radio buttons or checkboxes.

**View**
```
View($options) -> NULL
```
Prints to the screen a line item of a table of this field. The first th will be the label and the second a td with its value and meshed with the $options array if given.


