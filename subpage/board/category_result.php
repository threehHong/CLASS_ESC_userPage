<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/board.css">
    <link rel="stylesheet" href="../../css/common.css">
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    /* CATEGORY RESULT */
    $category_value = $_GET['category_value'];

    if ($category_value == '전체') {
        $category_value = 'board';
    }

    /* PAGINATION */
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }

    /* board에 있는 행의 개수를 전부 가져와서 cnt에 저장 */
    if ($category_value == 'board') {
        $pagesql = "SELECT COUNT(*) as cnt from board_esc4";
    } else {
        $pagesql = "SELECT COUNT(*) as cnt from board_esc4 where category = '$category_value'";
    }

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
                            <a href="write.php"> <i class="fa-solid fa-pencil"> </i> 글쓰기 </a>
                        </li>
                        <!-- <li>
                            <a href="board/page/edit.php" onclick="return false" class="btn_edit"> <i class="fa-solid fa-pencil"></i> 수정 </a>
                        </li>
                        <li>
                            <a href="#" onclick="return false"> <i class="fa-regular fa-trash-can"></i> 삭제 </a>
                        </li> -->
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
                                        <option value="전체" <?php if ($category_value == 'board') {
                                        echo "selected";
                                        } ?>> 전체 </option>
                                        <option value="공지" <?php if ($category_value == '공지') {
                                        echo "selected";
                                        } ?>> 공지 </option>
                                        <option value="프론트" <?php if ($category_value == '프론트') {
                                        echo "selected";
                                        } ?>> 프론트 </option>
                                        <option value="백엔드" <?php if ($category_value == '백엔드') {
                                        echo "selected";
                                        } ?>> 백엔드 </option>
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
                                if ($category_value == 'board') {
                                    $sql = "SELECT * from board_esc4 order by idx desc limit $start_num, $list";
                                } else {
                                $sql = "SELECT * from board_esc4 where category = '$category_value' order by idx desc limit $start_num, $list";
                                }

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

                            <?php if($bno == null) { ?>
                                <tr>
                                    <td colspan="7" class="not_found"> 작성된 글이 없습니다 </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

                <!-- 페이지네이션 -->
                <div class="pagination">
                    <ul>
                        <?php
                            if ($page > $block_ct) { 
                                echo "<li> <a href='?category_value=$category_value&page=1' class='button start'> <i class='fa-solid fa-angles-left'></i> </a> </li>";
                                if ($block_num > 1) {
                                    $prev_block_end = $block_start - 1; // 이전 블록의 마지막 페이지 번호
                                    $prev_block_start = ($block_num - 2) * $block_ct + 1; // 이전 블록의 첫 페이지 번호
                                
                                    echo "<li> <a href='?category_value=$category_value&page=$prev_block_end' class='button previous'> <i class='fa-solid fa-angle-left'></i> </a> </li>";
                                }
                            }

                            for ($i = $block_start; $i <= $block_end; $i++) {
                                if ($page == $i) {
                                    echo "<li> <a href='?category_value=$category_value&page=$i' class='active'> $i </a> </li>";
                                } else {
                                    echo "<li> <a href='?category_value=$category_value&page=$i'> $i </a> </li>";
                                }
                            }

                            if ($page < $total_page) {
                                if ($total_block > $block_num) {
                                    $next_block_first_page = $block_end + 1;
                                    echo "<li> <a href='?category_value=$category_value&page=$next_block_first_page' class='button next'> <i class='fa-solid fa-angle-right'> </i> </a> </li>";
                                } 
                                echo "<li> <a href='?category_value=$category_value&page=$total_page' class='button last'> <i class='fa-solid fa-angles-right'></i> </a> </li>";
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
                                    <form action="board/page/search_result.php" method="get">
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
                                        <!-- <li>
                                            <a href="board/page/edit.php" onclick="return false" class="btn_edit"> <i class="fa-solid fa-pencil"></i> 수정 </a>
                                        </li>
                                        <li>
                                            <a href="#" onclick="return false"> <i class="fa-regular fa-trash-can"></i> 삭제 </a>
                                        </li>  -->
                                    </ul>
                                </div>

                                <ul class="list-group">
                                    <!-- new post일 경우의 태그 -->
                                    <!-- <li class="list-group-item d-flex align-items-center">
                                        <div>
                                            A list item <span class="new_post"> new </span>
                                            <ul class="list_group_item_info d-flex gap-2">
                                                <li> tom </li>
                                                <li> 03/28 </li>
                                                <li> <span> 조회 </span> 9 </li>
                                            </ul>
                                        </div>
                                        
                                        <span class="badge rounded-pill ms-auto"> 1 <br> 댓글수 </span>
                                    </li> -->

                                    <?php
                                        if ($category_value == 'board') {
                                            $sql = "SELECT * from board_esc4 order by idx desc limit $start_num, $list";
                                        } else {
                                            $sql = "SELECT * from board_esc4 where category = '$category_value' order by idx desc limit $start_num, $list";
                                        }

                                        $result = $conn->query($sql);

                                        while ($row = $result->fetch_assoc()) {
                                            $title = $row['title'];
                                            $bno = $row['idx'];

                                        if (mb_strlen($title) > 25) {
                                            $title = str_replace($row['title'], mb_substr($row['title'], 0, 25) . "...", $row['title']);
                                            }
                                    ?>

                                    <li class="list-group-item d-flex align-items-center">
                                        <div>
                                            <a href="read.php?idx=<?php echo $row['idx']; ?>&page=<?php echo $page; ?>">
                                                <?php echo $title ?>
                                            </a>
                                            <ul class="list_group_item_info d-flex gap-2">
                                                <li> <?php echo $row['name']; ?> </li>
                                                <li> <?php echo $row['date']; ?> </li>
                                                <li> <span> 조회 </span> <?php echo $row['hit']; ?> </li>
                                            </ul>
                                        </div>
                                        
                                        <span class="badge rounded-pill ms-auto"> 1 <br> 댓글수 </span>
                                    </li>

                                    <?php } ?>

                                    <?php if($bno == null) { ?>
                                        <tr>
                                            <td colspan="7" class="not_found"> 작성된 글이 없습니다 </td>
                                        </tr>
                                    <?php } ?>
                                    
                                </ul>
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
            let categoryValue;

            category.change(function() {
                categoryValue = $(this).val();

                console.log(categoryValue);

                location.href = `category_result.php?category_value=${categoryValue}`;
            })
        </script>
    </body>
</html>
