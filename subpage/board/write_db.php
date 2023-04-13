<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";
    
    $user_id = $_GET['user_id'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $select_category = $_POST['select_category'];

    $sql = "INSERT INTO board_esc4 (name, title, content, date, category)
    VALUES ('{$user_id}', '{$title}', '{$content}', '{$date}', '{$select_category}')";

    if ($conn->query($sql) === true) {
        echo "<script> 
                location.href = '../board/board.php'; </script>";
    } else {
        echo "<script>
                alert('글쓰기 실패');
                location.href = 'board.php';</script>";
    }

    $conn->close();
?>