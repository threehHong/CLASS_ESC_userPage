<?php
    include $_SERVER["DOCUMENT_ROOT"] . "/esc4/subpage/common/db_connect.php";
    
    session_start();
    
    if (!$_SESSION['ID']) {
        
    } else {
        $user_id = $_SESSION['ID'];
        /* $sql = "SELECT * from board_esc4_member where user_id='{$user_id}'";
        $result = $conn -> query($sql);
        $rs = $result -> fetch_object(); */
    }
    
    $current_url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

?>

<!DOCTYPE html> 

<html lang="en">
    <head>
        <meta name="keywords" content="온라인 교육, 온라인 교육 플랫폼">
        <meta name="keywords" content="esc, inflearn, udemy, fastcampus, udemy, 클래스101">
        <meta name="keywords" content="kmooc, coursera, edx">
        <meta name="description" content="쉽고 빠르고 편하게 모두를 위한 교육 플랫폼">
        <meta name="robots" content="index, follow">
        <meta name="robots" content="all"> 

        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!-- favicon -->
        <link rel="shortcut icon" href="images/esc_favicon.svg" type="image/x-icon">
        
        <!-- 모바일에서 숫자 파란색 링크 표시 막는 메타 태그 -->
        <meta name="format-detection" content="telephone=no" />
        
        <!-- CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css" integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />
        <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
