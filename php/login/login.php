<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php include "../include/head.php"   ?>
<body>

<div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
 <!-- //skip -->

 <?php include "../include/header.php"   ?>

 <main id="main">
        <section id="login" class="container section">
            <h2>LOGIN</h2>
            <div class="login__inner">
                <div class="login__contents">
                    <form name="login" action="loginSave.php" method="post">
                        <fieldset>
                            <legend class="blind">로그인 입력폼</legend>
                            <div>
                                <label class="blind" for="youEmail">email</label>
                                <input type="email" name="youEmail" id="youEmail" class="input_style1" placeholder="E-mail" class="input__style" required>
                            </div>
                            <div>
                                <label class="blind" for="youPass">password</label>
                                <input type="password" name="youPass" id="youPass" class="input_style1" placeholder="Password" class="input__style" required>
                            </div>
                            <button type="submit" class="btn_style1 mt20">Login</button>
                        </fieldset>
                    </form>
                </div>
                <div class="login__footer">
                    
                    <div class="desc">
                        <ul>
                            <a href="join.php" class="link">Sign up</a>
                            <a href="join.php" class="link">ID/ Password</a>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- //login -->
    </main>
    <!-- //main -->
    <?php include "../include/footer.php"   ?>
</body>
</html>