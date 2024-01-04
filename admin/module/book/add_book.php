    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entry Book Data</h1>
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
                    <h3 class="card-title">Add Book</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="module/book/add_book_action.php" method="POST">
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Book Code</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="code" maxlength="10" placeholder="Enter Code" required>
                        </div>
                        <div class="form-group">
                            <label for="">Title</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="title" maxlength="50" placeholder="Enter Title" required>
                        </div>
                        <div class="form-group">
                            <label for="">Author</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="author" maxlength="50" placeholder="Enter Author" required>
                        </div>
                        <div class="form-group">
                            <label for="">Publisher</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="publisher" maxlength="30" placeholder="Enter Publisher" required>
                        </div>
                        <div class="form-group">
                            <label for="">Stock</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" name="stock" maxlength="3" placeholder="Enter Stock" required>
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