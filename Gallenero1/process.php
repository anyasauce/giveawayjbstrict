<?php
include("conn.php");

$message = ""; // Variable to store the result message

if (isset($_POST["user_profile"])) {
    $fn = $_POST["fn"];

    // Using prepared statements to prevent SQL injection
    $checkDuplicate = mysqli_prepare($conn, "SELECT id FROM profile WHERE fn = ?");
    mysqli_stmt_bind_param($checkDuplicate, "s", $fn);
    mysqli_stmt_execute($checkDuplicate);
    mysqli_stmt_store_result($checkDuplicate);

    if (mysqli_stmt_num_rows($checkDuplicate) > 0) {
        $message = "Entry with this name already exists.";
    } else {
        $insert = mysqli_prepare($conn, "INSERT INTO profile (id, fn) VALUES (NULL, ?)");
        mysqli_stmt_bind_param($insert, "s", $fn);
        mysqli_stmt_execute($insert);

        if ($insert) {
            $message = "Entry Successfully Submitted!";
        } else {
            $message = "Error in inserting: " . mysqli_error($conn);
        }
    }
}
