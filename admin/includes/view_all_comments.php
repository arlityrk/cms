<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Author</th>
            <th>Comment</th>
            <th>Email</th>
            <th>Status</th>
            <th>In Response to</th>
            <th>Date</th>
            <th>Approve</th>
            <th>Unapprove</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM comments order by comment_id desc";
        $select_comments_query = mysqli_query($connection, $query);

        confirm_query($select_comments_query);

        while($row = mysqli_fetch_assoc($select_comments_query)){
            $comment_id = $row['comment_id'];
            $comment_post_id = $row['comment_post_id'];
            $comment_author = $row['comment_author'];
            $comment_email = $row['comment_email'];
            $comment_content = $row['comment_content'];
            $comment_status = $row['comment_status'];
            $comment_date = $row['comment_date'];


            echo "<tr>";
            echo    "<td>$comment_id</td>";
            echo    "<td>$comment_author</td>";
            echo    "<td>$comment_content</td>";
            echo    "<td>$comment_email</td>";       
            echo    "<td>$comment_status</td>";

            /*            $query = "SELECT * FROM categories WHERE cat_id = $post_category_id";
            $categories_query = mysqli_query($connection, $query);

            confirm_query($categories_query);

            while($row = mysqli_fetch_assoc($categories_query)){
                $cat_title = $row['cat_title'];

                echo    "<td>$cat_title</td>";

            }*/

            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id ";
            $select_post_query = mysqli_query($connection, $query);

            confirm_query($select_post_query);

            while($row = mysqli_fetch_assoc($select_post_query)){
                $p_id = $row['post_id'];
                $p_title = $row['post_title'];
                echo    "<td><a href='../post.php?p_id=$p_id'>$p_title</a></td>";

            }


            echo    "<td>$comment_date</td>";
            echo    "<td><a href='comments.php?approve=$comment_id'>Approve</a></td>";
            echo    "<td><a href='comments.php?unapprove=$comment_id'>Unapprove</a></td>";
            echo    "<td><a href='comments.php?delete=$comment_id'>Delete</a></td>";
            echo "</tr>";
        }

        if(isset($_GET['delete'])){
            $comment_id = $_GET['delete'];

            $query = "DELETE FROM comments WHERE comment_id = {$comment_id}";
            $delete_comment_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($delete_comment_query);
        }

        if(isset($_GET['approve'])){
            $comment_id = $_GET['approve'];

            $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $comment_id";
            $approve_comment_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($approve_comment_query);
        }

        if(isset($_GET['unapprove'])){
            $comment_id = $_GET['unapprove'];

            $query = "UPDATE comments SET comment_status = 'unapproved' WHERE comment_id = $comment_id";
            $unapproved_comment_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($unapproved_comment_query);
        }

        ?>
    </tbody>
</table>