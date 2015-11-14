# Introduction #

The Upload class is used to upload files to the server. Its task is to wrap upload functions in a clean interface.

# Example #
_Need Example_

# Functions #

**Upload**
```
Upload($data, $directory) -> NULL
```
Upload constructor, takes the $_FILES data from the form and the dirtory where the file will be stored_

**CheckData**
```
CheckData($accepted_types, $max_size) -> Array
```
Checks the file that will be uploaded against an array of accepted\_types and a size constraint in bytes

**UploadFile**
```
UploadFile() -> Boolean
```
Uploads the file to the server in the directory specified and returns if it was successful