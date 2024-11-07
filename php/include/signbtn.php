<?php if(isset($_SESSION['memberID'])) {
     ?>
    <p><a href="#">Hi, <?=$_SESSION['youName']?>!</a></p>
    <a href="php/login/logout.php">Logout</a>
<?php } else { 
     ?>
    <a href="php/login/login.php">LOGIN</a>
    <a href="php/login/join.php">JOIN</a>
<?php } ?>