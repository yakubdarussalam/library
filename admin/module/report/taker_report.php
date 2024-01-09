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
                        <?php
                        echo "<div>
<h3 class='head'>Taker Report</h3>
<form action='?module=taker_book_report' method='POST' target='_blank'>
<table>
<tr>
	<td>Start Date</td><td>:</td><td>
	<select name='start_day'>
                <option value='none' selected='selected'>Date</option>";
                        for ($h = 1; $h <= 31; $h++) {
                            echo "<option value=", $h, ">", $h, "</option>";
                        }
                        echo "</select>
	<select name='start_month'>
            	<option value='none' selected='selected'>Month</option>
				<option value='1'>January</option>
				<option value='2'>February</option>
				<option value='3'>March</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>June</option>
				<option value='7'>July</option>
				<option value='8'>August</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>December</option>
			</select>
	<select name='start_year'>
            <option value='none' selected='selected'>Year</option>";
                        $now =  date("Y");
                        $saiki = 2020;
                        for ($l = $saiki; $l <= $now; $l++) {
                            echo "<option value=", $l, ">", $l, "</option>";
                        }
                        echo "</select>
	</td>
	</tr>

<tr>
	<td>End Date</td><td>:</td><td>
	<select name='end_day'>
                <option value='none' selected='selected'>Date</option>";
                        for ($h = 1; $h <= 31; $h++) {
                            echo "<option value=", $h, ">", $h, "</option>";
                        }
                        echo "</select>
	<select name='end_month'>
            	<option value='none' selected='selected'>Month</option>
				<option value='1'>January</option>
				<option value='2'>February</option>
				<option value='3'>March</option>
				<option value='4'>April</option>
				<option value='5'>Mei</option>
				<option value='6'>June</option>
				<option value='7'>July</option>
				<option value='8'>August</option>
				<option value='9'>September</option>
				<option value='10'>Oktober</option>
				<option value='11'>November</option>
				<option value='12'>December</option>
			</select>
	<select name='end_year'>
            <option value='none' selected='selected'>Year</option>";
                        $now =  date("Y");
                        $saiki = 2020;
                        for ($l = $saiki; $l <= $now; $l++) {
                            echo "<option value=", $l, ">", $l, "</option>";
                        }
                        echo "</select>
	</td>
	</tr>
   </table>	
<div class='my-2'>
<input type=submit name=submit value=Generate>
</div>
</form>
</div>";
                        ?>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive p-0">

                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- /.row -->

        <!-- /.row -->

        <!-- /.row -->
    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->

</body>

</html>