<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $current_url = $_GET['current_url'];
    $user_id = $_GET['user_id'];
    $board_number = $_GET['idx'];
    $comment_content = $_POST['comment_content'];
    $date = date('Y-m-d H:i:s');

    $sql = "INSERT INTO board_esc4_comment (comment_number, comment_name, content, date)
    VALUES ('{$board_number}', '{$user_id}', '{$comment_content}', '{$date}')";

    echo $user_id;

    if(!$user_id) {
        echo "<script>
            location.href = `../member/login.php?current_url=$current_url`; </script>";
    }

    if ($conn->query($sql) === true) {
        echo "<script> 
                alert('댓글 작성이 완료되었습니다');
                location.href = `read.php?idx=$board_number`; </script>";
    } else {
        echo "<script>
                alert('글쓰기 실패');
                location.href = 'board.php';</script>";
    }

    $conn->close();
?>