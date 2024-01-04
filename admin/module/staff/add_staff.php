    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Entry Staff Data</h1>
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
                        <h3 class="card-title">Add Staff</h3>
                    </div>
                    <!-- /.card-header -->
                    <!-- form start -->
                    <form action="module/staff/add_staff_action.php" method="POST">
                        <div class="card-body">
                            <div class="form-group">
                                <label for="">Staff ID</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_id" maxlength="10" placeholder="Enter ID" required>
                            </div>
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_name" maxlength="50" placeholder="Enter Name" required>
                            </div>
                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_username" maxlength="50" placeholder="Enter Username" required>
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" id="exampleInputEmail1" name="staff_password" maxlength="30" placeholder="********" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleSelectRounded0">Gender</label>
                                <select class="custom-select rounded-0" id="exampleSelectRounded0" name="staff_gender" placeholder="Select Gender" required >
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Photo</label>
                                <input type="text" class="form-control" id="exampleInputEmail1" name="staff_photo" maxlength="5" placeholder="Enter Photo" required>
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