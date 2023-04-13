<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";
    
    session_start();

    $current_url = $_GET['current_url'];

    $user_id = $_POST["id"];
    $user_pw = $_POST["passwd"];
    $user_pw = hash('sha512',$user_pw);
    
    $sql = "SELECT * from board_esc4_member where user_id='{$user_id}' and user_pw='{$user_pw}'";
    $result = $conn -> query($sql);
    $rs = $result -> fetch_object();

    if($rs){   
        $sql = "UPDATE board_esc4_member set last_login=now() where user_idx = '{$rs->user_idx}'";
        $result = $conn -> query($sql);
        
        $_SESSION['ID'] = $rs -> user_id;
        $_SESSION['NAME'] = $rs -> user_name;
            echo
                "<script>
                    location.href = '$current_url';
                </script>";
            exit;
    } else{
        echo 
        "<script>
            alert('아이디 또는 비밀번호가 일치하지 않습니다.');
            history.back();
        </script>";
        exit;
    }
?>

<!-- let current_url = '$current_url'; -->