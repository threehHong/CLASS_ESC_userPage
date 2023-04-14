/********** PAGER, FADE IN&OUT **********/
let navbar = $('.navbar'),
    sectionAboutBg = $("main .section_about_bg"),
    sectionAboutExplain =  $("main .about_banner_ex"),
    pageBtn = $('.pager li:not(.play_stop)'),
    playBtn = $('.play_btn'),
    stopBtn = $('.stop_btn'),
    timerSectionAboutbBg = null;
    stopBtnValidation = null;

let autoFade = function() {
    timerSectionAboutbBg = setInterval(function(){
        navbar.toggleClass('active_about');
        $("main .section_about_bg").toggleClass('active_about');
        
        pageBtn.each(function() {
            $(this).toggleClass('active_page');
        })

        sectionAboutExplain.each(function() {
            $(this).toggleClass('active_about_opacity');
        })

    }, 4000);
}

autoFade();

pageBtn.each(function(){
    $(this).click(function(){
        clearInterval(timerSectionAboutbBg);

        pageBtn.each(function(){
            $(this).removeClass('active_page');
        })

        navbar.toggleClass('active_about');
        sectionAboutBg.toggleClass('active_about');
        $(this).toggleClass('active_page');

        sectionAboutExplain.each(function() {
            $(this).toggleClass('active_about_opacity');
        })

        if(stopBtnValidation) {
            playBtn.toggleClass('active_play_stop');
            stopBtn.toggleClass('active_play_stop');

            stopBtnValidation = 0;
        }

        autoFade();
    })
})

stopBtn.click(function() {
    clearInterval(timerSectionAboutbBg);
    $(this).toggleClass('active_play_stop');
    playBtn.toggleClass('active_play_stop');
    stopBtnValidation = 1;
})
playBtn.click(function() {
    $(this).toggleClass('active_play_stop');
    stopBtn.toggleClass('active_play_stop');
    autoFade()
}) /********** PAGER, FADE IN&OUT **********/


/********** SIDE MENU 햄버거 버튼 **********/
$('.navbar-toggler').click(function(e){
    e.preventDefault();

    $('.hamburger_button span:nth-child(2)').toggleClass('active_burger');
    $('.hamburger_button span:nth-child(3)').toggleClass('active_burger');
    $('.hamburger_button span:nth-child(4)').toggleClass('active_burger_opacity')
    $('.hamburger_button span:nth-child(1)').toggleClass('active_burger_opacity')

    $('.mobile_side_menu').toggleClass('active_mobile');

    $('body').toggleClass('active_overflow_hidden');
}) /********** SIDE MENU 햄버거 버튼 **********/



/********** SECTION SLIDE **********/
var swiper = new Swiper(".mySwiper", {
    loop: true,
    rewind: true,
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
    autoplay: {
        delay: 3000, 
        disableOnInteraction: false, 
        pauseOnMouseEnter: true,
    },
    speed: 800,
}); /********** SECTION SLIDE **********/


/********** ISOTOPE **********/
$(window).on('load', function(){ // $(window).on('load', function() 를 통해 강의 카드 이미지 겹침 현상 해결
    let $grid = $('.row').isotope({
        // options
        itemSelector: '.col',
        layoutMode: 'fitRows',
        getSortData: {
            name: '.card-title', 
            category: '[data-category]' 
        }
    });
    
    $('.lecture_list_menu a').click(function (e) {
        e.preventDefault();
        
        $(this).toggleClass('active');
        $(this).siblings().removeClass('active');
    
        let targetValue = '';
        let activeBtn = $('.lecture_list_menu a.active')
    
        if ($(this).attr('data-filter') === "*") {
            targetValue = "*"
            $('.lecture_list_menu a').removeClass('active');
            $(this).addClass('active');
        } else {
            activeBtn.each(function () {
                let val = $(this).attr('data-filter')
                targetValue += val;
            })
        }
    
        $grid.isotope({ filter: targetValue })
    
    }) 
}) /********** ISOTOPE **********/


// 두번째 scrollAmt >= backTitleOffsetTop 이 작동이 되었다 안되었다 함(일단 넣지 말자).
/********** ROADMAP TITLE FADE IN, OUT **********/
/* let frontLoadmapTitle = $('.section_roadmap_front'),
    backLoadmapTitle = $('.section_roadmap_back');

    frontTitleOffsetTop = frontLoadmapTitle.offset().top - 380,
    backTitleOffsetTop = backLoadmapTitle.offset().top - 380;

$(window).scroll(function() {

    scrollAmt = $(this).scrollTop();

    if(scrollAmt >= frontTitleOffsetTop) {
        frontLoadmapTitle.addClass('front_roadmap_opacity');
    } else {
        frontLoadmapTitle.removeClass('front_roadmap_opacity');
    }

    if(scrollAmt >= backTitleOffsetTop) {
        backLoadmapTitle.addClass('back_roadmap_opacity');
    } else {
        backLoadmapTitle.removeClass('back_roadmap_opacity');
    } 
}) */
/********** ROADMAP TITLE FADE IN, OUT **********/


/********** SECTION ROAD MAP **********/
let sectionRoadmapFront = $('.section_roadmap_front'),
    sectionRoadmapFrontTitle = $('.section_roadmap_front li'),
    sectionRoadmapBack = $('.section_roadmap_back'),
    sectionRoadmapBackTitle = $('.section_roadmap_back li');

