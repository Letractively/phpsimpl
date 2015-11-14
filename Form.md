# Introduction #

The form class is used to take in a set of field objects and interact with them as a single form. It performs actions on the whole group of fields at a time making life easier. Its main purpose is to act as a base to interact with form elements and is extended by the DbTemplate class.

# Example #
_Need Example_

# Functions #
**construct**
```
__construct($data, $required=array(), $labels=array(), $examples=array()) -> Boolean
```
Creates a Form Class with all the information to use the Form functions. It sets all the data for the form objects such as its value, if it is required or not, what its label is and if there is any example of input for the field. All of the arrays passed to this function are in this format:
```
$data['field_key'] = value
```

**Validate**
```
Validate() -> Boolean
```
Validate all the fields in the form and return if any of the fields are not valid. The error statements are all stored in their respecitve field objects.

**CheckRequired (depricated)**
```
CheckRequired() -> Array
```
Validate all the fields in the form and returns an array of errors. This has been replaced by the Validate function after Rev 187 but is still available for backwards compatibility.

**Get**
```
Get($property, $field) -> Mixed
```
Return a specific property of a field in the array. Null is returned if the field does not exists.

**Set**
```
Set($property, $field, $value) -> Boolean
```
Set a specific property of a field in the form. Null is returned if the field does not exist.

**GetValue**
```
GetValue($field) -> Mixed
```
Shortcut to "Get('value', $field)" to make code easier to read.

**SetValue**
```
SetValue($field, $value) -> Boolean
```
Shortcut to "Set('value', $field, $value)" to make code easier to read.

**GetError**
```
GetError($field) -> Mixed
```
Shortcut to "Get('error', $field)" to make code easier to read.

**SetError**
```
SetError($field, $value) -> Boolean
```
Shortcut to "Set('error', $field, $value)" to make code easier to read. The value statement can be an array and the elements will be seperated by linebreaks "<br />" for easy readability.

**IsError**
```
IsError() -> Boolean
```
Returns if any field in the class has an error.

**GetErrors**
```
GetErrors() -> Array
```
Returns an array of all the fields with errors in an associative array with the key being the field names.

**GetLabel**
```
GetLabel($field, $append) -> String
```
Gets the label of any field in the class. This is very useful if trying to formulate email content from a form and instead of showing "is\_active: Yes" the GetLabel('is\_active', ':') would result in "Active: Yes". A much more human readable format

**GetFields**
```
GetFields() -> Array
```
Returns an array of the field names in the form.

**IsField**
```
IsField($field) -> Boolean
```
Checks to see if a field exists in the form.

**SetValues**
```
SetValues($data) -> Boolean
```
Takes an array of data and sets it to all the values of each field in the form. The $data array is an associative array with the field name being the key. This is a quick way to set the values of a form from the _POST values of a form. Here is an example:
```
$myForm->SetValues($_POST);
```_

**ResetValues**
```
ResetValues() -> Boolean
```
Resets all the values and errors of the fields in a form. The errors for the fields are also reset.

**GetValues**
```
GetValues() -> Array
```
Returns an array of all the values of the fields in a form. This array is an associative array with the field name being the key and the data being the value.

**GetRequired**
```
GetRequired() -> Array
```
Returns an array of all the required field names in the form.

**SetRequired**
```
SetRequired($fields) -> Boolean
```
Set the required fields in the class and returns if it was successful. $fields is an array with the fields names in it.

**SetDisplay**
```
SetDisplay($fields) -> Boolean
```
Set the display fields for the class. This allows the user to set a default display for the class right in the class constructor. Allowing the class to be displaying on multiple pages without having to change the default display on each page.

**SetHidden**
```
SetHidden($fields) -> Boolean
```
Set the hidden fields for the class. This allows the user to set a default hidden fields for the class right in the class constructor. Allowing the class to be displaying on multiple pages without having to change the default hidden fields on each page.

**SetOmit**
```
SetOmit($fields) -> Boolean
```
Set the omitted fields for the class. This allows the user to set a default omitted fields for the class right in the class constructor. Allowing the class to be displaying on multiple pages without having to change the default omitted fields on each page.

**SetDefaults**
```
SetDefaults($fields) -> Boolean
```
Set the default values for fields in the class. This is only used on the Form() functions and allows the user to set default values that will be outputted to the form. For example having "is\_active" automatically set to "true" so the checkbox is already check when the user goes to enter the form for the first time.

**SetOptions**
```
SetOptions($options) -> Boolean
```
Set the default options for the fields in the class. This is used to put options into variables in a class that will be used multiple times on a site. A good example is the "States" field in a signup form. The States will always stay the same so there is no need to redefine them on each page the form is used. This allows it to be defined once and be used everywhere.

**SetOptions
```
SetOption($field, $options, $first) -> Boolean
```
Set the options for an individual field. You can optionally send a third parameter to prepend an element to the options list. This is useful if you are pulling the data from a database and using GetAssoc() then calling this function like: $myPost->SetOption('author\_id', $options, 'Please Select an Author');**

**SetConfig**
```
SetConfig($config) -> Boolean
```
Set the default config for the fields in the form. This is useful when you always want something to be a checkbox or a radio button or even an upload form. If you do not want to worry about defining it on every page this allows it to be defined once and then used on every page.

**SimpleFormat**
```
SimpleFormat() -> String
```
Returns the class in a simple format that is human readable. This is very helpful for debugging and is used by Simpl when DEBUG define is set to true.

**Form**
```
Form($display, $hidden, $options, $config, $omit) -> Null
```
Display an XHTML compliant form to the user that includes all the fields in the $display. If $display is not an array it will display all the fields that are not in the $omit array. The $options and $config arrays are associative arrays with the field names as keys. They will be passed to each field individually by their key.

**FormField**
```
FormField($field, $hidden, $options, $config) -> Null
```
Display an XHTML compliant individual form field to the user. Will use the predefined hidden, options and config unless passed to this function which will overwrite the defaults.

**MultiForm**
```
MultiForm($display, $hidden, $options, $config, $omit) -> Null
```
Display an XHTML compliant form with [.md](.md) brackets at the end of the input names. This allows the set of fields to be displayed multiple times in a single form element and no data is overwritten. [Example](http://nickdenardis.blogspot.com/2007/04/multiplication.html)

**MultiFormField**
```
MultiFormField($field, $hidden, $options, $config) -> Null
```
Display an XHTML compliant form field with [.md](.md) brackets at the end of the input names. This allows the field to be displayed multiple times in a single form element and no data is overwritten.

