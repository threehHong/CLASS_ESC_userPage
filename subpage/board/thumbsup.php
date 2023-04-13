<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $bno = $_GET['idx'];
    
    $sql = "SELECT thumbsup from board_esc4 where idx='{$bno}'";
    $result = $conn -> query($sql);
    $row = $result -> fetch_assoc();
    $newthumbsup = $row['thumbsup'] + 1;
    /* $bno 클릭한 번호 */
    $sql = "UPDATE board_esc4 set thumbsup = '{$newthumbsup}' where idx='{$bno}'";

    if($conn -> query($sql) === true) {
        echo 
        "<script> 
            alert('추천되었습니다.');
            location.href = 'board.php'; 
        </script>";
    }

    $conn -> close();

?>