sectionRoadmapFront.find('img').hide();
sectionRoadmapBack.find('img').hide();


sectionRoadmapFrontTitle.click(function() {
    sectionRoadmapFront.find('img').fadeToggle();
})
sectionRoadmapBackTitle.click(function() {
    sectionRoadmapBack.find('img').fadeToggle();
}) /********** SECTION ROAD MAP **********/



// 스크롤이 몇 이상이면 fixed-top 속성 navbar에 넣기 그리고 상하 크기 줄이기 navber의 높이 
/********** NAVBAR **********/
let header = $('header');
    logo = $('.logo a'),
    menu = $('.nav_menu a'),
    scrollAmt = 0,

    navbarRemoveClass = function() {
        navbar.removeClass('fixed-top');
        logo.removeClass('active_logo');
        navbar.removeClass('active_navbar');
        menu.removeClass('active_nav_menu');
    },
    navbarAddClass = function() {
        navbar.addClass('fixed-top');
        logo.addClass('active_logo');
        navbar.addClass('active_navbar'); // 높이 사이즈
        menu.addClass('active_nav_menu'); // 폰트 사이즈
    };

$(window).scroll(function() {
    scrollAmt = $(this).scrollTop();
    let section_about_bottom = 840;
    console.log("scrollAmt : ", scrollAmt); 

    if(scrollAmt > section_about_bottom){
        header.addClass('active_header_absolute');

        $(window).on('wheel', function(e) {
            if(e.originalEvent.deltaY > 0) { // 마우스 휠 내릴 때
                navbarRemoveClass();

                // navbar.removeClass('active_navbar_down');
                // navbar.addClass('active_navbar_up');
            } else {
                navbarAddClass();

                // navbar.addClass('active_navbar_down');
                // navbar.removeClass('active_navbar_up');
            }
        }) 
    } else { 
        header.removeClass('active_header_absolute');

        navbarRemoveClass();

        $(window).on('wheel', function(e) {
            if (e.originalEvent.deltaY < 0) { // 마우스 휠 올릴 때
                navbarRemoveClass();
            }
        })
    }
}); /********** NAVBAR **********/



/********** TOP BUTTON **********/
let topBtn = $('.top_btn');
topBtn.click(function(e) {
    e.preventDefault();
    /* $('html, body').animate({scrollTop: 0}, 'slow'); */
   
    window.scroll({
        top: 0,
        behavior: 'smooth'
    });
}) /********** TOP BUTTON **********/


/********** LINE DRAWING **********/
let lineNum = 6;
for(i = 1; i <= lineNum; i++){
    let line = $(`.line${i}`),
        path = $(`.path${i}`)[0], 
        pathLength = path.getTotalLength();
    
    $(path).css('stroke-dasharray', pathLength + ' ' + pathLength);
    $(path).css('stroke-dashoffset', calcDashoffset($(window).height() * 0.5, line, pathLength));
    
    function calcDashoffset(scrollY, element, length) {
    let ratio = (scrollY - $(element).offset().top) / $(element).height(),
        value = length - (length * ratio);
    return value < 0 ? 0 : value > length ? length : value;
    }
    
    function scrollHandler() {
    let scrollY = $(window).scrollTop() + ($(window).height() * 0.5);
    $(path).css('stroke-dashoffset', calcDashoffset(scrollY, line, pathLength));
    }

    $(window).on('scroll', scrollHandler);
} 


/* let mobileScreenSize = 414;

$(window).resize(function() {
    if($(window).innerWidth() > mobileScreenSize) {
    }
}) */

/* let lineNum = 6;
for (i = 1; i <= lineNum; i++) {
  let line = $(`.line${i}`),
      path = $(`.path${i}`)[0],
      pathLength = path.getTotalLength();

  $(path).css('stroke-dasharray', pathLength + ' ' + pathLength);
  $(path).css('stroke-dashoffset', calcDashoffset(window.innerHeight * 0.5, line, pathLength));

  function calcDashoffset(scrollY, element, length) {
    let ratio = (scrollY - $(element).offset().top) / $(element).height(),
        value = length - (length * ratio);
    return value < 0 ? 0 : value > length ? length : value;
  }

  function scrollHandler() {
    let scrollY = $(window).scrollTop() + (window.innerHeight * 0.5);
    $(path).css('stroke-dashoffset', calcDashoffset(scrollY, line, pathLength));
  }

  $(window).on('scroll', scrollHandler);
} */
/********** DRAWING LINE **********/



/********** ICON BANNER SLIDE **********/
$('.banner_large').clone().appendTo('.icon_banner_wrap');
$('.banner_medium').clone().appendTo('.icon_banner_wrap');
$('.banner_small').clone().appendTo('.icon_banner_wrap');

let iconBanner = $('.icon_banner_wrap');
let cnt2 = 0;

function iconBannerMove(cnt, element) {
    if (cnt > element[0].scrollWidth / 2) {
        element.css('transform', 'translateX(0)');
        cnt = 0;
    }
    element.css('transform', `translateX(${-cnt}px)`);

    return cnt;
}

function iconBannerAni() {
    cnt2 += 2;

    cnt2 = iconBannerMove(cnt2, iconBanner);

    window.requestAnimationFrame(iconBannerAni);
}

iconBannerAni();
/********** ICON BANNER SLIDE **********/