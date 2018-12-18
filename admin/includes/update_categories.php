<form action="" method="post">
    <div class="form-group">
        <label for="cat-title">Edit Catergory</label>

        <?php 

        if(isset($_GET['edit'])){

            $cat_id = $_GET['edit'];

            $query = "SELECT * FROM categories WHERE cat_id = $cat_id" ;
            $categories_edit_query = mysqli_query($connection, $query);

            while($row = mysqli_fetch_assoc($categories_edit_query)){
                $cat_title = $row['cat_title'];
        ?>

        <input type="text" class="form-control" name="cat_title" value="<?php echo $cat_title; ?>">

        <?php
            }}
        ?>

        <?php

        if(isset($_POST['update_category'])){

            $cat_update_title = $_POST['cat_title'];
            $query = "UPDATE categories SET cat_title = '{$cat_update_title}' WHERE ";
            $query .= " cat_id = {$cat_id}";

            $cat_update_query = mysqli_query($connection, $query);

            if(!$cat_update_query){

                die("Categories update query failed. Error: " . mysqli_error($connection));

            } 
        }

        ?>

    </div>
    <div class="form-group">
        <input type="submit" class="btn btn-primary" name="update_category" value="Edit">
    </div>
</form> 