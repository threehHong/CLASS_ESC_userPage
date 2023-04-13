<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $comment_number = $_GET['comment_number'];
    $comment_idx = $_GET['comment_idx'];

    $sql = "DELETE from board_esc4_comment where comment_number = '{$comment_number}' AND idx = '{$comment_idx}'";

    if ($conn->query($sql) === true) {
        echo "<script> 
                alert('댓글 삭제되었습니다');
                location.href = `read.php?idx=$comment_number`; </script>";
    } else {
        echo "<script>
                alert('댓글 삭제 실패');
                location.href = 'board.php';</script>";
    }
?>





