        <!-- JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.4/jquery.min.js" integrity="sha512-pumBsjNRGGqkPzKHndZMaAG+bir374sORyzM3uulLV14lN5LyykqNk8eEeUlUkB3U0M4FApyaHraT65ihJhDpQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
        <script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>

        <title> Class ESC </title>
    </head>

    <body>
        <header>
            <nav class="navbar navbar-expand-lg">
                <div class="navbar_wrapper container-fluid container"> 
                    <h1 class="logo">
                        <a class="navbar-brand" href="http://myst.dothome.co.kr/esc4/index.php"> CLASS ESC </a>
                    </h1>

                    <div class="collapse navbar-collapse justify-content-end" id="navbarTogglerDemo02" >
                        <ul class="nav_menu navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" aria-current="page" href="#"> ABOUT <?php $user_id ?> </a> 
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="#"> LECTURE </a>
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="http://myst.dothome.co.kr/esc4/subpage/board/board.php"> Q&A </a>
                            </li>
                        </ul>

                        <!-- 세션에 ID가 여부에 따라 로그인과 회원가입 메뉴 or 사용자 ID와 로그아웃 아이콘 표시 -->
                        <?php
                            if(!$user_id) {
                        ?>
                        
                        <ul class="navbar-nav">
                            <li class="nav-item"> <a class="nav-link" href="http://myst.dothome.co.kr/esc4/subpage/member/login.php?current_url=<?php echo $current_url ?>"> 로그인 </a></li>
                            <li> <a class="nav-link" href="http://myst.dothome.co.kr/esc4/subpage/member/join.php?current_url=<?php echo $current_url ?>"> 회원가입 </a></li>
                        </ul>

                        <?php } else { ?>

                        <ul class="navbar-nav">
                            <li class="nav-item"> <a class="nav-link" href="http://myst.dothome.co.kr/esc4/subpage/member/member_info.php?user_id=<?php echo $user_id ?>"> <?php echo $user_id ?> </a> </li>
                            <li> <a class="nav-link" href="http://myst.dothome.co.kr/esc4/subpage/member/logout.php?current_url=<?php echo $current_url ?>"> <i class="fa-solid fa-right-from-bracket"></i> </a></li>
                        </ul>

                        <?php } ?>
                    </div>

                    <div class="navbar-toggler">
                        <a href="#" class="hamburger_button">
                            <span> </span>
                            <span> </span>
                            <span> </span>
                            <span> </span>
                        </a>
                    
                    </div>

                    <div class="mobile_side_menu d-flex justify-content-center align-items-center">
                        

                        <nav class="d-flex flex-column">
                            
                            <?php
                                if(!$user_id) {
                            ?>

                            <div>
                                <span> <a href="http://myst.dothome.co.kr/esc4/subpage/member/login.php?current_url=<?php echo $current_url ?>"> 로그인 </a> </span>
                                <span> | </span>
                                <span> <a href="http://myst.dothome.co.kr/esc4/subpage/member/join.php?current_url=<?php echo $current_url ?>"> 회원가입 </a> </span>
                            </div>

                            <?php } else { ?>

                            <div class="profile_image">
                                <figure>
                                    <img src="http://myst.dothome.co.kr/esc4/images/blank_profile_picture.png" alt="blank_profile_picture">
                                </figure>
                            </div>
                            
                            <div class="d-flex justify-content-center">   
                                <span> <a href="http://myst.dothome.co.kr/esc4/subpage/member/member_info.php?user_id=<?php echo $user_id ?>"> <?php echo $user_id ?> </a> </span>
                                <!-- <span> | </span> -->
                                <span> <a href="http://myst.dothome.co.kr/esc4/subpage/member/logout.php?current_url=<?php echo $current_url ?>"> <i class="fa-solid fa-right-from-bracket"></i> </a> </span>
                            </div>

                            <?php } ?>

                            
                            <div class="dividing_line d-flex justify-content-center">
                                <i class="fa-solid fa-ellipsis"></i>
                            </div>

                            <ul class="d-flex flex-column align-items-center gap-5">
                                <li>
                                    <a href="#"> ABOUT </a>
                                </li>
                                <li>
                                    <a href="#"> LECTURE </a>
                                </li>
                                <li>
                                    <a href="http://myst.dothome.co.kr/esc4/subpage/board/board.php"> Q&A </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
                </nav>
        </header>