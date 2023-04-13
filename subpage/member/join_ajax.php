<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";

    $user_id = $_POST['userId'];
    $user_pw = $_POST['userPw'];
    $user_pw_check = $_POST['userPwCheck'];
    
    $user_phone_number = $_POST['userPhoneNumber'];
    
    $sql = "SELECT * from board_esc4_member where user_id='{$user_id}'";
    $result = $conn -> query($sql);
    $rs = $result -> fetch_object();

    /* 아이디 검증 */
    if($user_id == "") {
        $return_data['user_id_check'] = '필수 입력 사항 입니다';
    } else if($rs) {
        $return_data['user_id_check'] = '중복된 아이디 입니다';
    } else if(!(preg_match("/^[a-zA-Z0-9]+$/", $user_id))) {
        $return_data['user_id_check'] = '영문이나 숫자만 입력하세요';
    } else if (!(strlen($user_id) >= 6)) { 
        $return_data['user_id_check'] = '6자 이상 입력하세요';
    } else {
        $return_data['user_id_check'] = '사용가능';
    }

    echo json_encode($return_data);

    $conn->close();
?>
