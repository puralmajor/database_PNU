<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="signup-check.php" method="post">
        <h2>SIGN UP</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>ID</label>
        <?php if(isset($_GET['id'])) { ?>
            <input type="text" 
                   name="id" 
                   placeholder="교도관 번호" 
                   value="<?php echo $_GET['id']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="id"
                   placeholder="교도관 번호"><br>
        <?php }?>

        <label>Name</label>
        <?php if(isset($_GET['name'])) { ?>
            <input type="text"
                   name="name" 
                   placeholder="이름" 
                   value="<?php echo $_GET['name']; ?>"><br>
        <?php }else{ ?>
            <input type="text" 
                   name="name" 
                   placeholder="이름"><br>
        <?php }?>

        <label>계급</label>
        <input type="text" 
               name="rank" 
               placeholder="계급"><br>
       
        <label>password</label>
        <input type="password" 
               name="password" 
               placeholder="비밀번호"><br>

        <label>password_Check</label>
        <input type="password" 
               name="passwordCheck" 
               placeholder="비밀번호"><br>

        <label>사동</label>
        <input type="text"
               name="building"
               placeholder="배정된 사동"><br>
        

        <button type="submit">submit</button>

        <a href="index.php" class="ca">Already have an account?</a>
    </form>
</body>
</html>
