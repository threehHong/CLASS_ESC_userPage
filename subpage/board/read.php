<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/board.css">
    <link rel="stylesheet" href="../../css/common.css">
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $board_number = $_GET['idx'];
    $board_number_pre = $board_number - 1;
    $board_number_next = $board_number + 1;

    $sql = "SELECT hit from board_esc4 where idx='{$board_number}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $newhit = $row['hit'] + 1;

    $sql = "UPDATE board_esc4 set hit = '{$newhit}' where idx='{$board_number}'";
    $result = $conn->query($sql);

    $sql = "SELECT * from board_esc4 where idx='{$board_number}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();


    /* 게시글 작성자 이름 */
    $writer_name = $row['name'];


    /* idx 최소값 구하기 */
    $sql = "SELECT MIN(idx) FROM board_esc4;";
    $result = $conn->query($sql);
    $first_idx = $result->fetch_assoc();

    while ($board_number_pre != null) {
        if ($board_number == $first_idx['MIN(idx)']) {
            $return_false_pre = "return false;";
            break;
        } else {
            $sql = "SELECT title from board_esc4 where idx='{$board_number_pre}'";
            $result = $conn->query($sql);
            $row_pre = $result->fetch_assoc();

            if ($row_pre == null) {
                $board_number_pre = $board_number_pre - 1;
            } else {
                break;
            }
        }
    }

    /* idx 최대값 구하기 */
    $sql = "SELECT MAX(idx) FROM board_esc4;";
    $result = $conn->query($sql);
    $last_idx = $result->fetch_assoc();

    while ($board_number_next != null) {
        if ($board_number == $last_idx['MAX(idx)']) {
            $return_false_next = "return false;";
            break;
        } else {
            $sql = "SELECT title from board_esc4 where idx='{$board_number_next}'";
            $result = $conn->query($sql);
            $row_next = $result->fetch_assoc();

            if ($row_next == null) {
                $board_number_next = $board_number_next + 1;
            } else {
                break;
            }
        }
    }
?>


