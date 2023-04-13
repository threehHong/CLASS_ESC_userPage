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
    
    $sql = "INSERT INTO board_esc4_member (user_id, user_pw, user_name, user_mail, user_phone, user_join_date)
    VALUES ('{$user_id}', '{$user_pw}', '{$user_name}', '{$user_mail}', '{$user_phone_number}', '{$user_join_date}')";

    /* $return_data = $current_url; */

    if ($conn->query($sql) === true) {
        $return_data = '회원가입이 완료되었습니다';
        
            /* "<script> 
            alert('회원가입이 완료되었습니다');  
            location.href = '$current_url'; </script>"; */
    } else {
        echo "<script>
                alert('회원가입 실패');
                location.href = 'join.php';</script>";
    }

    echo json_encode($return_data);

    $conn->close();

?>