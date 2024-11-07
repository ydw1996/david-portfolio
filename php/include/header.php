<header id="header">
        <div class="header__inner container">
            <div class="left">
                <a href="../../index.html" class="star"><span class="ir">메인으로</span></a>
            </div>
            <h1>
                <a href="../../index.html">PORTFOLIO</a>
            </h1>
            <div class="right">
               
         <?php   if(isset($_SESSION['memberID'])){?>
                  <ul>
                    <li><a href="../login/mypage.php"><?=$_SESSION['youName']?>님 환영합니다.</a></li>
                    <li><a href="../login/logout.php">로그아웃</a></li>
                </ul>
          <?php   }else{    ?>
                <ul>
                    <li><a href="../login/login.php">Login</a></li>
                    <li><a href="../login/join.php">Sign Up</a></li>
                </ul>
            <?php   }        ?>
             
                </div>
            <nav class="nav">
                <ul>
                    <li><a href="../login/join.php"><span>회원가입</span></a></li>
                    <li><a href="../login/login.php"><span>로그인</span></a></li>
                    <li><a href="../board/board.php"><span>게시판</span></a></li>
                    <li><a href="../blog/blog.php"><span>블로그</span></a></li>
                </ul>
            </nav>
        </div>
    </header>
    <!-- //header -->