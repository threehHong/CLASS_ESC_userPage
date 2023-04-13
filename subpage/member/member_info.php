<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/member.css">
    <link rel="stylesheet" href="../../css/common.css">

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $current_url = $_GET['current_url'];
    $user_id = $_GET['user_id'];

    $sql = "SELECT * from board_esc4_member where user_id='{$user_id}'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();

?> 

        <div class="join d-flex justify-content-center align-items-center">
            <div class="form_container d-flex justify-content-center align-items-center"> 
            <form action="join_db.php?current_url=<?php echo $current_url ?>" method="post" class="d-flex flex-column justify-content-center" id='join_form'>  <!-- onsubmit="return formValidation()" -->

                    <div class="CLASS_ESC_logo">
                        <h2>
                            회원정보
                        </h2>
                    </div>
                        
                    <div class="form_wrapper d-flex flex-column gap-3"> 
                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 아이디 </span>
                                <p> <?php echo $row['user_id'] ?> </p>
                            </div>
                        </div>

                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 이름 </span>
                                <p> <?php echo $row['user_name'] ?> </p>
                            </div>
                        </div>

                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 이메일 </span>
                                <p> <?php echo $row['user_mail'] ?> </p>
                            </div>
                        </div>

                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 전화번호 </span>
                                <p> <?php echo $row['user_phone'] ?> </p>
                            </div>
                        </div>

                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 가입 날짜 </span>
                                <p> <?php echo $row['user_join_date'] ?> </p>
                            </div>
                        </div>

                    </div>

                    <a href="member_info_edit.php?user_id=<?php echo $user_id ?>" class="btn btn-primary"> 회원정보 수정 </a>
                </form>
            </div>
        </div>
        
        <script src="js/main.js"> </script>

    </body>
</html>
