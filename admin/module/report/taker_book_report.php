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
                <h1 class="m-0">Dashboard</h1>
            </div><!-- /.col -->
            <?php
            $start_day = $_POST['start_day'];
            $start_month = $_POST['start_month'];
            $start_year = $_POST['start_year'];
            $end_day = $_POST['end_day'];
            $end_month = $_POST['end_month'];
            $end_year = $_POST['end_year'];
            $start = "$_POST[start_year]-$_POST[start_month]-$_POST[start_day]";
            $end = "$_POST[end_year]-$_POST[end_month]-$_POST[end_day]";
            ?>

            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="?module=dashboard">Home</a></li>
                    <li class="breadcrumb-item active"><?php echo $title; ?></li>
                </ol>
            </div><!-- /.col -->
        </div><!-- /.row -->
        <!-- <button class="btn btn-success mx-4" onclick="location.href='dashboard.php?module=add_taker_data'">Add</button> -->
    </div><!-- /.container-fluid -->

</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- /.row -->

        
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">



                                    <h3 class="card-title" for="limit">Taker Book Report</h3>
                                    <select id="limit" class="mx-2" onchange="updateTable()">
                                        <option value="0">all</option>
                                        <option value="5">5</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                    </select>
                                    <br>
                                    <h3 class="card-title"> Start Date : <?php echo $start_day . "-" . $start_month . "-" . $start_year   ?> <br> End Date : <?php echo $end_day . "-" . $end_month . "-" . $end_year   ?></h3>

                                    <div class="card-tools">
                                        <form method="post">
                                            <div class="input-group input-group-sm" style="width: 150px;">
                                                <input type="text" id="search" name="search" class="form-control float-right" placeholder="Search" value="<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>">

                                                <div class="input-group-append">
                                                    <button type="submit" class="btn btn-default">
                                                        <i class="fas fa-search"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap" id="data-table">
                                        <thead>
                                            <tr>
                                                <th class='text-center'>No</th>
                                                <th class='text-center'>Taker Name</th>
                                                <th class='text-center'>Staff Name</th>
                                                <th class='text-center'>Date</th>
                                                <th class='text-center'>Time</th>
                                                <th class='text-center'>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            // Inisialisasi query SQL
                                            $sql = "SELECT *  FROM taker INNER JOIN member ON taker.member_id = member.member_id INNER JOIN staff ON taker.staff_id = staff.staff_id where date BETWEEN '$start' AND '$end'";

                                            // Periksa apakah ada kata kunci pencarian yang dikirimkan
                                            if (isset($_POST['search']) && !empty($_POST['search'])) {
                                                // Jika ada kata kunci pencarian, tambahkan filter pencarian ke query SQL
                                                $search = $_POST['search'];
                                                $sql .= " WHERE Title LIKE '%$search%'";
                                            }

                                            $result = mysqli_query($conn, $sql);
                                            $i = 1;

                                            if (!$result) {
                                                die("Error: " . mysqli_error($conn));
                                            }
                                            if ($row = mysqli_num_rows($result) > 0) {
                                                // Tampilkan data dari hasil query di dalam tbody
                                                while ($row = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center'>" . $i . "</td>";
                                                    echo "<td class='text-center'>" . $row['member_name'] . "</td>";
                                                    echo "<td class='text-center'>" . $row['staff_name'] . "</td>";
                                                    echo "<td class='text-center'>" . $row['date'] . "</td>";
                                                    echo "<td class='text-center'>" . $row['time'] . "</td>";
                                                    echo "<td class='text-center'>";
                                                    echo "<button class='btn btn-primary     mx-2'><a class='text-white' href='dashboard.php?module=taker_detail&&taker=" . $row['taker_id'] .
                                                        "' " . $row['taker_id'] . "\")'>Detail</a></button>";
                                                    echo "</td>";
                                                    echo "</tr>";
                                                    $i++;
                                                }
                                            } else {
                                                echo '
                                            <tr>
                                            <td colspan=6><center>Data not found !</center></td>
                                            </tr>';
                                            }

                                            ?>

                                        </tbody>
                                    </table>
                                    <div>
                                    <button class="btn btn-secondary mx-2 my-2" onclick="window.print()">Print Page</button>
                                </div>
                                </div>
                                <!-- /.card-body -->
                                
                            </div>
                            <!-- /.card -->
                        </div>
                    </div>
                    <!-- /.card-body -->

        <!-- /.row -->

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</body>

</html>