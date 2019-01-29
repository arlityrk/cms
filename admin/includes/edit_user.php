<?php

if(isset($_GET["edit_user"])){
    $user_id = $_GET["edit_user"] ;

    $query = "SELECT * FROM users WHERE user_id = $user_id";
    $select_user_query = mysqli_query($connection, $query);

    confirm_query($select_user_query);

    while($row = mysqli_fetch_assoc($select_user_query)){
        $user_id = $row['user_id'];
        $username = $row['username'];
        $user_password = $row['user_password'];
        $user_firstname= $row['user_firstname'];
        $user_lastname = $row['user_lastname'];
        $user_email = $row['user_email'];
        $user_image = $row['user_image'];
        $user_role = $row['user_role'];
    }
}

if(isset($_POST["edit_user"])){

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

    $query = "UPDATE users SET ";
        $query .= "user_firstname = '$user_firstname', ";
        $query .= "user_lastname = '$user_lastname', ";
        $query .= "user_role  = '$user_role', ";
        $query .= "username  = '$username', ";
        $query .= "user_password  = '$user_password', ";
        $query .= "user_email  = '$user_email' ";
        $query .= "WHERE user_id = '$user_id'";
        
        $update_query = mysqli_query($connection, $query);

        confirm_query($update_query);

}



?>

<form action="" method="post" enctype="multipart/form-data">

    <div class="form-group">
        <label for="title">First name</label>
        <input type="text" value = "<?php echo $user_firstname ;?>" class="form-control" name="user_firstname">
    </div>

    <div class="form-group">
        <label for="title">Last name</label>
        <input type="text" value = "<?php echo $user_lastname ;?>" class="form-control" name="user_lastname">
    </div>

    <div class="form-group">
        <label for="user_role">User role</label>
        <br>
        <select name="user_role" id="user_Role">
            <option value='default'><?php echo $user_role;?></option>

            <?php
            if($user_role=='Admin'){
                echo "<option value='subscriber'>Subscriber</option>";
            }else{
                echo "<option value='admin'>Admin</option>";
            }

            ?>
        </select>

    </div>

    <div class="form-group">
        <label for="post_author">Username</label>
        <input type="text" value = "<?php echo $username ;?>" class="form-control" name="username">
    </div>

    <div class="form-group">
        <label for="post_status">Password</label>
        <input type="password" value = "<?php echo $user_password ;?>" class="form-control" name="user_password">
    </div>

    <!--    <div class="form-group">
<label for="post_image">Post Image</label>
<input type="file" name="image">
</div>-->

    <div class="form-group">
        <label for="post_tags">Email</label>
        <input type="text" value = "<?php echo $user_email ;?>" class="form-control" name="user_email">
    </div>

    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="edit_user" value="Save changes">
    </div>

</form>