<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_top.php";
?>
    <link rel="stylesheet" href="../../css/board.css">
    <link rel="stylesheet" href="../../css/common.css">
<?php
    include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/header_bottom.php";

    $board_number = $_GET['idx'];
    $sql = "SELECT * from board_esc4 where idx='{$board_number}'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
?>

<main>
    <div class="board container">
        <div class="board_wrapper"> 
        
            <div class="write_contents_wrapper">
                <div class="table_search">
                    <form action="edit_db.php?idx=<?php echo $board_number;?>" method="post" enctype="multipart/form-data">
                        <div class="write_category_title">
                            <select name="select_category" id="">
                                <option value="전체"> 전체 </option>
                                <option value="공지"> 공지 </option>
                                <option value="Front"> Front </option>
                                <option value="Backend"> Backend </option>
                            </select>
                            <!-- <span>  --><i class="fa-solid fa-angle-down"></i> <!-- </span> -->
                            <input type="text" name="title" required placeholder="제목" value="<?php echo $row['title']; ?>">
                        </div>

                        <div class="field">
                            <textarea name="content" id="summernote" class="write_content"><?php echo $row['content']; ?></textarea>
                        </div> 

                        <div class="field_write_file">
                            <!-- <label for="file"> 첨부 파일 </label> -->
                            <input type="file" class="write_file" name="b_file">
                        </div>


                        <div class="board_edit_btns">
                            <ul>
                                <li>
                                    <a href="board.php"> <i class="fa-solid fa-cloud-arrow-up"></i> 취소 </a>
                                </li>
                                <li>
                                    <button type="submit" class="write_submit"> <i class="fa-solid fa-pencil"> </i> 등록 </button> 
                                </li>
                            </ul>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
</main>
            

        <?php
            include $_SERVER['DOCUMENT_ROOT'] . "/esc4/subpage/common/footer.php";
        ?>

        <script>
            /* summernote */
            $('#summernote').summernote({
                disableResizeEditor: true,
                placeholder: 'Hello stand alone ui',
                tabsize: 2,
                height: 480,
                toolbar: [
                ['style', ['style']],
                ['font', ['bold', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['table', ['table']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']]
                ]
                
            });
        </script>
    </body>
</html>