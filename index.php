<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>

<link rel="stylesheet" href="./css/main.css">
<link rel="stylesheet" href="./css/common.css">

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";
?>

<!-- POP UP -->
<dialog>
    <div class="popup_content">
        <div class="project_information">
            <h5> LMS 유저 페이지 제작 프로젝트 </h5>
            
            <p> <strong> 제작자 </strong> : 홍효헌(개인 프로젝트) </p>
            <p> <strong> 제작기간 </strong> : 23.03.20~23.04.13(총 제작기간) </p>
            <p> <strong> 아이디 </strong> : admin  </p>
            <p> <strong> 비밀번호 </strong> : admin1213 </p>

            <br>

            <p> <strong> 구현 설명 </strong> </p>
            <div class="explanation">
                <p> 과정 말기 프로젝트로 PHP를 활용하여 프론트와 백엔드를 연동했습니다 </p>
            </div>

            <p> <strong> 구현 내용 </strong> </p>
            <div class="explanation">
                <p> 
                    랜딩 페이지, 게시판, 로그인, 회원가입, 회원정보, 회원정보 수정, 회원탈퇴
                </p>
            </div>

            <p> <strong> 주요 기능 </strong> </p>
            <div class="explanation">
                <p> 게시글 읽기, 게시글 쓰기, 게시글 수정, 게시글 검색, 게시글 삭제, 페이지네이션 </p>
                <p> 회원제 게시판(회원만 글 쓰기 가능) </p>
                <p> 로그인, 회원가입, 회원정보, 회원 정보 수정, 회원 탈퇴 </p>
            </div>
            <p> <strong> 특징 </strong> </p>
            <p> 반응형 웹사이트 </p>
            <p> 회원제 게시판(회원만 글 쓰기 가능) </p>
            <p> 회원가입시 정규식을 활용한 유효성 검사 </p>
            <p> ajax를 활용한 아이디 중복검사 </p>
        </div>

        <div class="line"> </div>
        
        <div class="project_link">
            <p> <!-- <strong> Github </strong> :  --> <a href="https://github.com/threehHong/CLASS_ESC_userPage" target="_blank" class="popup_proposal"> CLASS ESC userPage GitHub 바로가기 </a> </p>
                                            
            <p> <!-- <strong> 소개서 </strong> :  --> <a href="https://github.com/threehHong/CLASS_ESC_userPage/blob/main/CLASS%20ESC%20%EC%86%8C%EA%B0%9C%EC%84%9C.pdf" target="_blank" class="popup_proposal"> CLASS ESC userPage 소개서 보기 </a> </p>
            
            <!-- <p> <strong> 디자인 </strong> : <a href="https://www.figma.com/file/Wy8zF0if9P3aq6GH6qZFn2/Portfolio-%EB%94%94%EC%9E%90%EC%9D%B8?node-id=7%3A1120&t=DLpuJiIefBqKRzk1-1" target="_blank" class="popup_proposal"> CLASS ESC 디자인 보기 </a> </p> -->
        </div>

        <form action="">
            <label for="daycheck"> 오늘 하루 보지 않기 </label>
            <input type="checkbox" id="daycheck">                    
        </form>

    </div>
    <div class="popup_close">
        <!-- <i class="fa-solid fa-xmark"></i> -->
        <p> 닫기</p> 
    </div>  
</dialog>
<!-- POP UP -->

