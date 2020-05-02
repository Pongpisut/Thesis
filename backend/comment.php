<section id="comment">
    <div class="container">
        <div class="row">
            <div class="col-md-5"></div>
            <div class="col-md-4"></div>
            <div class="col-md-3">
                <br>
                <div class="frm-addremove commentsearch">
                <div class="form-search">
                        <div class="input-group">
                        <input
                            type="text"
                            class="form-control"
                            name=""
                            placeholder="ค้นหาคอมเมนต์"
                            autocomplete="off"
                            id="searchcomment"
                        />
                        <span class="input-group-btn">
                            <button class="btn btn-brown2 " type="submit">
                            <i class="fa fa-search icon-search" aria-hidden="true"></i>
                            </button>
                        </span>
                        </div>
                        <div id="resultcomment"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box-comment">
                    <p class="textname-edit">
                        <i class="far fa-comment-alt"></i> จัดการคอมเมนต์
                    </p>
                    <hr style="margin-top:-1.3em;" />
                    <?php
                        $perpage = 6;
                        if (isset($_GET['page'])) {
                            $page = $_GET['page'];
                            } else {
                            $page = 1;
                            }
                        $start = ($page - 1) * $perpage;
                        $sql_select = "SELECT * FROM comment_t ORDER BY id DESC LIMIT {$start} , {$perpage} ";
                        $sql_comment = mysqli_query($dbHandle, $sql_select);
                    ?>
                    <?php
                        while($comment = $sql_comment->fetch_assoc()) {
                    ?>
                    <center>
                    <div class="boxshow-comment">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="./assets/img/speaker.png" class="img-fluid img-comment">
                            </div>
                            <div class="col-md-3 comment_div"><?=$comment['comment_description'];?></div>
                            <div class="col-md-2 comment_div">วันที่คอมเมนต์<br>
                            <p class="comment-dateshow">
                            <?php
                                $datetime =  $comment['comment_date'];
                                echo thai_date_and_times(strtotime($datetime));
                            ?>
                            </p>
                            </div>
                            <?php
                             $id = $comment['comment_postid'];
                             $sql_book = $dbHandle->query("SELECT * FROM book_t WHERE id=$id");
                             $book = $sql_book->fetch_assoc();
                            ?>
                            <div class="col-md-3 comment_div">
                                <span class="badge badge-success commentname">
                                <?php
                                    if($book['book_types'] == '1'){
                                        echo $book['book_name'];
                                    } else {
                                        echo $book['book_namevideo'];
                                    }
                                ?>
                                </span>
                            </div>
                            <div class="col-md-2 comment_div">
                            <button class="btn btn-danger delete_comment" name="delete_comment"  id="<?=$comment['id'];?>">
                            <i class="fas fa-trash-alt"></i> ลบ
                            </button>
                             </div>
                        </div>
                    </div>
                    <hr/>
                    </center>
                        <?php } ?>
                        <?php
                        $sql2 = "SELECT * FROM comment_t ";
                        $query2 = mysqli_query($dbHandle, $sql2);
                        $total_record = mysqli_num_rows($query2);
                        $total_page = ceil($total_record / $perpage);
                        ?>
                        <nav aria-label="...">
                            <ul class="pagination pagination-md">
                                <?php for($i=1; $i<=$total_page; $i++) { ?>
                                <li class="page-item <?php if($page==$i) echo 'active';?>">
                                <a class="page-link" href="home.php?views=comment&page=<?=$i?>"><?php echo $i;?></a>
                                </li>
                                <?php } ?>
                            </ul>
                            </nav>
                </div>
            </div>
        </div>
    </div>
</section>