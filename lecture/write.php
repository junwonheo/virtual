<?php
    session_start();
    include "../utils/common.php";
    header("Content-Type: text/html; charset=UTF-8");
    if(!isset($_SESSION['login'])){
        echo "<script>alert('로그인 후 이용 가능합니다.');window.location.href='../login/login.php';</script>";
        exit;
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeLearn</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="../../utils/main.css">
    <style>
        /* 검색창에서 플레이스 홀더 글자 설정 */
        input::placeholder {
            font-size: 12px; /* placeholder 글자 크기 */
            color: grey; /* placeholder 글자 색상 (선택 사항) */
        }
        .form-control {
            width: 100%;
            max-width: 700px;
        }
        /* 중간에 있는 AI 검색창 옵션 */
        #container{
            width: 500px;
            height: 50px;
            position: relative;
            display : flex;
            margin: auto;
        }
        #container input{
            width: 150%;
            border-radius: 25px;
            padding: 20px;
        }
        #container button{
            position : absolute;
            top: 5px;
            bottom: 5px;
            right: 5px;
            border: none;
            background-color:transparent
        }
        /* 중간에 있는 AI 검색창 옵션 */

        /* 제일 상단에 있는 검색창 옵션 */
        #container2{
            width: 500px;
            height: 30px;
            position: relative;
            display : flex;
            margin: auto;
        }
        #mainsearch{
            width: 100%;
            border-radius: 10px;
            padding: 20px;
            
        }
        #container2 button{
            position : absolute;
            top: 5px;
            bottom: 5px;
            right: 5px;
            border: none;
            background-color:transparent
        }
        /* 제일 상단에 있는 검색창 옵션 */

        #lecture-img {
            display: flex;
            flex-wrap: wrap; /* 여러 줄로 감싸기 위해 추가 */
            justify-content: center;
            align-items: center;
            text-align: center;
        }
        .lecture-item {
            margin: 20px;
            text-decoration: none; /* 링크의 밑줄 제거 */
            color: #333; /* 링크 색상 설정 */
            
        }

        .lecture-item img {
            width: 50px;
            margin-top: 50px;
        }

        .lecture-item span {
            display: block;
        }
        .lecture-item a{
            text-decoration: none; /* 밑줄 제거 */
            color: inherit; /* 기본 색상 상속 */
        }

        /* 내가좋아하는 강의 목록을 나열하기 위한 CSS */
        .lecture-box {
            width: 30%;
            height: 150px;
            margin: 5px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
            padding: 10px;
        }
        .container-center {
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }
        .btnbtn {
            width: 100%;
        }
        .blinking-text {
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            background: linear-gradient(to right, red, orange, yellow, green, blue, indigo, violet);
            -webkit-background-clip: text;
            color: transparent;
            animation: rainbow 3s infinite linear, blinking 1s infinite alternate;
        }
        .logincontainer{
            width: 300px;
            height: 300px;
            margin: auto;
            margin-top: 100px;
        }
    </style>
</head>
<body>
    <div style="width:80%; margin: auto; margin-top:20px">
        <!-- 부트스트랩 navbar -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light justify-content-center">
            <div class="container">
                <a class="navbar-brand" href="../../index.php">CodeLearn</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>강의</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=sec">정보 보안</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=game">게임 개발</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=dbms">데이터베이스</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=cs">컴퓨터 공학</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=network">네트워크</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=cipher">암호학</a></li>
                                <li><a class="dropdown-item" href="../../gubun/index.php?gubun=programming">프로그래밍</a></li>
                            </ul>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <strong>커뮤니티</strong>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="../qna.php">질문 & 답변</a></li>
                                <li><a class="dropdown-item" href="../review.php">수강평</a></li>
                                <li><a class="dropdown-item" href="../study.php">스터디</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../loadmap/index.php"><strong>로드맵</strong></a>
                        </li>
                        <form class="d-flex" role="search" id="container" style="width:350px" action="../../search/index.php">
                            <input autocomplete="off" name="keyword" class="form-control me-2" type="search" placeholder="나의 진짜 성장을 도와줄 실무 강의를 찾아보세요" aria-label="Search" style="border-radius:10px; ">
                            <button type="submit">🔍</button>
                        </form>
                            <?php
                                if(!isset($_SESSION['login'])){

                            ?>
                            <li class="nav-item" style="flex:right">
                                <a class="nav-link" href="../login/login.php"><strong>로그인</strong></a>
                            </li>
                            <?php
                                }else{

                            ?>
                            <li class="nav-item">
                                <a class="nav-link" href="../login/logout.php"><strong>로그아웃</strong></a>
                            </li>
                        <?php
                            }
                        ?>
                        <?php 
                            if(isset($_SESSION['id'])){
                                if($_SESSION['id'] == 'admin'){
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php">관리자님</a>
                        </li>
                        <?php
                                }else{
                        ?>
                        <li class="nav-item">
                            <a class="nav-link" href="../mypage/index.php"><?=$_SESSION['login']?>님</a>
                        </li>
                        <?php
                                }
                            }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="parent">
            <div>
                <form action="./action.php" method="post" enctype="multipart/form-data">
                    <input type="text" style="width:700px" name="idx" placeholder="강의 인덱스를 입력해주세요. 1부터 시작입니다."><br>
                    <input type="title" style="width:700px" placeholder="강의 제목을 입력해주세요">
                    <textarea name="intro" id="" style="width:700px; height:300px" placeholder="강의 소개 입력란입니다. HTML 태그를 활용해서 작성해주세요 <br> 태그는 자동입력입니다."></textarea>
                    <textarea name="curriculum" id="" style="width:700px; height:300px" placeholder="강의 커리큘럼 대분류입니다. 쉼표를 기준으로 분류해주세요 ex)환경 설정, Python 기본 문법, 반복문, 제어문"></textarea>
                    <textarea name="detailcurri" id="" style="width:700px; height:300px" placeholder="강의 커리큘럼 소분류입니다. @를 기준으로 대분류를 구분하고 쉼표를 기준으로 소분류를 분류해주세요 ex)OT,Visual Studio Code 설치,환경변수 세팅@자료형 구조,연산자"></textarea>
                    
                    <div class="input-group mb-3">
                        <label class="input-group-text" for="inputGroupFile01">Upload</label>
                        <input type="file" class="form-control" id="inputGroupFile01" name="userfile">
                    </div>
                    <input type="submit" class="btn btn-outline-success" id="write" value="Write">
                    <button type="button" class="btn btn-outline-danger" id="back">Back</button>
                </form>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const back = document.querySelector('#back');
            back.addEventListener('click', () => {
                history.back(-1);
            });
        });
        const btn_submit = document.querySelector('#write');
        btn_submit.addEventListener("click", (e)=>{
            const title = document.querySelector('#title');
            const content = document.querySelector('.text-box');
            if(title.value == '') {
                alert('제목을 입력하세요.');
                title.focus()
                e.preventDefault();
                return
            }
            else if(content.value == ''){
                alert('본문을 입력하세요.');
                content.focus();
                e.preventDefault();
                return
            }else if(title.value.length > 30){
                alert('제목은 30글자를 넘을 수 없습니다.');
                title.focus();
                e.preventDefault();
                return
            }
        })
    </script>
</body>
</html>
