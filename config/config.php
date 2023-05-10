<?php

	 $servername = "localhost";
     $username = "root";
     $password = "";
     $dbname = "assignment";
     $GLOBALS['AppConfig']['folderpath'] = '/Assignment';


// Create connection
 $conn = new mysqli($servername, $username, $password, $dbname);
  $mysqli_user=$conn;
?>