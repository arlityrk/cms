<?php

if(isset($_POST["add_user"])){

    $user_firstname = $_POST["user_firstname"];
    $user_lastname = $_POST["user_lastname"];
    $user_role = $_POST["user_role"];
    $username = $_POST["username"];
    /*    $post_image = $_FILES["image"]["name"];
    $post_image_temp = $_FILES["image"]["tmp_name"];*/
    $user_password = $_POST["user_password"];
    $user_email = $_POST["user_email"];
    //$post_date = date("d-m-y");
    //$post_comment_count = 4;

    //move_uploaded_file($post_image_temp, "../images/$post_image");

    $query = "INSERT INTO users (username, user_password, user_firstname, user_lastname, user_email, user_role)";
    $query .=" VALUES('{$username}','{$user_password}','{$user_firstname}','{$user_lastname}','{$user_email}','{$user_role}')";

    $add_user_query = mysqli_query($connection, $query);

    confirm_query($add_user_query);

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
            <option value='subscriber'>Select options</option>
            <option value='admin'>Admin</option>
            <option value='subscriber'>Subscriber</option>
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