<?php
    include "conn.php";

    if(isset($_POST['del'])) {
        $id_to_delete = $_POST['id_to_delete'];
        mysqli_query($conn, "DELETE FROM profile WHERE id = '$id_to_delete'");
        header("Location: ".$_SERVER['PHP_SELF']); // Redirect to refresh the page
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100vh;
        background-color: #ccc;
    }

    table {
        background-color: white;
        text-align: center;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid black;
        padding: 20px;
        text-align: center;
    }

    th {
        text-transform: uppercase;
        font-weight: 700;
    }

    .delete-button {
        background-color: #ff6666;
        color: white;
        border: none;
        padding: 10px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .delete-button:hover {
        background-color: #ff4d4d;
    }
</style>

<body>
    <table>
        <tr>
            <th>ID</th>
            <th>Name of Participant</th>
            <th>Fb Link</th>
            <th>Action</th>
        </tr>
    <?php 
    $from_db = mysqli_query($conn, "SELECT * FROM profile");

    while($data = mysqli_fetch_array($from_db)){
    ?>
        <tr>
            <td><?php echo $data['id'];?></td>
            <td><?php echo $data['fn'];?></td>
            <td><a href="<?php echo $data['link'];?>" target="_blank"><?php echo $data['link'];?></a></td>
            <td>
                <form method="post" action="">
                    <input type="hidden" name="id_to_delete" value="<?php echo $data['id']; ?>">
                    <input type="submit" class="delete-button" value="Delete" name="del">
                </form>
            </td>
        </tr>
        <?php 
    }
        ?>
    </table>
</body>

</html>
