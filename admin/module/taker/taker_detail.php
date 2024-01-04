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
                    <h1 class="m-0">Detail Taker Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?module=dashboard">Data</a></li>
                        <li class="breadcrumb-item"><a href="?module=taker">Taker</a></li>
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
                        <h3 class="card-title">Taker Detail</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM taker WHERE taker_id = '$Taker'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $takerData = mysqli_fetch_assoc($result);

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
                                <input type="text" class="form-control" id="exampleInputEmail1" name="member_id" maxlength="50" placeholder="" value="<?php echo $takerData['member_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Staff ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_id" maxlength="50" placeholder="" value="<?php echo $takerData['staff_id']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Date</label>
                                <input type="date" class="form-control" id="exampleInputEmail1" name="date" placeholder="" value="<?php echo $takerData['date']; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Time</label>
                                <input type="time" class="form-control" id="exampleInputEmail1" name="time" placeholder="" value="<?php echo $takerData['time']; ?>" readonly>
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
                        <button class="btn btn-success mx-4 my-2" onclick="location.href='dashboard.php?module=add_taker_book&&taker=<?php echo $Taker; ?>'">Add Book Detail</button>

            <div class="col-md-9">
            
            <div class="card card-primary">
                <div class="card-header">
                
                        <h3 class="card-title">Taker Book Detail</h3>
                </div>

                <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap" id="data-table">
                            <thead>
                                <tr>
                                    <th class='text-center'>No</th>
                                    <th class='text-center'>Code</th>
                                    <th class='text-center'>Title</th>
                                    <th class='text-center'>Author</th>
                                    <th class='text-center'>Publisher</th>
                                    <th class='text-center'>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php

                                // Inisialisasi query SQL
                                $sql = "SELECT code, title, author, publisher FROM book INNER JOIN  taker_detail ON code = book_id WHERE taker_id = $Taker";

                                $result_book = mysqli_query($conn, $sql);
                                $i = 1;

                                if (!$result_book) {
                                    die("Error: " . mysqli_error($conn));
                                }

                                // Tampilkan data dari hasil query di dalam tbody
                                while ($row = mysqli_fetch_assoc($result_book)) {
                                    echo "<tr>";
                                    echo "<td class='text-center'>" . $i . "</td>";
                                    echo "<td class='text-center'>" . $row['code'] . "</td>";
                                    echo "<td class='text-center'>" . $row['title'] . "</td>";
                                    echo "<td class='text-center'>" . $row['author'] . "</td>";
                                    echo "<td class='text-center'>" . $row['publisher'] . "</td>";
                                    echo "<td class='text-center'>";
                                    echo "<button class='btn btn-warning mx-2'><a class='text-white' href='dashboard.php?module=edit_taker_book&&taker=" . $Taker ."&&bookId=" . $row['code'] ."''>Edit</a></button>";
                                        
                                    echo "<button class='btn btn-danger'><a class='text-white' href='dashboard.php?module=delete_taker_book&&taker=" . $Taker .
                                        "&&bookId=" . $row['code'] ."'' onclick='return confirm(\"Are you sure you want to delete this book ? : " . $row['title'] . "?\")'>Delete</a></button>";
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