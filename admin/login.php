<head>

    <link rel="stylesheet" href="../dist/css/login.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body style="background-color: darkslategray;">
    
<div class="container">
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <div class="card my-4">

                <form class="card-body p-lg-5" method="POST" action="login_check.php">
                            <h2 class="text-center text-dark mt-1 mb-1">Login</h2>

                    <?php
                    // Cek jika terdapat pesan kesalahan dari URL
                    if (isset($_GET['error'])) {
                        $error = $_GET['error'];
                        if ($error === "invalid_cred") {
                            echo "<script>alert('Invalid username or password. Please try again!');</script>";
                        }
                        // Anda dapat menambahkan logika untuk pesan kesalahan lainnya di sini
                    }

                    ?>

                    <?php
                    // Cek jika terdapat pesan logout dari URL
                    if (isset($_GET['logout'])) {
                        $logout = $_GET['logout'];
                        if ($logout === "success") {
                            echo "<script>alert('You have successfully logged out!');</script>";
                        }
                        // Anda dapat menambahkan logika untuk pesan logout lainnya di sini
                    }
                    ?>
                    <div class="text-center">
                        <img src="../dist/img/login-logo.png" class="img-fluid profile-image-pic  my-2"alt="profile">
                    </div>

                    <div class="mb-3">
                        <input type="text" name="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="User Name">
                    </div>
                    <div class="mb-3">
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password">
                    </div>
                    <div class="text-center"><button type="submit" class="btn btn-primary px-5 mb-5 w-90">Login</button></div>
                    <div id="emailHelp" class="form-text text-center text-dark">Not
                        Registered? <a href="#" class="text-dark fw-bold"> Create an
                            Account</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

</body>