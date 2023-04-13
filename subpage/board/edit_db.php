<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $page = $_GET['page'];
    $board_number = $_GET['idx'];
    $title = $_POST['title'];
    $content = $_POST['content'];
    $date = date('Y-m-d');
    $select_category = $_POST['select_category'];

    $sql = "UPDATE board_esc4 set 
        title='$title', content='$content', date='$date', category='$select_category' 
        where idx='{$board_number}'";

    if ($conn->query($sql) === true) {
        echo "<script> 
                location.href = 'board.php'; </script>";
    } else {
        echo "<script>
                alert('글쓰기 실패');
                location.href = 'board.php';</script>";
    }

    $conn->close();
?>