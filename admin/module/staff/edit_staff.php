    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Staff Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item"><a href="#">Staff</a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo $title; ?></a></li>
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
                        <h3 class="card-title">Edit Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="module/staff/edit_staff_action.php" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM staff WHERE staff_id = '$Staff'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $staffData = mysqli_fetch_assoc($result);

                            // Tutup koneksi database
                            mysqli_close($conn);

                            // Selanjutnya, Anda dapat menggunakan $bookData untuk mengisi formulir
                        } else {
                            echo "Kueri SQL gagal: " . mysqli_error($conn);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Staff ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_id" maxlength="10" placeholder="" value="<?php echo $Staff; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Staff Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_name" maxlength="50" placeholder="" value="<?php echo $staffData['staff_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Staff Username</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_username" maxlength="50" placeholder="" value="<?php echo $staffData['staff_username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Staff Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="staff_password" maxlength="30" placeholder="" value="<?php echo $staffData['staff_password']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="level" maxlength="50" placeholder="" value="<?php echo $staffData['level']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Gender</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="staff_gender" placeholder="Select Gender" required >
                                    <option <?php if ($staffData['staff_gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option <?php if ($staffData['staff_gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Staff Photo</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_photo" maxlength="3" placeholder="" value="<?php echo $staffData['staff_photo']; ?>" required>
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