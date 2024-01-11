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
                    <h1 class="m-0">Detail Return Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?module=dashboard">Data</a></li>
                        <li class="breadcrumb-item"><a href="?module=return">Return</a></li>
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
                        <h3 class="card-title">Return Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM return_book WHERE return_id = '$Return'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $returnData = mysqli_fetch_assoc($result);

                            // Selanjutnya, Anda dapat menggunakan $bookData untuk mengisi formulir
                        } else {
                            echo "Kueri SQL gagal: " . mysqli_error($conn);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Return ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="return_id" maxlength="10" placeholder="" value="<?php echo $Return; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Member ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_id" maxlength="50" placeholder="" value="<?php echo $returnData['member_id']; ?>" readonly>
                            </div>
                        </div>
                        <!-- /.card-body -->

                        <div class="card-footer">
                            <!-- <button type="submit" class="btn btn-primary">Book Detail</button> -->
                        </div>
                    </form>
                </div>
                <!-- /.card -->

                <!-- general form elements -->

            </div><!-- /.container-fluid -->
            <button class="btn btn-success mx-4 my-2" onclick="location.href='dashboard.php?module=add_return_book&&return=<?php echo $Return; ?>'">Add Book Detail</button>

            <div class="col-md-9">

                <div class="card card-primary">
                    <div class="card-header">

                        <h3 class="card-title">Return Book Detail</h3>
                    </div>

                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="data-table">
                            <thead>
                                <tr>
                                    <th class='text-center'>No</th>
                                    <th class='text-center'>Book Name</th>
                                    <th class='text-center'>Return Date</th>
                                    <th class='text-center'>Penalty</th>
                                    <th class='text-center'>Description</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Inisialisasi query SQL
                                $sql = "SELECT return_book_detail.*, book.title FROM return_book_detail
                                INNER JOIN book ON return_book_detail.book_id = book.code
                                WHERE return_id = $Return
                                ";

                                $result_book = mysqli_query($conn, $sql);
                                $i = 1;

                                if (!$result_book) {
                                    die("Error: " . mysqli_error($conn));
                                }

                                // Tampilkan data dari hasil query di dalam tbody
                                while ($row = mysqli_fetch_assoc($result_book)) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $i . "</td>";
                                    echo "<td class='text-center'>" . $row['title'] . "</td>";
                                    echo "<td class='text-center'>" . $row['return_date'] . "</td>";
                                    echo "<td class='text-center'>Rp. " . $row['penalty'] . "</td>";
                                    echo "<td class='text-center'>" . $row['description'] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<button class='btn btn-warning mx-2'><a class='text-white' href='dashboard.php?module=edit_return_book&&return=" . $Return . "&&return_detail=" . $row['return_detail_id'] . "''>Edit</a></button>";

                                    echo "<button class='btn btn-danger'><a class='text-white' href='dashboard.php?module=delete_return_book&&return=" . $Return .
                                        "&&return_detail=" . $row['return_detail_id'] . "'' onclick='return confirm(\"Are you sure you want to delete this book ? : " . $row['title'] . "?\")'>Delete</a></button>";
                                    echo "</td>";
                                    echo "</tr>";
                                    $i++;
                                }

                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
    </section>
    <!-- /.content -->

    </body>

    </html>