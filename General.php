<?php

session_start();
include 'pageHead.php';


function showHeader() {
    $returnString = <<<HEADSTRING
        <html>
            <head>
                
               
                <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
                <link rel ="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"/>
                <script src="jquery-3.2.1.js"></script>
                <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
            
            
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
}

//    if (!$conn) {
//        die("DB failed to connect" . mysqli_error($conn));
//    }
include 'footerPage.php';
?>
<html>
    <head>
        <link rel =" stylesheet" href="logincss.css"/>
        <link rel =" stylesheet" href="cart.css"/>
        <link rel =" stylesheet" href="footer.css"/>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.6.3/css/font-awesome.min.css">
        <script src="jquery-3.2.1.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    </head>
