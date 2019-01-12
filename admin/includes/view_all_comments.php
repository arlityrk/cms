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

            echo    "<td>Some Title</td>";
            echo    "<td>$comment_date</td>";
            echo    "<td><a href='posts.php?source=edit_post&p_id='>Approve</a></td>";
            echo    "<td><a href='posts.php?delete='>Unapprove</a></td>";
            echo    "<td><a href='posts.php?delete='>Delete</a></td>";
            echo "</tr>";
        }

        if(isset($_GET['delete'])){
            $post_id = $_GET['delete'];

            $query = "DELETE FROM posts WHERE post_id = {$post_id}";
            $delete_post_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($delete_post_query);
        }

        ?>
    </tbody>
</table>