<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/board.css">
    <link rel="stylesheet" href="../../css/common.css">
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";


    /* PAGINATION */
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
  
    /* board에 있는 행의 개수를 전부 가져와서 cnt에 저장 */
    $pagesql = "SELECT COUNT(*) as cnt from board_esc4";

    $page_result = $conn -> query($pagesql);
    $page_row = $page_result -> fetch_assoc();

    $row_num = $page_row['cnt'];
    $list = 10;
    $block_ct = 5;

    $block_num = ceil($page / $block_ct); 
    $block_start = (($block_num - 1) * 5) + 1; 
    $block_end = $block_start + $block_ct - 1; 
    $total_page = ceil($row_num / $list); 

    if ($block_end > $total_page) $block_end = $total_page;

    $total_block = ceil($total_page / $block_ct); 
    $start_num = ($page - 1) * $list;
?>

<main>
    <div class="board container">
        <div class="board_wrapper"> 
        
            <div class="board_contents_wrapper">
                <div class="table_search">
                    <form action="search_result.php" method="GET">
                        <select name="search_category" id="">
                        <option value="title"> 제목 </option>
                        <option value="content"> 내용 </option>
                        <option value="name"> 작성자 </option>
                        </select>
                        <span> <i class="fa-solid fa-angle-down"></i> </span>
                
                        <input type="text" name="keyword" required>
                        <button type="submit" class="table_search_button"> <i class="fa-solid fa-magnifying-glass"> </i> </button>
                    </form>
                </div>
                
                <div class="board_edit_btns">
                    <ul>
                        <li>
                            <a href="write.php"> <i class="fa-solid fa-pencil"> </i> 글쓰기 </a>
                        </li>
                    </ul>
                </div>
                
                <div class="table_wrapper table-responsive">
                    <table class="table table-hover">
                        <colgroup>
                            <col class="col1">
                            <col class="col2">
                            <col class="col3">
                            <col class="col4">
                            <col class="col5">
                            <col class="col6">
                            <col class="col7">
                        </colgroup>

                        <thead>
                            <tr>
                                <th> NO </th>
                                <th scope="col">
                                    <select name="" id="" class="category">
                                    <option value="전체"> 전체 </option>
                                    <option value="공지"> 공지 </option>
                                    <option value="프론트"> 프론트 </option>
                                    <option value="백엔드"> 백엔드 </option>
                                    </select>
                                </th>
                                <th scope="col"> 제목 </th>
                                <th scope="col"> 작성자 </th>
                                <th scope="col"> 게시일 </th>
                                <th scope="col"> 조회수 </th>
                                <th scope="col"> 추천수 </th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php
                                $sql = "SELECT * from board_esc4 order by idx desc limit $start_num, $list";
                                
                                $result = $conn->query($sql);

                                while ($row = $result->fetch_assoc()) {
                                    $title = $row['title'];
                                    $bno = $row['idx'];

                                if (mb_strlen($title) > 25) {
                                    $title = str_replace($row['title'], mb_substr($row['title'], 0, 20) . "...", $row['title']);
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
                                <tr> 
                                    <th> <?php echo $row['idx']; ?> </th>
                                    <td> <?php echo $row['category']; ?></td>
                                    <td> 
                                        <a href="read.php?idx=<?php echo $row['idx']; ?>&page=<?php echo $page; ?>">
                                            <?php echo $title ?> <?php echo $new_post_icon ?> <?php echo $comment_cnt ?>
                                        </a>
                                    </td>
                                    <td> <?php echo $row['name']; ?> </td>
                                    <td> <?php echo $row['date']; ?> </td>
                                    <td> <?php echo $row['hit']; ?> </td>
                                    <td> <?php echo $row['thumbsup']; ?> </td>
                                </tr> 

                            <?php } ?>

                            <?php if(!$bno) { ?>
                                <tr>
                                    <td colspan="7" class="not_found"> 검색된 내용이 없습니다 </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <ul>
                        <?php
                        if ($page > 1) { 
                        echo "<li> <a href='?page=1' class='button start'> <i class='fa-solid fa-angles-left'></i> </a> </li>";
                            if ($block_num > 1) {
                                $prev_block_end = $block_start - 1; // 이전 블록의 마지막 페이지 번호
                                $prev_block_start = ($block_num - 2) * $block_ct + 1; // 이전 블록의 첫 페이지 번호
                            
                                echo "<li> <a href='?page=$prev_block_end' class='button previous'> <i class='fa-solid fa-angle-left'></i> </a> </li>";
                            }
                        }

                        for ($i = $block_start; $i <= $block_end; $i++) {
                            if ($page == $i) {
                                echo "<li> <a href='?page=$i' class='active'> $i </a> </li>";
                            } else {
                                echo "<li> <a href='?page=$i'> $i </a> </li>";
                            }
                        }

                        if ($page < $total_page) {
                            if ($total_block > $block_num) {
                                $next_block_first_page = $block_end + 1;
                                echo "<li> <a href='?page=$next_block_first_page' class='button next'> <i class='fa-solid fa-angle-right'> </i> </a> </li>";
                            }
                            echo "<li> <a href='?page=$total_page' class='button last'> <i class='fa-solid fa-angles-right'></i> </a> </li>";
                        }
                        ?>
                    </ul>
                </div>
            </div>
            
            <!-- MOBILE BOARD -->
            <div class="mobile_board">
                <div class="mobile_board_bg">
                    <div class="mobile_board_wrapper container d-flex align-items-center">
                        <div class="mobile_list_group_wrapper">
                            <div class="list_group_wrapper_inner"> 
                                
                                <div class="table_search">
                                    <form action="search_result.php" method="get">
                                        <select name="search_category" id="">
                                        <option value="title"> 제목 </option>
                                        <option value="content"> 내용 </option>
                                        <option value="name"> 작성자 </option>
                                        </select>
                                        <span> <i class="fa-solid fa-angle-down"></i> </span>
                                
                                        <input type="text" name="keyword" required>
                                        <button type="submit" class="table_search_button"> <i class="fa-solid fa-magnifying-glass"> </i> </button>
                                    </form>
                                </div>
                                
                                <div class="board_edit_btns">
                                    <ul>
                                        <li>
                                            <a href="write.php"> <i class="fa-solid fa-pencil"></i> 등록 </a>
                                        </li>
                                    </ul>
                                </div>

                                <ul class="list-group">
                                    <?php
                                        $sql = "SELECT * from board_esc4 order by idx desc limit $start_num, $list";

                                        $result = $conn->query($sql);

                                        while ($row = $result->fetch_assoc()) {
                                            $title = $row['title'];
                                            $bno = $row['idx'];

                                        if (mb_strlen($title) > 20) {
                                            $title = str_replace($row['title'], mb_substr($row['title'], 0, 16) . "...", $row['title']);
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

                                            $comment_cnt = '<span class="comment_number"> '.$comment_cnt.' </span> <br> 댓글수';
                                        } else {
                                            $comment_cnt = '';
                                        } /* 댓글 개수 */
                                    ?>

                                    <li class="list-group-item d-flex align-items-center">
                                        <div>
                                            <a href="read.php?idx=<?php echo $row['idx']; ?>&page=<?php echo $page; ?>">
                                                <?php echo $title ?> <?php echo $new_post_icon ?>
                                            </a>
                                            <ul class="list_group_item_info d-flex gap-2">
                                                <li> <?php echo $row['name']; ?> </li>
                                                <li> <?php echo $row['date']; ?> </li>
                                                <li> <span> 조회 </span> <?php echo $row['hit']; ?> </li>
                                            </ul>
                                        </div>
                                        <!-- <br> 댓글수 -->
                                        <span class="badge rounded-pill ms-auto"> <?php echo $comment_cnt ?> </span>
                                    </li>

                                    <?php } ?>

                                    <?php if($bno == null) { ?>
                                        <tr>
                                            <td colspan="7" class="not_found"> 작성된 글이 없습니다 </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </ul>
                            </div>
                            
                            <!-- 페이지네이션(위에 사용한거 그대로 가져옴) -->
                            <div class="pagination">
                                <ul>
                                    <?php
                                    if ($page > 1) { 
                                    echo "<li> <a href='?page=1' class='button start'> <i class='fa-solid fa-angles-left'></i> </a> </li>";
                                        if ($block_num > 1) {
                                            $prev_block_end = $block_start - 1; // 이전 블록의 마지막 페이지 번호
                                            $prev_block_start = ($block_num - 2) * $block_ct + 1; // 이전 블록의 첫 페이지 번호
                                        
                                            echo "<li> <a href='?page=$prev_block_end' class='button previous'> <i class='fa-solid fa-angle-left'></i> </a> </li>";
                                        }
                                    }

                                    for ($i = $block_start; $i <= $block_end; $i++) {
                                        if ($page == $i) {
                                            echo "<li> <a href='?page=$i' class='active'> $i </a> </li>";
                                        } else {
                                            echo "<li> <a href='?page=$i'> $i </a> </li>";
                                        }
                                    }

                                    if ($page < $total_page) {
                                        if ($total_block > $block_num) {
                                            $next_block_first_page = $block_end + 1;
                                            echo "<li> <a href='?page=$next_block_first_page' class='button next'> <i class='fa-solid fa-angle-right'> </i> </a> </li>";
                                        }
                                        echo "<li> <a href='?page=$total_page' class='button last'> <i class='fa-solid fa-angles-right'></i> </a> </li>";
                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>

                        </div>
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
            /* CATEGORY */
            let category = $('.category');

            category.change(function() {
                let categoryValue = $(this).val();

                console.log(categoryValue);

                location.href = `category_result.php?category_value=${categoryValue}`;
            })

            /* 글쓰기 */
            let write_btn = $('.board_edit_btns a')
            write_btn.click(function(e) {
                e.preventDefault();

                user_id = '<?php echo $user_id ?>';

                if(!user_id) {
                    location.href ="../member/login.php";
                } else {
                    location.href ="write.php";
                }
            })

        </script>
    </body>
</html>
