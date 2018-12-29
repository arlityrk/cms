 <table class="table table-bordered table-hover">
                        <thead>
                            <?php
                            $query = "SELECT * FROM posts order by cat_id desc";
                            $posts_query = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($categories_query)){
                                $post_id = $row['post_id'];
                                $post_category_id = $row['post_category_id'];
                                $post_title = $row['post_title'];
                                $post_author = $row['post_author'];
                                $post_date = $row['post_date'];
                                $post_image = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_tags = $row['post_tags'];
                                $post_comment_count = $row['post_comment_count'];
                                $post_status = $row['post_status'];


                                echo "<tr>";
                                echo    "<td>$post_id</td>";
                                echo    "<td>$post_author</td>";
                                echo    "<td>$post_title</td>";
                                echo    "<td>$post_category_id</td>";
                                echo    "<td>$post_status</td>";
                                echo    "<td><img width='100' src='../images/$post_image' alt ='image'</td>";
                                echo    "<td>$post_tags</td>";
                                echo    "<td>$post_comment_count</td>";
                                echo    "<td>$post_date</td>";
                                echo    "<td><a href='posts.php?delete={$post_id}'>Delete</a></td>";
                                echo "</tr>";
                            }
                            
                            if(isset($_GET['delete'])){
                                $post_id = $_GET['post_id'];
                                
                                $query = "DELETE FROM posts WHERE post_id = {$post_id}";
                                $delete_post_query = mysqli($connection, $query);
                                
                                $confirm_query($delete_post_query);
                            }

                            ?>
                        </thead>
                    </table>