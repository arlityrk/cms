<table class="table table-bordered table-hover">
    <thead>
        <tr>
            <th>Id</th>
            <th>Username</th>
            <th>First name</th>
            <th>Last name</th>
            <th>Email</th>
            <th>Role</th>
            <th></th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>

        <?php
        $query = "SELECT * FROM users order by user_id desc";
        $select_users_query = mysqli_query($connection, $query);

        confirm_query($select_users_query);

        while($row = mysqli_fetch_assoc($select_users_query)){
            $user_id = $row['user_id'];
            $username = $row['username'];
            $user_password = $row['user_password'];
            $user_firstname= $row['user_firstname'];
            $user_lastname = $row['user_lastname'];
            $user_email = $row['user_email'];
            $user_image = $row['user_image'];
            $user_role = $row['user_role'];


            echo "<tr>";
            echo    "<td>$user_id</td>";
            echo    "<td>$username</td>";
            echo    "<td>$user_firstname</td>";
            echo    "<td>$user_lastname</td>";       
            echo    "<td>$user_email</td>";
            echo    "<td>$user_role</td>";
            echo    "<td><a href='users.php?to_adm=$user_id'>To Admin</a></td>";
            echo    "<td><a href='users.php?to_sub=$user_id'>To Subscriber</a></td>";
            echo    "<td><a href='users.php?source=edit_user&edit_user=$user_id'>Edit</a></td>";
            echo    "<td><a href='users.php?delete=$user_id'>Delete</a></td>";
            echo "</tr>";
        }
        
        if(isset($_GET['delete'])){
            $user_id = $_GET['delete'];

            $query = "DELETE FROM users WHERE user_id = {$user_id}";
            $delete_user_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($delete_user_query);
        }
        
                if(isset($_GET['to_adm'])){
            $user_id = $_GET['to_adm'];

            $query = "UPDATE users SET user_role = 'Admin' WHERE user_id = {$user_id}";
            $change_role_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($change_role_query);
        }
        
                if(isset($_GET['to_sub'])){
            $user_id = $_GET['to_sub'];

            $query = "UPDATE users SET user_role = 'Subscriber' WHERE user_id = {$user_id}";
            $change_role_query = mysqli_query($connection, $query);

            header('Location: '.$_SERVER['PHP_SELF']);
            exit;

            confirm_query($change_role_query);
        }
        ?>
    </tbody>
</table>