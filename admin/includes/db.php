<?php
    // define("DBNAME", 'glh');
    // define("DBUSER", 'root');
    // define("DBPASS", '');
    define("DBNAME", 'enactuso_enactusweb');
    define("DBUSER", 'root');
    define("DBPASS", '');

        try{

          $conn = new PDO('mysql:host=localhost;dbname='.DBNAME, DBUSER, DBPASS);

          $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e) {
                // die("Something Went Wrong");
                echo $e->getMessage();
        }

 ?>
