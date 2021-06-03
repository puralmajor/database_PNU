<!DOCTYPE html>
<html>
<head>
    <title>범죄자 삽입</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="input_process.php" method="post">
        <h2>범죄자 추가</h2>
        <?php if(isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>

        <?php if(isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

        <label>죄수번호</label>
        <?php if(isset($_GET['id'])) { ?>
            <input type="text" 
                   name="id" 
                   placeholder="죄수번호" 
                   value="<?php echo $_GET['id']; ?>"><br>
        <?php }else{ ?>
            <input type="text"
                   name="id"
                   placeholder="죄수 번호"><br>
        <?php }?>

        <label>이름</label>
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

        <label>범죄종류</label>
        <input type="text" 
               name="crime" 
               placeholder="범죄종류"><br>
       
        <label>입소일</label>
        <input type="text" 
               name="admission" 
               placeholder="입소일"><br>

        <label>출소일</label>
        <input type="text" 
               name="release" 
               placeholder="출소일"><br>

        <label>재범</label>
        <input type="text" 
               name="record" 
               placeholder="재범횟수"><br>

        <label>나이</label>
        <input type="text"
               name="age"
               placeholder="나이"><br>

        <label>형량</label>
        <input type="text"
               name="sentence"
               placeholder="형량"><br>

        <label>벌점</label>
        <input type="text"
               name="penalty"
               placeholder="벌점"><br>

        <label>배정될 방</label>
        <input type="text"
               name="room"
               placeholder="방번호"><br>
        

        <button type="submit">submit</button>

        <a href="index.php" class="ca">이전페이지로 돌아가기</a>
    </form>
</body>
</html>
