    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entry Return Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item"><a href="#">Return</a></li>
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
                        <h3 class="card-title">Add Return</h3>
                    </div>
                    <!-- /.card-header -->
                    <?php
                    // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                    $query = "SELECT member_id,member_name FROM member";

                    // Jalankan query SQL
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        // Ambil data buku
                        $Data = mysqli_fetch_assoc($result);

                        // Tutup koneksi database
                        mysqli_close($conn);

                        // Selanjutnya, Anda dapat menggunakan $staffData dan $memberData untuk keperluan formulir
                    } else {
                            echo "SQL Query Failure: " . mysqli_error($conn);
                    }
                    ?>
                    <!-- form start -->
                    <form action="module/return/add_return_action.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Member</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="member_id" required>
                                    <option value="">Select Member</option>
                                    <?php
                                    while ($row = mysqli_fetch_assoc($result)) {
                                        echo "<option value='" . $row['member_id'] . "'>" . $row['member_name'] . "</option>";
                                    }
                                    ?>
                                </select>
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