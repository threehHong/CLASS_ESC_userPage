<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/member.css">
    <link rel="stylesheet" href="../../css/common.css">

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $current_url = $_GET['current_url'];
    $board_idx = $_GET['idx'];
?>

        <div class="log_in d-flex justify-content-center align-items-center">
            <div class="form_container d-flex justify-content-center"> 
                <form action="login_db.php?current_url=<?php echo $current_url ?>&board_idx=<?php echo $board_idx?>" method="post" class="d-flex flex-column justify-content-center">
                    <div class="CLASS_ESC_logo">
                        <h2>
                            <a href="http://myst.dothome.co.kr/esc4/index.php"> CLASS ESC LOGO </a>
                        </h2>
                    </div>
                        
                    <div class="form_wrapper d-flex flex-column gap-2"> 
                        <div class="form-floating">
                            <input type="text" class="form-control" name="id" id="floatingInput" placeholder="아이디 입력">
                            <label for="floatingInput"> <i class="fa-solid fa-user"></i> 아이디 </label>
                        </div>
            
                        <div class="form-floating">
                            <input type="password" class="form-control" name="passwd" id="floatingPassword" placeholder="Password">
                            <!-- admin1213 -->
                            <label for="floatingPassword"> <i class="fa-solid fa-lock"></i> 비밀번호 </label>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary"> 로그인 </button>

                    <div class="id_pw_memeber">
                        <ul class="d-flex justify-content-center gap-2">
                            <li> 아이디 찾기 </li> <span> | </span>
                            <li> 비밀번호 찾기 </li> <span> | </span>
                            <li> <a href="join.php"> 회원가입 </a> </li>
                        </ul>
                    </div>
                </form>
            </div>
        </div>
            


        <script src="js/main.js"> </script>
    </body>
</html>