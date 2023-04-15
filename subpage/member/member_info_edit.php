<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/member.css">
    <link rel="stylesheet" href="../../css/common.css">

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $current_url = $_GET['current_url'];
    $sql = "SELECT * from board_esc4_member where user_id='{$user_id}'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
?> 

        <div class="join member_info_edit d-flex justify-content-center align-items-center">
            <div class="form_container d-flex flex-column align-items-center">  <!-- flex-column -->
                <form action="member_info_edit_db.php?current_url=<?php echo $current_url ?>" method="post" class="d-flex flex-column justify-content-center" id='join_form'>  <!-- onsubmit="return formValidation()" -->
                    <!-- <img src="../../../images/class_esc_logo.svg" alt="">-->

                    <div class="CLASS_ESC_logo">
                        <h2>
                            회원정보 수정
                        </h2>
                    </div>

                        
                    <div class="form_wrapper d-flex flex-column gap-3"> 
                        <div class="form-floating">
                            <div class="member_info id d-flex flex-column">
                                <span> 아이디 </span>
                                <p> <?php echo $row['user_id'] ?> </p>
                            </div>
                        </div>
     
                        <div class="form-floating">
                            <input type="password" class="form-control user_pw" name="user_pw" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword"> 비밀번호 </label>
                            <span class="user_pw_span user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="password" class="form-control user_pw_check" name="user_pw_check" id="floatingPassword" placeholder="Password">
                            <label for="floatingPassword"> 비밀번호 확인 </label>
                            <span class="user_pw_check_span user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control user_name" name="user_name" id="floatingInput" value="<?php echo $row['user_name'] ?>">
                            <label for="floatingInput"> 이름 </label>
                            <span class="user_name_check user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control user_mail" name="user_mail" value="<?php echo $row['user_mail'] ?>">
                            <label for="floatingPassword"> 이메일 </label>
                            <span class="user_mail_check user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="tel" class="form-control user_phone_number" name="user_phone_number" value="<?php echo $row['user_phone'] ?>">
                            <label for="floatingPassword"> 전화번호 </label>
                            <span class="user_phone_check user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <div class="member_info d-flex flex-column">
                                <span> 가입 날짜 </span>
                                <p> <?php echo $row['user_join_date'] ?> </p>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary edit"> 수정 완료 </button>

                    <div type="hidden" class="btn btn-warning withdraw_btn"> 회원 탈퇴 </div>
                </form>

                <form action="member_withdraw_db.php?user_id=<?php echo $row['user_id'] ?>" class="form_withdraw" method="POST">
                    <h2> 회원탈퇴 </h2>

                    <div class="form_withdraw_wrapper">
                        <div class="form_withdraw_text">
                            <p class="confirm_text"> 회원탈퇴를 위해 &nbsp; "<span> <?php echo $row['user_id'] ?>/<?php echo $row['user_name'] ?> </span>" 을 입력하세요</p>
                            <input type="text" class="form-control confirm_text_typing" name="user_id_name" id="floatingInput">
                        </div>
                    </div>

                    <button type="submit" class="btn btn-warning withdraw_btn confirm disabled" > 확인 </button>
                </form>
            </div>
        </div>

        <script src="js/main.js"> </script>
        <script> 
       
            // 회원탈퇴 버튼 클릭시 검증 메뉴 하단에 표시
            let formWithdrawSection = $('.form_withdraw'),
                withdrawBtn = $('#join_form .withdraw_btn');

            formWithdrawSection.hide();

            withdrawBtn.click(function(){
                formWithdrawSection.fadeIn();
            }) // 회원탈퇴 버튼 클릭시 검증 메뉴 하단에 표시


            // 회원탈퇴 문구 실시간 검증
            let userId = "<?php echo $row['user_id'] ?>",
                userName = "<?php echo $row['user_name'] ?>";
                withdrawBtnConfirm = $('.form_withdraw .withdraw_btn');
  
            
            $('.confirm_text_typing').keyup(function(){
                if($('.confirm_text_typing').val() == userId+'/'+userName) {
                    withdrawBtnConfirm.addClass('confirm_opacity');
                    withdrawBtnConfirm.removeClass('disabled');
                } /* else {
                    withdrawBtn.removeClass('confirm_opacity');
                    withdrawBtn.addClass('disabled');
                } */
            }) //회원탈퇴 문구 실시간 검증



            let id = $('.user_id'),
                pw = $('.user_pw'),
                pwCheck = $('.user_pw_check'),
                name = $('.user_name'),
                mail = $('.user_mail'),
                phoneNumber = $('.user_phone_number');

            /* 비밀번호와 비밀번호 확인 일치여부(실시간) */
            pwCheck.keyup(function() {
                let userPw = pw.val(),
                    userPwCheck = pwCheck.val();

                setTimeout(() => {
                    if(userPw == "") { 
                        $('.user_pw_span').css("color", "red").html('필수 입력 사항 입니다');
                    } else if (!(userPw.length >= 6)){
                        $('.user_pw_span').css("color", "red").html('6자 이상 입력하세요');
                    } else {
                        $('.user_pw_span').css("color", "blue").html('사용가능');
                    }

                    if(userPw != userPwCheck) {
                        $('.user_pw_check_span').css("color", "red").html('비밀번호 불일치');
                    } else {
                        $('.user_pw_check_span').css("color", "blue").html('비밀번호 일치');
                    }
                }, 600);
            }) /* 비밀번호와 비밀번호 확인 일치여부(실시간) */


            /* 이름 유효성 검사(실시간) */
            name.keyup(function() {
                let nameFormat = /^[a-zA-Z가-힣]+$/;
                setTimeout(() => {
                    if(name.val() == "") {
                        $('.user_name_check').css("color", "red").html('필수 입력 사항 입니다');
                    } else if (!(nameFormat.test(name.val()))) {
                        $('.user_name_check').css("color", "red").html('한글 또는 알파벳만 입력하세요');
                    } else {
                        $('.user_name_check').css("color", "blue").html('사용가능');
                    }
                }, 600);

            }) /* 이름 유효성 검사(실시간) */
                   

            /* 이메일 유효성 검사(실시간) */
            mail.keyup(function() {
                let mailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                setTimeout(() => {
                    if(mail.val() == "") {
                        $('.user_mail_check').css("color", "red").html('필수 입력 사항 입니다');
                    } else if (!(mailFormat.test(mail.val()))) {
                        $('.user_mail_check').css("color", "red").html('이메일 형식으로 입력하세요');
                    } else {
                        $('.user_mail_check').css("color", "blue").html('사용 가능');
                    }
                }, 600);
            }) /* 이메일 유효성 검사(실시간) */

            /* 전화번호 유효성 검사(실시간) */
            phoneNumber.keyup(function() {
                setTimeout(() => {
                    if(phoneNumber.val() == "") {
                        $('.user_phone_check').css("color", "red").html('필수 입력 사항 입니다');
                    } else if(isNaN(phoneNumber.val())){
                        $('.user_phone_check').css("color", "red").html('숫자만 입력하세요');
                    } else {
                        $('.user_phone_check').css("color", "blue").html('사용가능');
                        check = $('.user_phone_check').text();
                    }
                }, 600);
            }) /* 전화번호 유효성 검사(실시간) */



            /* 회원가입 유효성 검사(제출후) */
            $('#join_form').submit(function(e) {
                e.preventDefault();
                
                    let error = {};
                        validationNumber = 0;

                    // 아이디 검증
                    let idFormat = /^[A-Za-z0-9]*$/;   /* /^[a-z][a-z0-9]{5,19}$/g */
                    if(id.val() == "") {
                        error.id = '필수 입력 사항입니다';
                        idCheckText();
                    } else if(!(idFormat.test(id.val()))) {
                        error.id = '영어, 숫자, 6~20자';
                        idCheckText();
                    } 

                    // 패스워드 검증
                    if(pw.val() == "" || pwCheck.val() == "") {
                        error.pw = "필수 입력 사항입니다";
                        pwCheckText();
                    } else if(pw.val() !== pwCheck.val()) {
                        error.pw = "비밀번호가 일치하지 않습니다";
                        pwCheckText();
                    } else if(!(pw.val() >= 6)) { 
                        error.pw = "6자리 이상 입력하세요"
                        pwCheckText();
                    }

                    // 이름 검증
                    let nameFormat = /^[a-zA-Z가-힣]+$/;
                    if(name.val() == "") {
                        error.name = '필수 입력 사항입니다';
                        nameCheckText();
                    } else if(!(nameFormat.test(name.val()))) {
                        error.name = '한글 또는 알파벳만 입력하세요'
                        nameCheckText();
                    }

                    // 메일 검증
                    let mailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                    if(mail.val() == "") {
                        error.mail = '필수 입력 사항입니다';
                        mailCheckText();
                    } else if (!(mailFormat.test(mail.val()))) {
                        error.mail = '이메일 형식으로 입력하세요';
                        mailCheckText();
                    }

                    // 전화번호 검증
                    if(phoneNumber.val() == "") {
                        error.phoneNumber = '필수 입력 사항입니다';
                        phonCheckText()
                    } else if(isNaN(phoneNumber.val())){
                        error.phoneNumber = '숫자만 입력하세요';
                        phonCheckText()
                    }


                    function idCheckText() {
                        $('.user_id_check').css("color", "red").text(error.id);
                    }

                    function pwCheckText() {
                        $('.user_pw_span').css("color", "red").text(error.pw);
                        $('.user_pw_check_span').css("color", "red").text(error.pw);
                    }

                    function nameCheckText() {
                        $('.user_name_check').css("color", "red").text(error.name);
                    }

                    function mailCheckText() {
                        $('.user_mail_check').css("color", "red").text(error.mail);
                    }

                    function phonCheckText() {
                        $('.user_phone_check').css("color", "red").text(error.phoneNumber);
                    }


                    if(Object.keys(error).length > 0) {
                        return false;
                    } else {
                        $.ajax({
                            type: "POST", 
                            url: "member_info_edit_db.php",
                            data: {
                                user_id: userId, 
                                user_pw: pw.val(),
                                user_pw_check: pwCheck.val(), 
                                user_name: name.val(),
                                user_mail: mail.val(),
                                user_phone_number: phoneNumber.val(), 
                            },
                            error: function() {
                                console.log('error');
                            },
                            success: function(return_data) {
                                alert('회원정보가 수정되었습니다'); 
                                console.log(return_data); 
                                location.href = '../../index.php';
                            }
                        });    
                    }
            }) /* 회원가입 유효성 검사(제출후) */

        </script>

    </body>
</html>
