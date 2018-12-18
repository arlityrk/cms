<?php

function add_categories(){

    global $connection;

    if(isset($_POST["submit"])){
        $cat_title=$_POST['cat_title'];

        if($cat_title == "" || empty($cat_title)){

            echo "<h3>Please fill the field.</h3>";

        } else {

            $query = "INSERT INTO categories (cat_title) ";
            $query .= "VALUES('{$cat_title}')";

            $categories_insert_query = mysqli_query($connection, $query);

            if(!$categories_insert_query){

                die("Categories insert query failed. Error: " . mysqli_error($connection));

            }
        }
    }
}

function delete_categories(){
    global $connection;

    if(isset($_GET['delete'])){

        $cat_delete_id = $_GET['delete'];
        $query = "DELETE FROM categories WHERE ";
        $query .= "cat_id = " . $cat_delete_id;

        $cat_delete_query = mysqli_query($connection, $query);

        header("Location: categories.php");

        if(!$cat_delete_query){

            die("Categories delete query failed. Error: " . mysqli_error($connection));

        } 
    }


}

function show_all_categories(){
    global $connection;

    $query = "SELECT * FROM categories order by cat_id desc";
    $categories_query = mysqli_query($connection, $query);

    while($row = mysqli_fetch_assoc($categories_query)){
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];

        echo "<tr>";
        echo    "<td>{$cat_id}</td>";
        echo    "<td>{$cat_title}</td>";
        echo    "<td><a href='categories.php?delete={$cat_id}'>Delete</a></td>";
        echo    "<td><a href='categories.php?edit={$cat_id}'>Edit</a></td>";
        echo "</tr>";

    }
}

?>