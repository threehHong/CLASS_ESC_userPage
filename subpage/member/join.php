<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/member.css">
    <link rel="stylesheet" href="../../css/common.css">

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $current_url = $_GET['current_url'];
    $user_id = $_GET['user_id'];

    /* $sql = "SELECT * from board_esc4_member where user_id='{$user_id}'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc(); */
?> 

        <div class="join d-flex justify-content-center align-items-center">
            <div class="form_container d-flex justify-content-center align-items-center"> 
                <form action="join_db.php?current_url=<?php echo $current_url ?>" method="post" class="d-flex flex-column justify-content-center" id='join_form'>  <!-- onsubmit="return formValidation()" -->
                    <!-- <img src="../../../images/class_esc_logo.svg" alt="">-->

                    <div class="CLASS_ESC_logo">
                        <h2>
                            회원가입
                        </h2>
                    </div>
                        
                    <div class="form_wrapper d-flex flex-column gap-3"> 
                        <div class="form-floating">
                            <input type="text" class="form-control user_id" name="user_id" id="floatingInput" placeholder=" 아이디 입력">
                            <label for="floatingInput"> 아이디 </label>
                            <span class="user_id_check user_check"> </span>
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
                            <input type="text" class="form-control user_name" name="user_name" id="floatingInput" placeholder="Name">
                            <label for="floatingInput"> 이름 </label>
                            <span class="user_name_check user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="text" class="form-control user_mail" name="user_mail" placeholder="Email">
                            <label for="floatingPassword"> 이메일 </label>
                            <span class="user_mail_check user_check"> </span>
                        </div>

                        <div class="form-floating">
                            <input type="tel" class="form-control user_phone_number" name="user_phone_number" placeholder="PhoneNumber">
                            <label for="floatingPassword"> 전화번호 </label>
                            <span class="user_phone_check user_check"> </span>
                        </div>

                    </div>

                    <button type="submit" class="btn btn-primary"> 회원가입 </button>
                </form>
            </div>
        </div>
        
        <script src="js/main.js"> </script>
        <script>
            let id = $('.user_id'),
                pw = $('.user_pw'),
                pwCheck = $('.user_pw_check'),
                name = $('.user_name'),
                mail = $('.user_mail'),
                phoneNumber = $('.user_phone_number');

            /* 아이디 중복 체크(실시간)  */
            // id.keyup(function() {
            id.blur(function() {

                let userId = id.val();

                $.ajax({
                    /* async:true, */
                    type: 'post',
                    url: 'join_ajax.php',
                    data: {
                        userId: userId,
                    },
                    dataType: 'json',
                    error: function() {
                        console.log('error');
                    }, 
                    success: function(return_data) {
                        
                        console.log(return_data.user_id_check);

                        if(return_data.user_id_check == '사용가능') {
                            $('.user_id_check').css("color", "blue").html(return_data.user_id_check);
                        } else {
                            $('.user_id_check').css("color", "red").html(return_data.user_id_check);
                        } 

                    }
                })

            }) /* 아이디 중복 체크(실시간)  */


            /* 비밀번호와 비밀번호 확인 일치여부(실시간) */
            pwCheck.blur(function() {
                let userPw = pw.val(),
                    userPwCheck = pwCheck.val();

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
            }) /* 비밀번호와 비밀번호 확인 일치여부(실시간) */


            /* 이름 유효성 검사(실시간) */
            name.blur(function() {
                let nameFormat = /^[a-zA-Z가-힣]+$/;
                    if(name.val() == "") {
                        $('.user_name_check').css("color", "red").html('필수 입력 사항 입니다');
                    } else if (!(nameFormat.test(name.val()))) {
                        $('.user_name_check').css("color", "red").html('한글 또는 알파벳만 입력하세요');
                    } else {
                        $('.user_name_check').css("color", "blue").html('사용가능');
                    }
            }) /* 이름 유효성 검사(실시간) */
                   

            /* 이메일 유효성 검사(실시간) */
            mail.blur(function() {
                let mailFormat = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
                if(mail.val() == "") {
                    $('.user_mail_check').css("color", "red").html('필수 입력 사항 입니다');
                } else if (!(mailFormat.test(mail.val()))) {
                    $('.user_mail_check').css("color", "red").html('이메일 형식으로 입력하세요');
                } else {
                    $('.user_mail_check').css("color", "blue").html('사용 가능');
                }
            }) /* 이메일 유효성 검사(실시간) */

            /* 전화번호 유효성 검사(실시간) */
            phoneNumber.blur(function() {
                if(phoneNumber.val() == "") {
                    $('.user_phone_check').css("color", "red").html('필수 입력 사항 입니다');
                } else if(isNaN(phoneNumber.val())){
                    $('.user_phone_check').css("color", "red").html('숫자만 입력하세요');
                } else {
                    $('.user_phone_check').css("color", "blue").html('사용가능');
                    check = $('.user_phone_check').text();
                }
            }) /* 전화번호 유효성 검사(실시간) */
            

            /* 회원가입 유효성 검사(제출후) */
            $('#join_form').submit(function(e){
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
                            url: "join_db.php",
                            data: {
                                user_id: id.val(), 
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
                                alert('회원가입이 완료되었습니다'); 
                                console.log(return_data); 
                                location.href = '../../index.php';
                            }
                        });    
                    }
            }) /* 회원가입 유효성 검사(제출후) */
           

            /* 경고 메세지 삭제 */
            id.keyup(function() {
                $('.user_id_check').html("");
            })
            pw.keyup(function() {
                $('.user_pw_span').html("");
            })
            pwCheck.keyup(function() {
                $('.user_pw_check_span').html("");
            })
            name.keyup(function() {
                $('.user_name_check').html("");
            })
            
            mail.keyup(function() {
                $('.user_mail_check').html("");
            })
            phoneNumber.keyup(function() {
                $('.user_phone_check').html("");
            }) /* 경고 메세지 삭제 */



            /* function formValidation() {
                if(name.val() == "" && phoneNumber.val() == "") {
                    $('.user_name_check').css("color", "red").html('필수 입력 사항입니다');
                    $('.user_phone_check').css("color", "red").html('필수 입력 사항입니다');
                    return false;
                } else if (name.val() == "" && phoneNumber.val() != null ) {
                    $('.user_name_check').css("color", "red").html('필수 입력 사항입니다');
                    return false;
                } else if (name.val() != null && phoneNumber.val() == "") {
                    $('.user_phone_check').css("color", "red").html('필수 입력 사항입니다');
                    return false;
                } else if(name.val() != null && isNaN(phoneNumber.val())) {
                    $('.user_phone_check').css("color", "red").html('숫자만 입력하세요');
                    return false;
                } else if(name.val() == "" && isNaN(phoneNumber.val())) {
                    $('.user_name_check').css("color", "red").html('필수 입력 사항입니다');
                    $('.user_phone_check').css("color", "red").html('숫자만 입력하세요');
                    return false;
                }  else {
                    return true;
                }
            } */

        </script>
    </body>
</html>
