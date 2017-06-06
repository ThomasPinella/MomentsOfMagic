<?php
    session_start();
    require_once('Database.php');

    function generateRandomString($length = 10) {
    	return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
	}

	$session_id = generateRandomString(16);

	$ip_address = $_SERVER["REMOTE_ADDR"];
	
?>

<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Moments of Magic</title>
        <link type="text/css" rel="stylesheet" href="style.css" />

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
        <script>
            $(document).ready(function() {

            });
        </script>
    </head>
    <body>
        Hello!
    </body>
</html>







































