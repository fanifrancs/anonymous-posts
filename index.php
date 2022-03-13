<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Anonymously share your crazy experiences">
    <meta name="author" content="Francisco">
    <title>anonymous xp</title>
    <link rel="stylesheet" href="./stylesheet.css">
    <link rel="shortcut icon" href="./logo.jpg" type="image/x-icon">
</head>
<body>

    <center>
        <img src="./logo.jpg" alt="">
    </center>

    <h2>Share your crazy experiences anonymously : ) </h2>

    <?php
        if (isset($_POST["submit"])) {
            $message_db = fopen("messages.html", "a+");
            date_default_timezone_set("Africa/Lagos");
            $tag = "Anonymous ".date("d/m/Y")." ".date("h:ia");
            $txt = $_POST["message"];
            $txt_valid = htmlspecialchars($txt);
            $message = 
            '<p class="container">
                '.'['.$tag.'] '.$txt_valid.
            '</p>
            <br>';
            fwrite($message_db, $message);
            fclose($message_db);
            
            $message_db = fopen("messages.html", "r") or die("Unable to open file!");
            echo fread($message_db,filesize("messages.html"));
            fclose($message_db);
        } else {
            $message_db = fopen("messages.html", "r") or die("Unable to open file!");
            echo fread($message_db,filesize("messages.html"));
            fclose($message_db);
        }
    ?>

    <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" id="form">
        <textarea name="message" id="message" cols="30" rows="10" placeholder="Add your own experience : )" required></textarea>
        <input name="submit" type="submit" value="Submit">
    </form><br>

    <hr style="margin-left: 2.5%; margin-right: 2.5%;">
    <center>
        <p>&copy; 2022 anonymous xp</p>
    </center>

</body>
</html>