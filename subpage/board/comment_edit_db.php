<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $comment_idx = $_GET['comment_idx'];
    $comment_number = $_GET['comment_number'];
    $content = $_POST['content'];


    $sql = "UPDATE board_esc4_comment set content='$content' where comment_number = '{$comment_number}' AND idx = '{$comment_idx}'";

    if ($conn->query($sql) === true) {
        echo "<script> 
                alert('댓글 수정이 완료되었습니다');
                location.href = `read.php?idx=$comment_number`; </script>";
    } else {
        echo "<script>
                alert('댓글 수정 실패');
                location.href = 'board.php';</script>";
    }

    $conn->close();
?>