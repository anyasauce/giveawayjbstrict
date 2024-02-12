<?php
include("process.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Giveaway Entry Form - Jailbreak Strict</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="strict.jpg" type="image/x-icon">
</head>
<body>

<div class="entry-form">
    <h2>Giveaway Entry Form</h2>

    <form id="entryForm" method="post" action="">
        <?php
        if (!empty($message)) {
            echo '<p class="' . (strpos($message, "already exists") !== false ? "error" : "result") . '-message">' . $message . '</p>';
        }
        ?>
        
        <label>Please fill up below.</label><br>
        <input type="text" name="fn" placeholder="Facebook Name" required><br>

        <input type="submit" name="user_profile" value="SUBMIT">
    </form>
</div>

</body>
</html>