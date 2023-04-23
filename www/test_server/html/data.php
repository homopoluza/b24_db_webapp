<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
    <title>Data</title>
</head>
<body>

    <?php
        session_start();

        // Check if the user is logged in
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header('Location: login.php');
            exit;
        }
    ?>

    <?php 
        $mysqli = require __DIR__ . "/db.php";
        $sql = ("SELECT * FROM example;");
        $result = $mysqli->query($sql);
    ?>

    <table>
        <tr>
            <th>text</th>
            <th>number1</th>
            <th>number2</th>
            <th>sum</th>

        </tr>
            <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo $row['text'] ?></td>
                <td><?php echo $row['number1'] ?></td>
                <td><?php echo $row['number2'] ?></td>
                <td><?php echo $row['sum'] ?></td>

            </tr>
            <?php endforeach; ?>
    </table>
    
    <style>
        form {
            display: flex;
            justify-content: space-between;
        }

        #logout {
            background-color: darkred;
            color: white;
        }
    </style>

    <form  method="post">
        <input type="submit" name="action" value="Download">
        <input type="submit" name="action" id=logout value="Logout">
    </form>

    <?php
        if (isset($_POST['action'])) {
            if ($_POST['action'] == 'Download') {
                header("Location: download.php");
                exit;
            } elseif ($_POST['action'] == 'Logout') {
                header("Location: logout.php");
                exit;
            }
        }
    ?>
</body>
</html>