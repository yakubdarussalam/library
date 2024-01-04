    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Member Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item"><a href="#">Member</a></li>
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
                        <h3 class="card-title">Edit Member</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="module/member/edit_member_action.php" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM member WHERE member_id = '$Member'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $memberData = mysqli_fetch_assoc($result);

                            // Tutup koneksi database
                            mysqli_close($conn);

                            // Selanjutnya, Anda dapat menggunakan $bookData untuk mengisi formulir
                        } else {
                            echo "Kueri SQL gagal: " . mysqli_error($conn);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Member ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_id" maxlength="10" placeholder="" value="<?php echo $Member; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Member Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_name" maxlength="50" placeholder="" value="<?php echo $memberData['member_name']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Member Username</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_username" maxlength="50" placeholder="" value="<?php echo $memberData['member_username']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Member Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="member_password" maxlength="30" placeholder="" value="<?php echo $memberData['member_password']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Gender</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="member_gender" placeholder="Select Gender" required >
                                    <option <?php if ($memberData['member_gender'] == 'Male') echo 'selected'; ?>>Male</option>
                                    <option <?php if ($memberData['member_gender'] == 'Female') echo 'selected'; ?>>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Member Photo</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_photo" maxlength="3" placeholder="" value="<?php echo $memberData['member_photo']; ?>" required>
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