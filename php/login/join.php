<!DOCTYPE html>
<html lang="ko">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP 사이트 만들기</title>

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
        <section id="join" class="container section">
            <h2>SIGN UP</h2>
            <div class="join__inner">
                <div class="join__privacy">
                    <h3>Terms And Conditions</h3>
                    <div class="privacy">
                        <ul>
                            <li>목적 : 가입자 개인 식별, 가입 의사 확인, 가입자와의 원활한 의사소통, 가입자와의 교육 커뮤니테이션</li>
                            <li>항목 : 아이디(이메일주소), 비밀번호, 이름, 생년월일, 휴대폰번호</li>
                            <li>보유기간 : 회원 탈퇴 시까지 보유(탈퇴일로부터 즉시 파기합니다.)</li>
                            <li>개인정보 수집에 대한 동의를 거부할 권리가 있으며, 회원 가입시 개인정보 수집을 동의함으로 간주합니다.</li>
                        </ul>
                    </div>
                    <div class="check">
                        <input type="checkbox" name="joinCheck" id="joinCheck">
                        <label for="joinCheck">약관 동의</label>
                    </div>
                </div>
                <div class="join__form">
                    <form action="joinSave.php" name="join" method="post">
                        <fieldset>
                            <legend class="blind">회원가입</legend>
                            <div>
                                <label for="youEmail">E-mail</label>
                                <input type="email" id="youEmail" name="youEmail" class="input_style1" placeholder="이메일을 써주세요." required>
                            </div>
                            <div>
                                <label for="youName">Name</label>
                                <input type="text" id="youName" name="youName" class="input_style1" placeholder="이름을 써주세요." required>
                            </div>
                            <div>
                                <label for="youPass">Password</label>
                                <input type="password" id="youPass" name="youPass" class="input_style1" placeholder="비밀번호를 써주세요." required>
                            </div>
                            <div>
                                <label for="youPassC">Check Password</label>
                                <input type="password" id="youPassC" name="youPassC" class="input_style1" placeholder="확인 비밀번호를 써주세요." required>
                            </div>
                            <div>
                                <label for="youPhone">Phone</label>
                                <input type="text" id="youPhone" name="youPhone" class="input_style1" placeholder="휴대폰번호를 써주세요." required>
                            </div>
                            <button class="btn_style1 mt20" type="submit">회원가입 완료</button>
                        </fieldset>
                    </form>
                </div>
            </div>
        </section>

    </main>
    <!-- //main -->

    <?php include "../include/footer.php"   ?>

</body>

</html>