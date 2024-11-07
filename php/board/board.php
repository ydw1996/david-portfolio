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

    <?php include "../include/head.php" ?>
</head>
<body>
    <div id="skip">
        <a href="#header">헤더 영역 바로가기</a>
        <a href="#main">컨텐츠 영역 바로가기</a>
        <a href="#footer">푸터 영역 바로가기</a>
    </div>
    <!-- //skip -->

    <?php include "../include/header.php" ?>
    <!-- //header -->

    <main id="main">
        <section id="board" class="container section">
            <h2>BOARD</h2>
            <div class="board__inner">
                <div class="board__search">
                    <div class="left">
                        * 총 <em>1111</em>건의 게시물이 등록되어 있습니다.
                    </div>
                    <div class="right">
                        <form action="boardSearch.php" name="boardSearch" method="get">
                            <fieldset>
                                <legend class="blind">게시판 검색 영역</legend>
                                <input type="search" name="searchKeyword" id="searchKeyword" class="input_style2" placeholder="검색어를 입력하세요!"
                                    aria-label="search" required>
                                <select name="searchOption" id="searchOption" class="select_style1">
                                    <option value="title">제목</option>
                                    <option value="content">내용</option>
                                    <option value="name">등록자</option>
                                </select>
                                <button type="submit" class="btn btn_style3">검색</button>
                                <a href="boardWrite.php" class="btn btn_style4">글쓰기</a>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <div class="board__table">
                    <table>
                        <colgroup>
                            <col style="width: 5%">
                            <col>
                            <col style="width: 10%">
                            <col style="width: 10%">
                            <col style="width: 7%">
                        </colgroup>
                        <thead>
                            <tr>
                                <th>번호</th>
                                <th>제목</th>
                                <th>등록자</th>
                                <th>등록일</th>
                                <th>조회수</th>
                            </tr>
                        </thead>
                        <tbody>
<?php

    if(isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }

    $viewNum = 10;
    $viewLimit = ($viewNum * $page) - $viewNum;

    // 1 ~ 20  : DESC 0, 20   --> page1 (viewNum * 1) - viewNum
    // 21 ~ 40 : DESC 20, 20  --> page2 (viewNum * 2) - viewNum
    // 41 ~ 60 : DESC 40, 20  --> page3 (viewNum * 3) - viewNum
    // 61 ~ 80 : DESC 60, 20  --> page4 (viewNum * 4) - viewNum

    // boardID, boardTitle, youName, regTime, boardView // newBoard : newMember ==> JOIN
    // 두개의 테이블 합
    $sql = "SELECT b.boardID, b.boardTitle, m.youName, b.regTime, b.boardView FROM newBoard b JOIN newMember m ON(b.memberID = m.memberID) ORDER BY boardID DESC LIMIT {$viewLimit}, {$viewNum}";
    $result = $connect -> query($sql);

    if($result) {
        $count = $result -> num_rows;
        
        if($count > 0) {
            for($i=1; $i <= $count; $i++) {
                $info = $result -> fetch_array(MYSQLI_ASSOC);

                echo "<tr>";
                echo "<td>".$info['boardID']."</td>";
                echo "<td><a href='boardView.php?boardID={$info['boardID']}'>".$info['boardTitle']."</a></td>";
                echo "<td>".$info['youName']."</td>";
                echo "<td>".date('Y-m-d', $info['regTime'])."</td>";
                echo "<td>".$info['boardView']."</td>";
                echo "</tr>";
            } 
        } else {
            echo "<tr><id colspan='4'>게시글이 없습니다.</id></tr>";
        }
    }
?>
                        </tbody>
                    </table>
                </div>
                <div class="board__pages">
                    <ul>
<?php
    // 게시글 총 갯수
    // 몇 페이지

    $sql = "SELECT count(boardID) FROM newBoard";
    $result = $connect -> query($sql);

    $boardTotalCount = $result -> fetch_array(MYSQLI_ASSOC);
    $boardTotalCount = $boardTotalCount['count(boardID)'];

   // echo $boardTotalCount;  

    //총 페이지 갯수 
    $boardTotalCount = ceil($boardTotalCount/$viewNum);

    // 1 2 3 4 5 6 7 8 9 10 11 12 13 14
    $pageView =5;
    $startPage = $page - $pageView;
    $endPage = $page + $pageView;

    // 처음 페이지 초기화 
    if($startPage < 1) $startPage = 1;

    // 마지막 페이지 초기화
    if($endPage >= $boardTotalCount) $endPage = $boardTotalCount;

    // 처음으로
    if($page != 1){
        echo "<li><a href='board.php?page=1'>처음으로</a></li>";
    }

    // 이전
    if($page != 1){
        $prevPage = $page -1;
        echo "<li><a href='board.php?page={$prevPage}'>이전</a></li>";
    }

    // 페이지 
    for($i=$startPage; $i<=$endPage; $i++){
        $active = "";
        if($i == $page) $active = "active";

        echo"<li class='{$active}'><a href='board.php?page={$i}'>{$i}</a></li>";
    }

    //다음
    if($page != $endPage){
        $nextpage = $page +1;
        echo "<li><a href='board.php?page={$nextpage}'>다음</a></li>";
    }
    //마지막
    if($page != $endPage){
        echo "<li><a href='board.php?page={$boardTotalCount}'>마지막으로</a></li>"; 
    }

?>
                        <!-- <li><a href="#">처음으로</a></li>
                        <li><a href="#">이전</a></li>
                        <li class="active"><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">4</a></li>
                        <li><a href="#">5</a></li>
                        <li><a href="#">6</a></li>
                        <li><a href="#">7</a></li>
                        <li><a href="#">다음</a></li>
                        <li><a href="#">마지막으로</a></li> -->
                    </ul>
                </div>
            </div>
        </section>
        <!-- //board -->
    </main>
    <!-- //main -->

    <?php include "../include/footer.php" ?>
    <!-- //footer -->
</body>
</html>