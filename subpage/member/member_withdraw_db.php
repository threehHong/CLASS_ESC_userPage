<?php
    session_start();

    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";
    
    $user_id = $_GET['user_id'];
    
    $sql = "DELETE from board_esc4_member where user_id='".$user_id."'";
    $result = $conn -> query($sql) or die("query error =>".$mysqli_error);

    if($conn -> query($sql) === true) {
        session_destroy();

        echo
        "<script>
            alert('회원탈퇴가 정상적으로 처리되었습니다');
            location.href='../../index.php'
        </script>";
    } else{
        echo 
        "<script>
            alert('회원탈퇴 실패.');
            history.back();
        </script>";
        exit;
    }
    
    $conn->close();
?>
