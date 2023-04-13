<?php
    $conn = new mysqli("localhost", "myst", "mys908176^", "myst");
    
    // 연결 체크
    if($conn -> connect_errno) {
        echo "Connection Fail!".
        exit();
    }
?>