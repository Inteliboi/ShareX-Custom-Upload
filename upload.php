<?php
$tokens = array("token1", "token2");
 
$sharexdir = "i/"; //This is your file dir, also the link..
$lengthofstring = 5; //Length of the file name

function RandomString($length) {
    $keys = array_merge(range(0,9), range('a', 'z'));
 
    for($i=0; $i < $length; $i++) {
        $key .= $keys[mt_rand(0, count($keys) - 1)];
    }
    return $key;
}
 
if(isset($_POST['secret']))
{
    if(in_array($_POST['secret'], $keys))
    {
        $filename = RandomString($lengthofstring);
        $target_file = $_FILES["sharex"]["name"];
        $fileType = pathinfo($target_file, PATHINFO_EXTENSION);
 
        if (move_uploaded_file($_FILES["sharex"]["tmp_name"], $sharexdir.$filename.'.'.$fileType))
        {
            $json->status = "OK";
            $json->errormsg = "";
            $json->url = $filename . '.' . $fileType;
        }
            else
        {
           echo 'File upload failed - CHMOD/Folder doesn\'t exist?';
        }  
    }
    else
    {
        echo 'Invalid Secret Key';
    }
}
else
{
    echo 'No post data recieved';
}
echo(json_encode($json));
?>
