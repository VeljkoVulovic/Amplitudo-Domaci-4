<?php

    function insertIntoDB($table,$value){
        $new_folder = 'zelje_db';
        if(!file_exists($new_folder)){
            mkdir($new_folder);
        }
        $new_file = fopen($new_folder.'/'.$table.'.txt','a+');
        fwrite($new_file,$value);
        fclose($new_file);
    }

?>