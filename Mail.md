# Introduction #

The Email class is used to send email. Its task is to wrap mail functions in a clean interface.

# Example #
```
$myMail = new Mail;
$myMail->From('setup@domain.com');
$myMail->To('user@domain.com');
$myMail->Subject('Subject of this email');
$message = 'How are things? I am writing my email to you!';
$myMail->Body($message);
$myMail->Cc('boss@domain.com');
$myMail->Bcc('ceo@domain.com');
$myMail->Priority(4);
$myMail->Attach('/usr/local/www/logo.gif', 'image/gif');
$myMail->Send();
echo 'Raw Email:<br /><pre>' . $myMail->Get() . '</pre>';
```

# Functions #

**Mail**
```
__construct() -> NULL
```
Main Class Constructor

**autoCheck**
```
autoCheck($bool) -> Boolean
```
Automatically validate email addresses

**Subject**
```
Subject($string) -> NULL
```
Sets the Subject of the email

**From**
```
From($email_address) -> NULL
```
Sets the From address of the email

**ReplyTo**
```
ReplyTo($email_address) -> NULL
```
Sets the Reply To of the email

**Receipt**
```
Receipt() -> NULL
```
Sets if the sender would like a return reciept

**To**
```
To($email_addresses) -> NULL
```
Sets who the email is to, it can be a string or an array of strings

**Cc**
```
Cc($email_addresses) -> NULL
```
Sets the carbon copy addresses of the email, it can be a string or an array of strings

**Bcc**
```
Bcc($email_addresses) -> NULL
```
Sets the blind carbon copy addresses of the email, it can be a string of an array of strings

**Body**
```
Body($body, $content_type, $charset) -> NULL
```
Sets the body of the email and its content type and charset. The default content\_type is "text/plain" and the default charset is "us-ascii"

**Organization**
```
Organization($organization) -> NULL
```
Sets the Organization of the email

**Priority**
```
Priority($priority) -> Boolean
```
Sets the priority of the email, 1 = highest and 5 = lowest

**Attach**
```
Attach($filename, $filetype, $disposition) -> NULL
```
Attach a file to the email, filetype and disposition are optional. Default filetype is "application/x-unknown-content-type" and default disposition is "inline"

**Send**
```
Send() -> Boolean
```
Sends out the email and returns if successful

**Get**
```
Get() -> String
```
Gets the contents of the sent email and returns the full string

**ValidEmail**
```
ValidEmail($email_address) -> Boolean
```
Checks to make sure the email address is in valid format