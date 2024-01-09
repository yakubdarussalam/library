<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
        <!-- Content here -->
        <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Edit Return Data</h1>
                </div><!-- /.col -->

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="dashboard.php?module=dashboard">Data</a></li>
                        <li class="breadcrumb-item"><a href="dashboard.php?module=return">Return</a></li>
                        <li class="breadcrumb-item"><a href=""><?php echo $title; ?></a></li>
                        </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
    </div>
</div>
<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <div class="col-md-6">
            <div class="card card-primary">
                <div class="card-header">
                    <h3 class="card-title">Edit Return</h3>
                </div>
                <form action="module/return/edit_return_action.php" method="POST">
                    <?php
                    $query = "SELECT * FROM return_book WHERE return_id = '$Return'";
                    $result = mysqli_query($conn, $query);

                    if ($result) {
                        $returnData = mysqli_fetch_assoc($result);

                        $memberQuery = "SELECT member_id, member_name FROM member";
                        $memberResult = mysqli_query($conn, $memberQuery);

                        if ($memberResult && mysqli_num_rows($memberResult) > 0) {
                            ?>
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="">Return ID</label>
                                    <input type="text" class="form-control" name="return_id" maxlength="10" value="<?php echo $Return; ?>" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="">Member Name</label>
                                    <select class="form-control" name="member_id" required>
                                        <?php
                                        while ($member = mysqli_fetch_assoc($memberResult)) {
                                            $selected = ($returnData['member_id'] == $member['member_id']) ? 'selected' : '';
                                            echo "<option value='" . $member['member_id'] . "' $selected>" . $member['member_name'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo "No members found.";
                        }
                    } else {
                        echo "Query failed: " . mysqli_error($conn);
                    }
                    ?>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
