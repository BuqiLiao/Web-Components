<form action="" method="post" enctype="multipart/form-data"> 
    <input type="file" name="file[]"> 
    <input type="file" name="file[]"> 
    <input type="submit" name="submit" value="Upload">
</form> 

<?php

Multi_file_upload();

function Multi_file_upload(){
    //Regulate legal type 
    $allowedStyle = array("gif", "jpeg", "jpg", "png");
    // var_dump($_FILES); 
    $click=$_POST['submit'];

    if($click=='Upload'){
        //Execute a loop for each file
        for ($i=0; $i < count($_FILES['file']['name']); $i++){
            //Get the suffix name of the file  
            $temp = explode(".", $_FILES["file"]["name"][$i]);
            $extension = end($temp);

            if(is_uploaded_file($_FILES['file']['tmp_name'][$i])){
                // Rugulate file must smaller than 200 kb and the file's suffix name is legal
                if (($_FILES["file"]["size"][$i] < 204800) && in_array($extension, $allowedStyle)){
                    //Determine whether the uploaded file is legal
                    if ($_FILES["file"]["error"][$i] > 0){
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
                        echo "File name: " . $_FILES["file"]["name"][$i] . "<br>";
                        echo "Type: " . $_FILES["file"]["type"][$i] . "<br>";
                        echo "Value: " . ($_FILES["file"]["size"][$i] / 1024) . " kB<br>";
                        echo "Temporary path: " . $_FILES["file"]["tmp_name"][$i] . "</br>";
                        //Determine whether there is a duplicate file
                        if (file_exists("upload/" . $_FILES["file"]["name"][$i])){
                            echo $_FILES["file"]["name"][$i] . " File is already exist! ";
                        }else{
                        //Upload the file to the "upload/" path
                        move_uploaded_file($_FILES["file"]["tmp_name"][$i], "upload/" . $_FILES["file"]["name"][$i]);
                        //Echo the final path of the file
                        echo "File is saved at" . "upload/" . $_FILES["file"]["name"][$i]."</br>";
                        echo "================<br/>"; 
                        //Echo the status of uploading
                        echo "Uploading information:<br/>"; 
                        echo "Upload successfully!"; 
                        echo "<br>Preview:<br>"; 
                        echo "<img src="."upload/" . $_FILES["file"]["name"][$i].">"."</br>"; 
                        }
                    }
                }else{
                    echo "File is too large or unsupported type!";
                }
            }
        }   
    } 
}

?> 