<main>  
    <div class="main_wrapper container">
        <!-- SECTION SLIDE -->
        <h2 class="hidden"> SECTION SLIDE </h2>
        <section class="section_slide"> 
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                    <p> The future depends on what we do in the present </p>
                    <span> Mohattma Gandhi </span>
                    </div>
                    
                    <div class="swiper-slide">
                    <p> Energy and persistence conquer all things </p>
                    <span> Benjamin Franklin </span>
                    </div>
                    
                    <div class="swiper-slide">
                    <p> Life is like riding a bicycle. To keep your balance you must keep moving </p>
                    <span> Albert Einstein </span>
                    </div>
                    
                    <div class="swiper-slide">
                    <p> If you can dream it, you can do it. </p>
                    <span> Walt Disney </span>
                    </div>
                    
                    <div class="swiper-slide">
                    <p> Our greatest weakness lies in giving up.
                        The most certain way to succeed is
                        always to try just one more time </p>
                    <span> Thomas A. Edison </span>
                    </div>
                </div>

                <div class="swiper-button-next"> <i class="fa-solid fa-chevron-right"></i> </div> <!-- <i class="fa-solid fa-angle-right"></i> -->
                <div class="swiper-button-prev"> <i class="fa-solid fa-chevron-left"></i></i> </div>

                <div class="finger"> <i class="fa-solid fa-hand-point-up"></i> </div>
                </div>
        </section>
        
        <!-- SECTION ABOUT -->
        <h2 class="hidden"> SECTION ABOUT </h2>
        <section class="section_about"> <!-- flex-column -->
            <div class="section_about_bg d-flex justify-content-center align-items-center"> 
                <ul class="about_banner d-flex flex-column align-items-center">
                    <li class="about_banner_logo"> LOGO IMAGE </li>

                    <div class="about_banner_ex_wrap">
                        <div class="about_banner_ex ex1 active_about_opacity">
                            <li>
                                <p> Easy Speed Compotable </p>
                                <p> 쉽고 빠르고 편하게 모두를 위한 교육 플랫폼 </p>
                            </li>
                        </div>

                        <div class="about_banner_ex ex2">
                            <li>
                                <p> HTML부터 Java 까지 </p>
                                <p> 웹개발을 위한 모든 과정을 한곳에 모았습니다 </p>
                            </li>
                        </div>
                    </div>
                </ul>

        
                <ul class="pager d-flex">
                    <li class="btn_first active_page"> 
                        <span> 1페이지 박스 </span>
                    </li>
                    
                    <li class="btn_second">
                        <span> 2페이지 박스 </span>
                    </li>

                    <li class="play_stop">
                        <div>
                            <span class="play_btn"> </span>
                            <span class="stop_btn active_play_stop"> </span>
                        </div>
                    </li>
                </ul>
                
            </div>
        </section>

        <!-- SECTION ABOUT과 SECTION LECTURE 사이를 연결하는 LINE -->
        <div class="line1">
            <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path1"/>
            </svg>
        </div>

        <!-- SECTION LECTURE -->
        <h2 class="hidden"> SECTION LECTURE </h2>
        <section class="section_lecture">
            <div class="lecture_list">
                <nav class="lecture_list_menu d-flex align-items-center">
                    <a href="#" data-filter="*" class="active"> All </a> <span> bar </span>
                    <a href="#" data-filter=".front"> 프론트 </a> <span> bar </span>
                    <a href="#" data-filter=".back"> 백엔드 </a>
                </nav>
                
                <div class="row row-cols-1 row-cols-md-3 g-4">
                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/figma.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Figma를 활용한 실무 UI Design </h5>
                            <p class="card-text"> 실제 현장에서 사용된 기획과 디자인 예시를 똑같이 만들어 보면서 피그마 사용법을 알려드립니다.  </p>
                        </div>
                        </div>
                    </div>

                    <div class="col back" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_backend/mysql.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> 따라치며 배우는 My SQL  </h5>
                            <p class="card-text"> 따라 입력하다 보면 어느새 이해하게 되는 My SQL, 실전에서 사용되는 예제들을 다뤄보며 익혀봅시다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col back" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_backend/laravel.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> php기반 프레임워크 </h5>
                            <p class="card-text"> PHP 기초 내용과 MVC 개발 방식에 대해 설명하고 Laravel을 활용한 맛집 지도를 만들어 봅니다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/js_jquery.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Vanila JS + JQUERY </h5>
                            <p class="card-text"> 이미지 슬라이드, 아코디언, 모달, 다크모드와 같은 기능들을 구현하며 순수 자바스크립트와 제이쿼리를 알아갑시다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/html_css_js.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> HTML + CSS + JS </h5>
                            <p class="card-text"> 웹개발을 하려면 반드시 알아야 하는 언어로 기초부터 확실하게 잡고 갑니다 웹퍼블리셔나 프론트엔드 개발자로 한걸음 나아갑시다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col back" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_backend/java.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> JAVA의 정석 </h5>
                            <p class="card-text"> 변수, 연산자, 배열, 반복문, 예외처리부터 객체지향 상속, 다형성, 추상화, 인터페이스 등에 대해서 학습 합니다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/git_github.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Git & GitHub </h5>
                            <p class="card-text"> git의 기초 개념과 환경 셋팅 부터 고급 기능까지 학습하고 이를 업무에 적용하는 방법까지 쉽게 알려드립니다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/adobe.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Adobe Photoshop for Web Design </h5>
                            <p class="card-text"> 웹디자인에 필요한 기술들을 직접 만들어 보 <br> 면서 포토샵 공부합시다  </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/react.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> React 기초 </h5>
                            <p class="card-text"> component, props, state, class, redux, Router DOM, 클래스형, 함수형 등 react에 사용되는 내용들을 개념 위주로 정리해주는 강의 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/agural&react.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Angular VS React </h5>
                            <p class="card-text"> Angular와 React를 비교하며 기초적인 내용을 정리하고. 이를 활용해 간단한 웹앱 만들기 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col front" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_front/bootstrap.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> Bootstrap5 Framework Tutorial </h5>
                            <p class="card-text"> 빠르고 손쉽게 웹의 외형을 만들기 위해 필수로 배워야 하는 프레임워크, 개인 소개 홈페이지를 부트스트랩으로 만들어 익혀봅시다 </p>
                        </div>
                        </div>
                    </div>

                    <div class="col back" data-category="lecture">
                        <div class="card h-100">
                        <img src="./images/lecture/lecture_backend/aws.svg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"> 입문자를 위한 AWS </h5>
                            <p class="card-text"> AWS에 사용되는 기초 내용들을 정리하고 Elastic Beanstalk 를 통해 배포하기 </p>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>


        <!-- SECTION과 SECTION 사이를 연결하는 LINE -->
        <div class="line2">
            <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path2"/>
            </svg>
                
        </div>

        <!-- SECTION ROADMAP -->
        <h2 class="hidden"> SECTION ROADMAP </h2>
        <section class="section_roadmap">
        
            <!-- SECTION ROADMAP FRONT -->
            <div class="section_roadmap_front">
                <ul class="section_roadmap_title">
                    <li> FRONT-END ROAD MAP </li>
                </ul>
                    <img src="images/roadmap_line/frontend_roadmap.svg" alt="LINE_IMAGE">
            </div>

            <!-- FRONT-END ROAD MAP과 BACK-END ROAD MAP 사이를 연결하는 LINE -->
            <div class="line3">
                <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path3"/>
                </svg>
                    
            </div>

            <!-- SECTION ROADMAP BACK -->
            <div class="section_roadmap_back">
                <ul class="section_roadmap_title">
                    <li> BACK-END ROAD MAP </li>
                </ul>
                <img src="images/roadmap_line/backend_roadmap.svg" alt="LINE_IMAGE">
            </div>

            <!-- BACK-END ROAD MAP과 게시판 사이를 연결하는 LINE -->
            <div class="line4">
                <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path4"/>
                </svg>
            </div>

        </section>


        <!-- ICON BANNER -->
        <h2 class="hidden"> ICON BANNER </h2>
        <div class="icon_banner">
            <div class="icon_banner_wrap d-flex">
                <img src="images/LGO_BANNER_H150.svg" alt="LGO_BANNER" class="banner_large">
                <img src="images/LGO_BANNER_H100.svg" alt="LGO_BANNER" class="banner_medium">
                <img src="images/LGO_BANNER_H50.svg" alt="LGO_BANNER" class="banner_small">
            </div>
        </div>
        
        <!-- ICON BANNER과 게시판 사이를 연결하는 LINE -->
        <div class="line5">
            <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path5"/>
            </svg>
        </div>


        <!-- SECTION PREVIEW BOARD -->
        <h2 class="hidden"> SECTION PREVIEW BOARD </h2>
        <section class="preview_board">
            <div class="preview_board_bg">
                <div class="preview_board_wrapper container d-flex align-items-center">
                    <div class="list_group_wrapper">
                        <div class="list_group_wrapper_inner"> 
                            <h3> Q&A </h3>
                            <ul class="list-group">
                                
                                <?php
                                    $sql = "SELECT * from board_esc4 order by idx desc limit 0, 7";

                                    $result = $conn->query($sql);

                                    while ($row = $result->fetch_assoc()) {
                                        $title = $row['title'];
                                        $bno = $row['idx'];


                                        if (mb_strlen($title) > 25) {
                                            $title = str_replace($row['title'], mb_substr($row['title'], 0, 25) . "...", $row['title']);
                                        }


                                    /* 새글 여부 */
                                    $post_time = $row['date'];
                                    $now = date('Y-m-d');
                                    if($post_time == $now) {
                                        $new_post_icon = '<span class="new_post"> new </span>';
                                    } else {
                                        $new_post_icon = '';
                                    } /* 새글 여부 */

                                    /* 댓글 개수 */ 
                                    $sql_comment = "SELECT COUNT(*) as cnt from board_esc4_comment where comment_number = '{$bno}'";
                                    $result_comment = $conn->query($sql_comment);
                                    $row_comment = $result_comment->fetch_assoc();

                                    if($row_comment['cnt'] > 0 ) {
                                        $comment_cnt = $row_comment['cnt'];

                                        $comment_cnt = '<span class="comment_number"> '.$comment_cnt.' </span>';
                                    } else {
                                        $comment_cnt = '';
                                    } /* 댓글 개수 */
                                ?>

                                <li class="list-group-item d-flex">
                                    <a href="subpage/board/read.php?idx=<?php echo $row['idx']; ?>&page=<?php echo $page; ?>">
                                        <?php echo $title ?> <?php echo $new_post_icon ?> <?php echo $comment_cnt ?>
                                    </a>
                                    <span class="badge rounded-pill"> <?php echo $row['date']; ?> </span>
                                </li>

                                <?php } ?>
                            </ul>

                            <div class="preview_board_btn">
                                <a href="subpage/board/board.php" class="d-flex justify-content-center align-items-center"> View All <i class="fa-solid fa-arrow-right"></i> </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- 게시판과 FOOTER 사이를 연결하는 LINE -->
        <div class="line6">
            <svg width="61" height="423" viewBox="0 0 61 423" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M28.1741 2C131.258 173.5 -65.7424 221 28.1741 422" stroke="#2B78E4" stroke-width="4" class="path6"/>
            </svg>
        </div>

    </div>
</main>

<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/footer.php";
?>
        


