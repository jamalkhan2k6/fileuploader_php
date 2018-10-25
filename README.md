# File Uploader Class For PHP:   

Uploader Class for PHP. Extremely easy to use, handles multiple files, mime type checks, and size checks. 

### Basic usage:   
Make an html form with file input. Point the action paramter to the php file which controls file upload procedure using fileuploader class.  

### Handle the uploaded files using uploader:       
initialize the class object:    
`$uploader = new Uploader("file");     `    
rename the files to randomly generated names and upload to "uploads" folder    
`$uploader->renameAndMoveFiles("uploads/");   `     
get the array of all the new file names      
`$files = $uploader->getNewFileNames();    `    



### Mime Types check:
Put all the mime type in an array:   
`$mime = array('application/msword', 'application/pdf',);`   
check if mime match for all the files   
`$uploader->checkMimes($mime);`   
check to see if there is any error:   
`$uploader->isError();`

### Check for file sizes (in bytes):
`$uploader->checkSize(200000);`

### Check for errors:  
(returns "mime" or "size" or blank string in case of no errors)   

`$error = $uploader->getErrorType();`   



