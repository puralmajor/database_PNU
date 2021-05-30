<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css" integrity="sha384-DhY6onE6f3zzKbjUPRc2hOzGAdEf4/Dz+WJwBvEYL/lkkIsI3ihufq9hk9K4lVoK" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js" integrity="sha384-BOsAfwzjNJHrJ8cZidOg56tcQWfp6y72vEJ8xQ9w6Quywb24iOsW913URv1IS4GD" crossorigin="anonymous"></script>
</head>

<body>
    <form action="signProcess.php" method="POST" id="signup-form">
        <div class="w-50 ml-auto mr-auto mt-5">
        <div class="mb-3">
            <label for="PO_id" class="form-label">교도관번호</label>
            <input type="PO_id" name="PO_id" class="form-control" id="PO_id" placeholder="교도관 번호를 입력하세요">
        </div>
        <div class="mb-3">
            <label for="PO_name" class="form-label">이름</label>
            <input type="PO_name" name="PO_name" class="form-control" id="PO_name" placeholder="교도관 번호를 입력하세요">
        </div>
        <div class = "mb-3">
            <label for ="PO_password" class="form-label"> 비밀번호 </label>
            <input name="PO_password" type="PO_password" class="form-control" id="PO_password" placeholder="비밀번호를 입력해 주세요.">
            </div>
            <div class="mb-3 ">
                <label for="passwordCheck" class="form-label">비밀번호 체크</label>
                <input type="password" class="form-control" id="password-check" placeholder="비밀번호를 입력해 주세요.">
            </div>

            <button type="button" id="signup-button" class="btn btn-primary mb-3">회원가입</button>
        </div>
    </form>
    <script>
        const signupForm = document.querySelector("#signup-form");
        const signupButton = document.querySelector("#signup-button");
        const password = document.querySelector("#password");
        const passwordCheck = document.querySelector("#password-check");
        signupButton.addEventListener("click", function(e) {
            if(password.value&& password.value === passwordCheck.value){
            signupForm.submit();
            }else{
                alert("비밀번호가 서로 일치하지 않습니다");
            }
        });
    </script>
</body>

</html>