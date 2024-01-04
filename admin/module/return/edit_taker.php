    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Taker Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item"><a href="#">Taker</a></li>
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
                        <h3 class="card-title">Edit Taker</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="module/taker/edit_taker_action.php" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM taker WHERE taker_id = '$Taker'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $takerData = mysqli_fetch_assoc($result);

                            // Tutup koneksi database
                            mysqli_close($conn);

                            // Selanjutnya, Anda dapat menggunakan $bookData untuk mengisi formulir
                        } else {
                            echo "Kueri SQL gagal: " . mysqli_error($conn);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Taker ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="taker_id" maxlength="10" placeholder="" value="<?php echo $Taker; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Member ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_id" maxlength="50" placeholder="" value="<?php echo $takerData['member_id']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Staff ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_id" maxlength="50" placeholder="" value="<?php echo $takerData['staff_id']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="date" placeholder="" value="<?php echo $takerData['date']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" id="exampleInputEmail1" name="time" placeholder="" value="<?php echo $takerData['time']; ?>" required>
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