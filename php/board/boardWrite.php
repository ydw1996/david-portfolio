<?php
    include "../connect/connect.php";
    include "../connect/session.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php include "../include/head.php"   ?>
</head>
<body>
<div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->
<?php include "../include/header.php"   ?>

<main id="main">
<section id="board" class="container section">
            <h2>BOARD WRITE</h2>
            <div class="board__inner">
                <div class="board__write">
                    <form action="boardWriteSave.php" name="boardWrite" method="post">
                        <fieldset>
                            <legend>게시판 작성 영역</legend>
                            <div>
                                <label for="boardTitle">제목</label>
                                <input type="text" name="boardTitle" id="boardTitle">
                            </div>
                            <div>
                                <label for="boardContents">내용</label>
                                <textarea name="boardContents" id="boardContents" rows="20"></textarea>
                            </div>
                            <button type="submit" class="btn">저장하기</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>
        <!-- //board -->
    </main>
    <!-- //main -->

<?php include "../include/footer.php"   ?>
</body>
</html>