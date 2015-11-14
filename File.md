# Introduction #

The File class is used to interact with files on the server. Its task is to wrap file functions in a clean interface.

# Example #
_Need Example_

# Functions #
**File**
```
File($filename, $directory) -> NULL
```
Set the filename and directory on the server. Filename is required while directory is optional. If no directory is passed the directory is set to the directory the application is sitting in.

**Move**
```
Move($new_directory) -> Boolean
```
Move the file to a new directory and returns if it was successful.

**Copy**
```
Copy($new_directory) -> Boolean
```
Copy the file to a new directory and returns if it was successful.

**Rename**
```
Rename($new_name) -> Boolean
```
Rename the file on the filesystem and return if it was successful.

**IsWritable**
```
IsWritable() -> Boolean
```
Checks to see if the file is writable and returns.

**MakeWritable**
```
MakeWritable() -> Boolean
```
Tries to make the file on the filesystem writable and returns. Currently 755 is the permissions.

**GetExtension**
```
GetExtension() -> String
```
Returns the extension of the file.

**Delete**
```
Delete() -> Boolean
```
Deletes the file from the filesystem and returns if it was successful.

**LastModified**
```
LastModified() -> String
```
Returns the last modified date for the file in the MySQL Date format (Y-m-d H:i:s).

**Exists**
```
Exists() -> Boolean
```
Returns if the file exists on the server in the directory.

**GetContents**
```
GetContents() -> String
```
Gets the contents of the file on the server and returns it.

**FormatFilename**
```
FormatFilename() -> Boolean
```
Formats the filename to remove any non standard chars.

**Filesize**
```
Filesize() -> Int
```
Returns the size of the file on the server in bytes.