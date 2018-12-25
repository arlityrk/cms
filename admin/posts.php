<?php include "includes/admin_header.php"; ?>

<div id="wrapper">

    <!-- Navigation -->
    <?php include "includes/admin_navigation.php";?>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Posts
                        <small>Author</small>
                    </h1>
                    
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <td>Id</td>
                                <td>Author</td>
                                <td>Title</td>
                                <td>Category</td>
                                <td>Status</td>
                                <td>Image</td>
                                <td>Tags</td>
                                <td>Comments</td>
                                <td>Date</td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>Arli</td>
                                <td>Post title</td>
                                <td>PHP</td>
                                <td>Added</td>
                                <td>Image</td>
                                <td>php-tag</td>
                                <td>My comment</td>
                                <td>01.01.2019</td>
                            </tr>
                        </thead>
                    </table>
                    
               
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>
    <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<?php include "includes/admin_footer.php"; ?>
