<?php

/*
 * 
 * Made by T. J. Knigge.
 * This project is to bring more structure in an old project
 */

session_start();

function showHeader() {
    $returnString = <<<HEADSTRING
        <html>
            <head>
                
                <link rel = "stylesheet" type = "text/css" href = "StyleSheet.css">
                <link rel = "footerStyle" type = "text/css" href = "footerStyle.css">
            
                <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
                <script src="jquery-3.2.1.js"></script>
                <script>
                function logout(){
                    document.location="Logout.php";
   
                }
                </script>
            </head>
        <body>
 
HEADSTRING;
    return $returnString;
}

function showFooter() {
    $returnString = "\t</body>\n";
    $returnString .= "</html>";
    return $returnString;
}

function connectionDB() {

    $hostname = 'localhost';
    $databasenaam = 'shop';
    $username = 'root';
    $password = '';

    $conn = new mysqli($hostname, $username, $password, $databasenaam);
    return $conn;

    if (!$conn) {
        die("DB failed to connect" . mysqli_error($conn));
    }
}
?>
