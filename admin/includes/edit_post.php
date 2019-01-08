<?php

if(isset($_GET["p_id"])){

    $get_post_id = $_GET["p_id"];

    $query = "SELECT * FROM posts WHERE post_id = {$get_post_id}";
    $posts_query = mysqli_query($connection, $query);

    confirm_query($posts_query);

    while($row = mysqli_fetch_assoc($posts_query)){
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
        $post_content = $row['post_content'];
    }

    if(isset($_POST['update_post'])){
        $post_title = $_POST["title"];
        $post_category_id = $_POST["post_category"];
        $author = $_POST["author"];
        $post_status = $_POST["post_status"];
        $post_image = $_FILES["image"]["name"];
        $post_image_temp = $_FILES["image"]["tmp_name"];
        $post_tags = $_POST["post_tags"];
        $post_content = $_POST["post_content"];
        $post_date = date("d-m-y");
        
        if(empty($post_image)){
            
            $query = "SELECT * FROM posts WHERE post_id = $get_post_id";
            $select_image = mysqli_query($connection, $query);
            
             while($row = mysqli_fetch_assoc($select_image)){
                 $post_image = $row['post_image'];
             }
            
            
        }

        move_uploaded_file($post_image_temp, "../images/$post_image");

        $query = "UPDATE posts SET ";
        $query .= "post_title = '$post_title', ";
        $query .= "post_category_id = '$post_category_id', ";
        $query .= "post_author  = '$post_author', ";
        $query .= "post_status  = '$post_status', ";
        $query .= "post_image  = '$post_image', ";
        $query .= "post_tags  = '$post_tags', ";
        $query .= "post_date  = now(), ";
        $query .= "post_content  = '$post_content' ";
        $query .= "WHERE post_id = '$get_post_id'";
        
        $update_query = mysqli_query($connection, $query);

        confirm_query($update_query);
    }
}


?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">Post Title</label>
        <input value="<?php echo $post_title ?>" type="text" class="form-control" name="title">
    </div>

    <div class="form-group">
        <label for="post_category">Post Category Id</label>
        <br>
        <select name="post_category" id="post_category">

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
        <label for="post_author">Post Auhtor</label>
        <input value="<?php echo $post_author ?>" type="text" class="form-control" name="author">
    </div>

    <div class="form-group">
        <label for="post_status">Post Status</label>d
        <input value="<?php echo $post_status ?>" type="text" class="form-control" name="post_status">
    </div>

    <div class="form-group">
        <label for="post_image">Post Image</label>
        <br>
        <img width= "100" src="../images/<?php echo $post_image; ?>" alt="">
        <input type="file" name="image">
    </div>

    <div class="form-group">
        <label for="post_tags">Post Tags</label>
        <input value="<?php echo $post_tags ?>" type="text" class="form-control" name="post_tags">
    </div>

    <div class="form-group">
        <label for="post_content">Post Content</label>
        <textarea class="form-control" name="post_content" id="" cols="30" rows="10"><?php echo $post_content ?></textarea>
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_post" value="Update post">
    </div>

</form>