    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Book Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Data</a></li>
                        <li class="breadcrumb-item"><a href="#">Book</a></li>
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
                        <h3 class="card-title">Edit Book</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="module/book/edit_book_action.php" method="POST">
                        <?php
                        // Siapkan kueri SQL untuk mengambil data buku berdasarkan bookCode
                        $query = "SELECT * FROM book WHERE Code = '$Code'";

                        // Jalankan query SQL
                        $result = mysqli_query($conn, $query);

                        if ($result) {
                            // Ambil data buku
                            $bookData = mysqli_fetch_assoc($result);

                            // Tutup koneksi database
                            mysqli_close($conn);

                            // Selanjutnya, Anda dapat menggunakan $bookData untuk mengisi formulir
                        } else {
                            echo "Kueri SQL gagal: " . mysqli_error($conn);
                        }
                        ?>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Book Code</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="code" maxlength="10" placeholder="" value="<?php echo $Code; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="">Title</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="title" maxlength="50" placeholder="" value="<?php echo $bookData['Title']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Author</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="author" maxlength="50" placeholder="" value="<?php echo $bookData['Author']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Publisher</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="publisher" maxlength="30" placeholder="" value="<?php echo $bookData['Publisher']; ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="">Stock</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="stock" maxlength="3" placeholder="" value="<?php echo $bookData['Stock']; ?>" required>
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