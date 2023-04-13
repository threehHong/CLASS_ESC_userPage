<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    // $current_url = $_GET['current_url'];
    
    $user_id = $_POST['user_id'];
    $user_pw = $_POST['user_pw'];
    $user_pw_check = $_POST['user_pw_check'];
    $user_name = $_POST['user_name'];
    $user_mail = $_POST['user_mail'];
    $user_phone_number = $_POST['user_phone_number'];
    $user_join_date = date('Y-m-d');

    if($user_pw == $user_pw_check) {
        $user_pw = hash('sha512',$user_pw);
    } else {
        echo "<script> 
        alert('비밀번호가 일치하지 않습니다');
        location.href = 'join.php'; </script>";
    }
    
    $sql = "UPDATE board_esc4_member SET user_pw='$user_pw', user_name='$user_name', user_mail='$user_mail', user_phone='$user_phone_number' where user_id='{$user_id}'";

    /* $return_data = $current_url; */

    if ($conn->query($sql) === true) {
        // $return_data = '회원가입이 완료되었습니다';
        $return_data = $sql;
        
    } else {
        echo "<script>
                alert('회원가입 실패');
                location.href = 'join.php';</script>";
    }

    echo json_encode($return_data);

    $conn->close();

?>