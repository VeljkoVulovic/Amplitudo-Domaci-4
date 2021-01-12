<?php

$dir = "zelje_db";
$allFiles = scandir($dir); 
$files_array = array_diff($allFiles, array('.', '..'));

    echo "<table border='1' style='margin:50px;text-align:center;'>
            <tr style='color:blue;'>
                <th>Ime</th>
                <th>Prezime</th>
                <th>Grad</th>
                <th>Zelja</th>
                <th>Datum</th>
            </tr>";
          
foreach ($files_array as $value) {
    $myFile = "./zelje_db/".$value;
    $readingFileContent = file_get_contents($myFile);
    $obj = json_decode($readingFileContent);

    echo "<tr>";
    echo "<td>".$obj->firstName."</td>";
    echo "<td>".$obj->lastName."</td>";
    echo "<td>".$obj->city."</td>";
    echo "<td>".$obj->wish."</td>";
    echo "<td>".$obj->date."</td>";
    echo "</tr>";  
  }
    echo "</table>";
?>