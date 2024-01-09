    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
        <div class="d-flex justify-content-center">
            <?php
            
            if (isset($_SESSION['success_message'])) {
                echo '<button class="btn btn-success toastsDefaultSuccess">' . $_SESSION['success_message'] . '</button>';
                unset($_SESSION['success_message']); // Hapus pesan sukses dari session
            } elseif (isset($_SESSION['error_message'])) {
                echo '<button class="btn btn-danger toastsDefaultDanger">' . $_SESSION['error_message'] . '</button>';
                unset($_SESSION['error_message']); // Hapus pesan error dari session
            }
            ?>
        </div>
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entry Return Book Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?module=dashboard">Data</a></li>
                        <li class="breadcrumb-item"><a href="?module=return">Return</a></li>
                        <li class="breadcrumb-item"><a href="?module=return_detail&&return=<?php echo $Return?>">Return Detail</a></li>
                        <li class="breadcrumb-item"><a href="?module=add_return_book"><?php echo $title; ?></a></li>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->

    </div>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid ">
            <!-- /.row -->
            <div class="col-md-6">
            <!-- general form elements -->
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Add Book</h3>
                </div>
                <!-- /.card-header -->
                <?php
                $sql = "SELECT * FROM return_book WHERE  return_id = '$Return'";
                $ress = mysqli_query($conn, $sql);
                $data = mysqli_fetch_array($ress);
                ?>
                <!-- form start -->
                <form action="module/return/add_return_book_action.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <input type="hidden" class="form-control" id="exampleInputEmail1" name="return_id" maxlength="10" placeholder="Return ID" value="<?php echo $data['return_id'];?>" required>
                        </div>
                        <div class="form-group">
                            <label for="">Book ID</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="book_id" maxlength="50" placeholder="Enter Book ID" required>
                        </div>
                        <div class="form-group">
                                <label for="">Return Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="return_date" required>
                            </div>
                        <div class="form-group">
                            <label for="">Penalty</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" name="penalty" maxlength="50" placeholder="Enter Penalty" required>
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="description" maxlength="50" placeholder="Enter Description" required>
                        </div>
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            <!-- /.card -->

            <!-- general form elements -->

        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->

    </body>

    </html>