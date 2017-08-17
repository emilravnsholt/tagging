<?php
session_start();

if (isset($_POST['submit'])) {
    $tag = $_POST['hashtag'];
    
    if (!isset($_SESSION["hash"])) {
        $_SESSION["hash"] = array();
    } else {
        $_SESSION["hash"][] = ",$tag";
    }
}

if (isset($_GET['delete'])) {
    $k = $_GET['delete'];
    unset($_SESSION["hash"][$k]);
    header('Location: ./');
}


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
    
    <main>
        <h1>Tagging opgave</h1>
        <h2>Tilføj et tag</h2>
        <form method="post">
            <input name="hashtag" type="text" autofocus>
            <button name="submit" type="submit">SEND</button>
        </form>
        <article id="hashWrap">
            <header><h3>Tags</h3></header>
            <?php
            foreach ($_SESSION["hash"] as $key => $yo) {
                echo "<div class='divTags'>";
                echo "<p>";
                echo str_replace(",", "", $yo);
                echo "</p><a href='?delete=$key'>&#x2716;</a></div>";
            }
            ?>
        </article>
    </main>
    
</body>
</html>