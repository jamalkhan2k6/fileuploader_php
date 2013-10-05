
Uploader Class for PHP. Made to be extremely easy, handles multiple files, mime types, and sizes. 

# Basic usage:   
Make an html form with file input.   

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
(returns "mime" or "size" or "" in case of no errors)   

`$error = $uploader->getErrorType();`   



