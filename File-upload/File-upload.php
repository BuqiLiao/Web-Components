<form action="" enctype="multipart/form-data" method="post" 
name="uploadfile">上传文件：<input type="file" name="file" /><br> 
<input type="submit" value="上传" /></form> 

<?php 
$allowedStyle = array("gif", "jpeg", "jpg", "png");
$temp = explode(".", $_FILES["file"]["name"]);
$extension = end($temp);//get the suffix name of the file
// print_r($extension);
// echo $_FILES["file"]["size"];
if(is_uploaded_file($_FILES['file']['tmp_name'])){ 
    if (($_FILES["file"]["size"] < 204800)   // 小于 200 kb
    && in_array($extension, $allowedStyle)){
        if ($_FILES["file"]["error"] > 0){
            switch ($_FILES["file"]["error"]){ 
                case 1: echo "超过了文件大小，在php.ini文件中设置"; 
                break;
                case 2: echo "超过了文件的大小MAX_FILE_SIZE选项指定的值";
                break; 
                case 3: echo "文件只有部分被上传";
                break; 
                case 4: echo "没有文件被上传";
                break; 
                case 5: echo "上传文件大小为0";
                break; 
                case 6: echo "找不到临时文件夹，目录不存在或没权限";
                break; 
                case 7: echo "文件写入失败，磁盘满了或没有权限";
                break; 
                } 
        }else{
            echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
            echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
            echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
            echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "</br>";
            
            if (file_exists("upload/" . $_FILES["file"]["name"])){
                echo $_FILES["file"]["name"] . " 文件已经存在。 ";
            }else{
                // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
                echo "文件存储在: " . "upload/" . $_FILES["file"]["name"]."</br>";
                echo "================<br/>"; 
                echo "上传信息：<br/>"; 
                echo "文件上传成功啦！"; 
                echo "<br>图片预览:<br>"; 
                echo "<img src="."upload/" . $_FILES["file"]["name"].">"."</br>"; 
            }
        }
    }else{
        echo "文件太大了或者非法的文件格式";
    }
}
?> 