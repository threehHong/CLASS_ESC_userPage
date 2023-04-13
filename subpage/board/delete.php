<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";
    
    /* read.php DELETE */
    $board_num = $_GET['idx'];
    $sql = "DELETE from board_esc4 where idx='".$board_num."' ";
    $result = $conn -> query($sql) or die("query error =>".$mysqli_error);

    if($conn -> query($sql) === true) {
        echo
        "<script>
            alert('삭제되었습니다');
            location.href='board.php'
        </script>";
    }
    
    $conn->close();
?>
