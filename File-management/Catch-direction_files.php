<?php

function catch_all_files($direction){

    $handle = opendir($direction);

    echo "<ul>";

    while($line = readdir($handle)){

        if($line == '.' || $line == '..'){

            continue;
        }
        
        echo "<li>" . $line . "</li>";

        if(is_dir($direction . "/" . $line)){

            catch_all_files($direction . "/" . $line);
        }

    }

    echo "</ul>";

    closedir($handle);
}

catch_all_files("../");

?>