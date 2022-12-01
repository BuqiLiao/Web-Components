<?php

function delete_all_files($direction){

    $handle = opendir($direction);

    while($line = readdir($handle)){

        if($line == '.' || $line == '..'){

            continue;
        }
        

        if(is_dir($direction . "/" . $line)){

            delete_all_files($direction . "/" . $line);

        }else{

            unlink($direction . "/" . $line);

        }

    }

    echo "</ul>";

    closedir($handle);
}

// delete_all_files();

?>