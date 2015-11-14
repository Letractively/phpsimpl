# Introduction #

The export class is used to output the data arrays into CSV, XML, JSON and SQL file formats.

# Example 1 #
```
// Create the RSVP class
$myRSVP = new RSVP;

// Only pull the attending RSVPs
$myRSVP->SetValue('attending', 1);

// Define what fields to display in the export
$display = array('date_entered', 'first_name', 'last_name');

// Get the list of RSVPs
$myRSVP->GetList($display, 'date_entered', 'ASC');

// Create the Export object
$myExport = new Export($myRSVP->results, $display, 'rsvp_list');

// Get the output in csv
$csv_output = $myExport->Retrieve('csv');

// Or force the Download
$myExport->Download('csv');
```

# Example 2 #
```
// Create the RSVP class
$myRSVP = new RSVP;

// Only pull the attending RSVPs
$myRSVP->SetValue('attending', 1);

// Define what fields to display in the export
$display = array('date_entered', 'first_name', 'last_name');

// Get the list of RSVPs
$myRSVP->GetList($display, 'date_entered', 'ASC');

/* Access the Export function right inside a DbTemplate class */

// Get the output in csv
$csv_output = $myRSVP->Export('csv', $display);

// Or force the Download
$myRSVP->Export('csv', $display, 'rsvp_list', 'download');
```


# Functions #
**construct**
```
__construct($data, $display, $filename) -> Null
```
Sets up the export and takes in all the data, the display fields and the filename if any. All fields are optional.

**SetFilename**
```
SetFilename($filename) -> Boolean
```
Sets the filename for download of the export

**SetDisplay**
```
SetDisplay($display) -> Boolean
```
Takes an array of strings which will be the first line of the exported csv file.

**SetData**
```
SetData($data) -> Boolean
```
Takes an array of data which contains the sets of information needed to export.

**Retrieve**
```
Retrieve($type) -> String
```
Takes a type (cvs, xml, sql, json) and creates the file from the data and returns it.

**Download**
```
Download($type) -> NULL
```
Takes a type (cvs, xml, sql, json) and creates the file from the data and prompts the user to download it.

**GetXLS (depricated)**
```
GetXLS() -> String
```
Returns a string of the data in XLS format.

**DisplayXLS (depricated)**
```
DisplayXLS($output) -> NULL
```
Takes the output from the GetXLS and will display it to the screen with the "application/vnd.ms-excel" mime type and the filename that was determined in the constructor.
