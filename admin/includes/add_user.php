<?php

if(isset($_POST["create_post"])){

    $post_title = $_POST["title"];
    $post_category_id = $_POST["post_category"];
    $author = $_POST["author"];
    $post_status = $_POST["post_status"];
    $post_image = $_FILES["image"]["name"];
    $post_image_temp = $_FILES["image"]["tmp_name"];
    $post_tags = $_POST["post_tags"];
    $post_content = $_POST["post_content"];
    $post_date = date("d-m-y");
    //$post_comment_count = 4;

    move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO posts (post_category_id, post_title, post_author, post_date, post_image, post_content, post_tags, post_status)";
    $query .=" VALUES({$post_category_id},'{$post_title}','{$author}',now(),'{$post_image}','{$post_content}','{$post_tags}','{$post_status}')";

    $add_post_query = mysqli_query($connection, $query);

    confirm_query($add_post_query);

}



?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" class="form-control" name="user_firstname">
    </div>
    
        <div class="form-group">
        <label for="title">Last name</label>
        <input type="text" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_role">User role</label>
        <br>
        <select name="user_role" id="user_Role">

            <?php

            $query = "SELECT * FROM categories order by cat_title desc";
            $categories_query = mysqli_query($connection, $query);

            confirm_query($categories_query);

            while($row = mysqli_fetch_assoc($categories_query)){
                $cat_id = $row['cat_id'];
                $cat_title = $row['cat_title'];

                echo "<option value='{$cat_id}'>{$cat_title}</option>";
            }

            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="post_author">Username</label>
        <input type="text" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_status">Password</label>
        <input type="password" class="form-control" name="user_password">
    </div>

<!--    <div class="form-group">
        <label for="post_image">Post Image</label>
        <input type="file" name="image">
    </div>-->

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="add_user" value="Add user">
    </div>

</form>