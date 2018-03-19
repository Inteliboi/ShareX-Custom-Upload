<?php
$tokens = array("token1", "token2"); //Tokens go here
 
$sharexdir = "i/"; //File directory
$lengthofstring = 5; //Length of file name

//Random file name generation
function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));
 
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}
 
//Check for token
if(isset($_POST['secret']))
{
    //Checks if token is valid
    if(in_array($_POST['secret'], $tokens))
    {
        //Prepares for upload
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
        
        //Accepts and moves to directory
        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType))
        {
            //Sends info to client
            $json->status = "OK";
            $json->errormsg = "";
            $json->url = $filename . '.' . $fileType;
        }
            else
        {
            //Warning
           echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
        }  
    }
    else
    {
        //Invalid key
        echo 'Invalid Secret Key';
    }
}
else
{
    //Warning if no uploaded data
    echo 'No post data recieved';
}
//Sends json
echo(json_encode($json));
?>