<main>
    <div class="board container">
        <div class="board_wrapper"> 
        
            <div class="read_contents_wrapper">
        
                <h2 class="read_title"> <?php echo $row['title']; ?> </h2>
        
                <div class="read_write_info">
                    <ul>
                        <li> <?php echo $row['date']; ?> </li>
                        <li> <?php echo $row['category']; ?> </li>
                        <li> <?php echo $row['name']; ?> </li>
                    </ul>
                </div>
        
                <div class="read_contents">
                    <?php
                        echo nl2br($row['content']);
                    ?>
                </div>

                <div class="read_bottom"> 
                    <div class="read_comment">
                        
                        <?php
                            $sql = "SELECT * from board_esc4_comment where comment_number='{$board_number}' order by idx desc limit 0, 4";

                            $result = $conn->query($sql);

                            while ($row = $result->fetch_assoc()) {
                                $title = $row['title'];
                                $bno = $row['idx'];

                                
                                $post_time = $row['date'];
                                $now = date('Y-m-d');
                                if($post_time == $now) {
                                    $new_post_icon = '<span class="new_post"> new </span>';
                                } else {
                                    $new_post_icon = '';
                                }

                                $comment_writer_name = $row['comment_name'];
                        ?>
                  
                        <div class="comment">
                            <ul>
                                <li class="comment_writer"> <?php echo $row['comment_name'] ?> </li>
                                <li class="comment_content"> <?php echo nl2br($row['content']) ?> </li>

                                <li class="comment_date d-flex justify-content-between"> <?php echo $row['date'] ?>  
                                    <?php if($user_id == $comment_writer_name) { ?>
                                        <div class="comment_edit_btn"> 
                                            <a class="edit_btn"> 수정 </a> 
                                            <a href="comment_delete.php?comment_number=<?php echo $board_number ?>&comment_idx=<?php echo $row['idx'] ?>"> 삭제 </a> 
                                        </div>
                                    <?php } ?>
                                </li>
                            </ul> 
                        </div>

                        <form action="comment_edit_db.php?comment_number=<?php echo $row['comment_number'] ?>&comment_idx=<?php echo $row['idx'] ?>" class="comment_edit_area" method="POST">
                            <div class="comment_edit_area_wrapper">
                                <div class="comment_edit_writer">
                                    <span> <?php echo $row['comment_name'] ?>  &nbsp; &nbsp; <strong> * 댓글 수정 후 우측 하단에 완료 버튼을 클릭하세요! * </strong> </span>
                                </div>

                                <!-- TEXTAREA 내부 띄어쓰기 있으면 그대로 반영됨(입력 시작 위치가 띄어쓴 곳부터 시작 따라서 아래와 같이 붙여 써야함) -->
                                <textarea name="content" id="" cols="30" rows="10"><?php echo nl2br($row['content']) ?></textarea>
                                
                                <div class="comment_edit_info">
                                    <ul class="d-flex justify-content-between">
                                        <li class="date"> <?php echo $row['date'] ?> </li>
                                        <li> <button> 완료 </button> </li>
                                    </ul>
                                </div>
                            </div>
                        </form>

                        <?php } ?>

                        </form>
                        
                        <form action="comment_db.php?idx=<?php echo $board_number ?>&current_url=<?php echo $current_url ?>&user_id=<?php echo $user_id ?>"  method="POST" class="commenting"> 
                            <div class="read_comment_wrapper">
                                <div class="writer">
                                    <span> <?php echo $user_id ?> </span>
                                </div>
                                
                                <div class="text_button d-flex flex-column">
                                    <textarea name="comment_content" id="" cols="30" rows="10" placeholder="여기에 댓글을 남겨주세요"> </textarea>
            
                                    <div class="enroll">
                                        <button> <span> 등록 </span> </button>
                                    </div>
                                </div> 
                            </div>
                        </form>
                    </div>


                    <!-- 여기는 조건문으로 받아서 이전글 마지막일 경우와 그렇지 않을 경우 구문해서 출력하기. -->
                    <div class="read_preview_next">
                        <a href="read.php?idx=<?php echo $board_number_next ?>" onclick="<?php echo $return_false_next ?>"> <i class="fa-solid  fa-arrow-right"></i> 다음 글 <span> <?php echo $row_next['title'] ?> </span> </a>

                        <a href="read.php?idx=<?php echo $board_number_pre ?>" onclick="<?php echo $return_false_pre ?>"> <i class="fa-solid fa-arrow-left"></i> 이전 글 <span> <?php echo $row_pre['title'] ?> </span> </a>

                        <!-- <p> <i class="fa-solid fa-arrow-left"></i> <a href="/board/read.php?<?php echo $board_number_pre ?>"> </a> 이전 글 </p>
                        <p> <i class="fa-solid fa-arrow-right"></i> <a href="/board/read.php?<?php echo $board_number_next ?>"> </a> 다음 글 </p> -->
                    </div>


                    <div class="board_edit_btns">
                        <ul>
                            <li>
                                <a href="board.php"> <i class="fa-solid fa-bars-staggered"></i> 목록 </a>
                            </li>
                        
                            
                        <?php if($_SESSION['ID']) { ?>
                            <li>  
                                <a href="thumbsup.php?idx=<?php echo $board_number ?>"> <i class="fa-regular fa-thumbs-up"></i> 추천 </a>
                            </li>
                        <?php } ?>


                        <?php if($user_id == $writer_name) { ?>
                            <li>
                                <a href="edit.php?idx=<?php echo $board_number ?>"> <i class="fa-solid fa-pencil"></i> 수정 </a>
                            </li>

                            <li>
                                <a href="delete.php?idx=<?php echo $board_number ?>"> <i class="fa-regular fa-trash-can"></i> 삭제 </a>
                            </li>
                        <?php } ?>

                        </ul> 
                    </div>
                </div>
            </div>
        

        </div>
    </div>
</main>
            

        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/footer.php";
        ?>

    
        <script>
            $('.comment_edit_area').hide();

            let comment_edit_btn = $('.comment_edit_btn .edit_btn');

            comment_edit_btn.click(function() {
                $(this).parents('div.comment').hide();

                $(this).parents('div.comment').next('form').show();
            });
        </script>
    </body>
</html>