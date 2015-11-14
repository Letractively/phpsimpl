## SVN ##

## Version 0.8.5 ##
  * Updated example
  * Completely rewritten Export class with CVS, JSON, XML and SQL support
  * Export() function on DbTemplate for seamless exporting
  * Removed the requirement to have DB\_DEFAULT defined
  * DisplayList() now places a &nbsp; for NULL table values for IE border support
  * GetList() and Join() now support cross database queries
  * Added the "required" class to the field items that are required
  * DisplayList() $options can now take a function name as a value for a field.
  * Added the DateTimeDiff() function to the global functions to produce a human readable "time ago" output.
  * Added a type of "settings" for forms to manipulate the Form::Form() function output.
  * A few bug fixes.

## Version 0.8.4 ##
  * Removed all dependency on a Primary Key except for the Move() function
  * Added the IsConnected() function for the DB object
  * Added the Insert() and Update() functions for tables without primary key
  * Added the ID to the hidden form fields.
  * Fixed issue with double quotes being in hidden fields, the would close the HTML tag.
  * Fix for 12/31/1969 problem in DbTemplate:SetValue()
  * Fixed problem with IE-7 and popup-calendar location
  * Fix for invalid date input on Form::SetValues()
  * Fixed an issue with the export when there is no display passed

## Version 0.8.3 ##
  * Added the SetConditions() function.
  * Added some accessor and setter functions for the folder name since it is protected.
  * Added the SetPrefix() function to the form class which will transform the field names from just the name to a prefix array so name="first\_name" would turn into name="personal[first\_name](first_name.md)".
  * Added the ResetErrors() function to reset the errors from a form Validate().
  * Added to the view not to display if a field is hidden or omitted.
  * Added the SetMultiCount() to the DbTemplate so the menu count can be set manually if an object is individualized and not grouped.
  * Added the DIR\_CLASSES lookup to the autoload function. This will allow autoloading of the actual application classes automatically instead of by hand.
  * Added the GroupBy() function which works like the SetConditions().
  * Forced the DbTemplate results array to always be reset on GetList() it was in all the other query functions except GetList().
  * Fixed issue where the form fields were not being created correctly in the Form class.
  * A few bug fixes.

## Version 0.8.2 ##
  * Added a debug.log file to debug a live site in real time, best used with “tail -f”
  * Added the ErrorMessages() function to summarize a forms errors, similar to Rails.
  * Added the SetConditions() function so querying for >, <, <=, LIKE and OR’s are all possible now.
  * Added a Get and Set Folder name functions in the Folder Class.
  * DisplayList() now uses the options of a field to display in the list.
  * RowsAffected() now works like it should.
  * Fixed the Debug Query to work again.

## Version 0.8.1 ##
  * Slightly Updated Example
  * Fixed the form label "?:" issue
  * Better support for tables without a primary key
  * Fixed the SimpleFormat to display values properly and renamed it to Nice()
  * Change DB now counted as a query
  * View() now goes off the default field display first
  * Security Updates related to SQL injection

## Version 0.8.0 ##
  * SetOption now accepts objects
  * Compressed the JS and CSS for the calendar
  * Change the time fields to human readable format
  * Fixed issue with Save() and display\_order
  * Minor bug fixes

## Version 0.8.0-rc1 ##
  * Search now interacts with Joined tables
  * Issues with PHP 5.2.1 and the DB Sessions have been resolved
  * A new way to extend DbTemplate was implemented to be the final API
  * Added the SetLabels and SetExamples functions to the form
  * Added a GetLabel function for easier access to fields labels
  * Minor bug fixes

## Version 0.8.0-beta1 ##
  * MultiForm function to extend the Form output
  * Options, Config and Defaults can now be set in a single location
  * Full Javadoc Documentation
  * Form Display, Hidden and Omit can not be set in a single location
  * Omit fields are omitted from the INSERT and UPDATE statement

## Version 0.7.0 ##
  * Strong validation which can be extended to include any regular expressions
  * Session storage in a database with a single DB\_SESSIONS flag and table

## Version 0.6.0 ##
  * Transformed to work exclusively with PHP5
  * Class files renamed to match their class name
  * Fixed the Form upload file not being able to remove just the file issue
  * Delayed database connections, the DB will not connect till the first query is executed

## Version 0.5.0 ##
  * Query caching
  * Added additional classes so the framework could be well rounded

## Version 0.4.0 ##
  * The ability to Join classes together for the GetList
  * An example site was added to the Repo

## Version 0.3.0 ##
  * Changed the API a little to be more standard
  * Submission to Google Code and API documentation

## Version 0.2.0 ##
  * DbTemplate as a single class to be extended
  * Table structure caching to improve performance

## Version 0.1.0 ##
  * Set of functions that implemented CRUD but were implemented in every class