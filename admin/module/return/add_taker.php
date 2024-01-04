    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entry Taker Data</h1>
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
                        <h3 class="card-title">Add Taker</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                    $queryStaff = "SELECT staff_name,staff_id FROM staff";
                    $queryMember = "SELECT member_name,member_id FROM member";

                    // Jalankan query SQL
                    $resultStaff = mysqli_query($conn, $queryStaff);
                    $resultMember = mysqli_query($conn, $queryMember);

                    if ($resultStaff && $resultMember) {
                        // Ambil data buku
                        $staffData = mysqli_fetch_assoc($resultStaff);
                        $memberData = mysqli_fetch_assoc($resultMember);

                        // Tutup koneksi database
                        mysqli_close($conn);

                        // Selanjutnya, Anda dapat menggunakan $staffData dan $memberData untuk keperluan formulir
                    } else {
                        if (!$resultStaff) {
                            echo "Kueri SQL untuk staf gagal: " . mysqli_error($conn);
                        }
                        if (!$resultMember) {
                            echo "Kueri SQL untuk member gagal: " . mysqli_error($conn);
                        }
                    }
                    ?>
                    <!-- form start -->
                    <form action="module/taker/add_taker_action.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Member</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="member_id" required>
                                    <option value="">Select Member</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($resultMember)) {
                                        echo "<option value='" . $row['member_id'] . "'>" . $row['member_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Staff</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="staff_id" required>
                                    <option value="">Select Staff</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($resultStaff)) {
                                        echo "<option value='" . $row['staff_id'] . "'>" . $row['staff_name'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="date" required>
                            </div>
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" id="exampleInputEmail1" name="time" required>
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