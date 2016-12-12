<?php

$file_name=$_FILES['file']['name'] ;
$outputimg="";
if($file_name!= '')
{
    $tmp = explode('.', $file_name);
    $extension = end($tmp);
    //$extension = end(explode(".", $_FILES['file']['name']));
    $allowed_type = array("jpg", "jpeg", "png", "gif");
    if(in_array($extension, $allowed_type))
    {
        $new_name = rand() . "." . $extension;
        $path = "../view/images/" . $new_name;
        if(move_uploaded_file($_FILES['file']['tmp_name'], $path))
        {
            echo '  <div class="row">
                         <div class="col-sm-10">       
                              <img src="'.$path.'" class="img-responsive" />  
                         </div>  
                         <div class="col-sm-2">  
                              <button type="button" data-path="'.$path.'" id="remove_button" class="btn btn-danger">x</button>  
                         </div>  
                     </div>
                     ';
        }
    }
    else
    {
        echo '<script>alert("Invalid File Format")</script>';
    }
}
else
{
    echo '<script>alert("Please Select File")</script>';
}

?>