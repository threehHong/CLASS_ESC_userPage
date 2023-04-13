<?php
    session_start();

    session_destroy();

    $current_url = $_GET['current_url'];

    if(session_status() === PHP_SESSION_NONE) {
        echo "<script> 
                location.href = '$current_url';  
              </script>";
    } else {
        echo '로그아웃 실패';
    }
?>