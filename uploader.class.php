<?php  
/*
Uploader class can be used to handle single or multi files upload.
Its easy to use. It can restrict mime types, and file sizes.
example  usage:

$uploader = new Uploader("file");  //file is the "name" field in the html form
$uploader->renameAndMoveFiles("uploads/");   //rename the files and move them to the folder uploads
$files = $uploader->getNewFileNames();    //get the new file names (array)


*/

class Uploader{
	var $files = array();
	var $error = 0;
	var $error_type = "";
	var $name = "";
	var $new_names = array();

	function __construct($name="file"){
			
			$this->name = $name;
			$this->files = $this->fixGlobalFilesArray($_FILES);
	}//end of _construct

	function fixGlobalFilesArray($files){

			        $ret = array();
			       
			        if(isset($files['tmp_name']))
			        {
			            if (is_array($files['tmp_name']))
			            {
			                foreach($files['name'] as $idx => $name)
			                {
			                    $ret[$idx] = array(
			                        'name' => $name,
			                        'tmp_name' => $files['tmp_name'][$idx],
			                        'size' => $files['size'][$idx],
			                        'type' => $files['type'][$idx],
			                        'error' => $files['error'][$idx],
			                        'ext'   =>  $this->get_file_extension($name)
			                    );
			                }
			            }
			            else
			            {
			                $ret = $files;
			            }
			        }
			        else
			        {
			            foreach ($files as $key => $value)
			            {
			                $ret[$key] = $this->fixGlobalFilesArray($value);
			            }
			        }
			       
			        return $ret;

	}//end of fixglobalfilearray

	function getFiles(){
		return $this->files;
	}//getfiles ends

	function checkMimes($mime){

			$error = 0;
			foreach($this->files[$this->name] as $key => $value){

					if(!in_array($value["type"], $mime)){
						$error = 1;
					}

			}
		$this->error = $error;

		if($this->error == 1){
			$this->error_type = "mime";	
		}
		
	}//setMime ends

	function isError(){
		return $this->error;
	}

	function getErrorType(){
		return $this->error_type;
	}

	//check the sizes of all files, will pop error if 
	function checkSize($size){

			$error = 0;
			foreach($this->files[$this->name] as $key => $value){

					if($value["size"] > $size){
						$error = 1;
					}
			}

		$this->error = $error;
		if($this->error == 1){
			$this->error_type = "size";
		}
		
	}//checksize ends

	function get_file_extension($file_name) {
		return substr(strrchr($file_name,'.'),1);
	}

	function renameAndMoveFiles($to){

			$tmpp = array();

			foreach($this->files[$this->name] as $key => $value){
					$new_name = rand().time().rand() . "." . $value["ext"];
					$temp_name = $to . $new_name;
					move_uploaded_file($value["tmp_name"], $temp_name);
					$tmpp[] = $new_name;	
			}

			$this->new_names = $tmpp;

	}//renameandmovefile ends

	function getNewFileNames(){
			return $this->new_names;
	}//getnewfilenames ends

}//end of class
?>
