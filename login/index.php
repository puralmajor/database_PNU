<!DOCTYPE html>
<html>
<head>
    <title>LOGIN</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="login.php" method="post">
        <h2>LOGIN</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>ID</label>
        <input type="text" name="id" placeholder="교도관 번호"><br>

        <label>password</label>
        <input type="password" name="password" placeholder="비밀번호"><br>

        <button type="submit">submit</button>
    </form>
</body>
</html>
