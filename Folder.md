# Introduction #

The Folder class is used to interact with folders on the server. Its task is to wrap folder functions in a clean interface.

# Example #
_Need Example_

# Functions #
**Folder**
```
Folder($folder_name, $directory) -> NULL
```
Set the folder name and directory on the server. Folder name is required while directory is optional. If no directory is passed the directory is set to the directory the application is sitting in.

**Move**
```
Move($new_directory) -> Boolean
```
Move the folder to a new directory and returns if it was successful.

**IsWritable**
```
IsWritable() -> Boolean
```
Checks to see if the folder is writable and returns.

**Format**
```
Format() -> Boolean
```
Removes and bad charictors from the folder name so that it can be created safely on the filesystem.

**MakeWritable**
```
MakeWritable() -> Boolean
```
Tries to make the folder on the filesystem writable for the group and returns. Currently 775 is the permissions.

**Delete**
```
Delete($force) -> Boolean
```
Deletes the folder from the filesystem and returns. If the force is true all sub folders and files will also be removed.

**DirList**
```
DirList() -> Array
```
Gets a list of all the files in a directory and return an array of the filenames.

**Rename**
```
Rename($new_name) -> Boolean
```
Rename the folder on the filesystem and return if it was successful.

**Exists**
```
Exists() -> Boolean
```
Checks the filesystem to see if the folder already exists and returns a bool.

**Create**
```
Create() -> Boolean
```
Try to create the folder on the filesystem in the directory and return a bool.