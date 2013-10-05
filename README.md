fileuploader_php
================

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


 



