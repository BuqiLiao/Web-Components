<!-- For uploading, it is neccessary to have: enctype="multipart/form-data"  -->
<form action="" enctype="multipart/form-data" method="post">
    Upload:<input type="file" name="file" />
    <br> 
    <input type="submit" value="Upload" />
</form> 

<?php

File_upload();

function File_upload(){
    //Regulate legal type 
    $allowedStyle = array("gif", "jpeg", "jpg", "png");
    $temp = explode(".", $_FILES["file"]["name"]);
    //Get the suffix name of the file
    $extension = end($temp);
    // print_r($extension);
    // echo $_FILES["file"]["size"];
    if(is_uploaded_file($_FILES['file']['tmp_name'])){
        // Rugulate file must smaller than 200 kb and the file's suffix name is legal
        if (($_FILES["file"]["size"] < 204800) && in_array($extension, $allowedStyle)){
            //Determine whether the uploaded file is legal
            if ($_FILES["file"]["error"] > 0){
                switch ($_FILES["file"]["error"]){ 
                    case 1: echo "The file is too large (server)!"; 
                    break;
                    case 2: echo "The file is too large (form)!";
                    break; 
                    case 3: echo "The file was only partially uploaded!";
                    break; 
                    case 4: echo "No file was uploaded!";
                    break; 
                    case 5: echo "The servers temporary folder is missing!";
                    break; 
                    case 6: echo "Failed to write to the temporary folder!";
                    break; 
                    case 7: echo "File writing failed, the disk is full or there is no permission!";
                    break; 
                    } 
            }else{
                //Echo the information of uploaded file
                echo "File name: " . $_FILES["file"]["name"] . "<br>";
                echo "Type: " . $_FILES["file"]["type"] . "<br>";
                echo "Value: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
                echo "Temporary path: " . $_FILES["file"]["tmp_name"] . "</br>";
                //Determine whether there is a duplicate file
                if (file_exists("upload/" . $_FILES["file"]["name"])){
                    echo $_FILES["file"]["name"] . " File is already exist! ";
                }else{
                    //Upload the file to the "upload/" path
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                    //Echo the final path of the file
                    echo "File is saved at" . "upload/" . $_FILES["file"]["name"]."</br>";
                    echo "================<br/>"; 
                    //Echo the status of uploading
                    echo "Uploading information:<br/>"; 
                    echo "Upload successfully!"; 
                    echo "<br>Preview:<br>"; 
                    echo "<img src="."upload/" . $_FILES["file"]["name"].">"."</br>"; 
                }
            }
        }else{
            echo "File is too large or unsupported type!";
        }
    }
}

?> 