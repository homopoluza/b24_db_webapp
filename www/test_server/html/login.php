<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/dark.css">
</head>
<body> 
    <h1>Login</h1>   

    <?php
    if (isset($_GET['alert'])) {
        $msg = $_GET['alert'];
        echo "<div style='border: 1px solid black; padding: 10px; width: 275px; background-color: darkorange; color: black;'>$msg</div>";}
    ?>
    <form action="validation.php" method="post">
        <div>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">
        </div>
        <div>
            <label for="password">Password</label>
            <input type="password" name="password" id="password">
        </div>

        <button>Log in</button>
    </form>
</body>
</html>