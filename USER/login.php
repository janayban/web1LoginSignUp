<?php include('login_connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>

    <link rel="stylesheet" href="style.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(Assets/bg.png); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-8 col-sm-8 col-md-6">
                <div class="card p-4 text-white" style="background-color: rgba(0, 0, 0, 0.85); box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">

                    <a href="register.php"><i class="bi bi-arrow-left text-white col-1"></i></a> <!-- Back icon -->
                    <h2 class="text-center">Welcome Back!</h2>
                    <hr>
            
                     <!-- JS Alert -->
                     <div id="alert" class="alert d-none"></div>

                    <!-- PHP Alert -->
                    <?php if ($loginSuccess): ?>
                        <div class="alert alert-success" id="serverSuccess">Login successful! Redirecting to Home Page...</div>
                    <?php elseif (!empty($errorMessage)): ?>
                        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                    <?php endif; ?>

            
                    <!--  form -->
                    <form id="loginForm" method="POST" action="">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" 
                                   value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter Username">
                        </div>
                          
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" 
                                   value="<?php echo htmlspecialchars($password); ?>" placeholder="Enter Password">
                        </div>
            
                        <br>
            
                        <button type="submit" class="btn btn-outline-dark w-100 text-white">Login</button>
                        
                        <div class="d-flex justify-content-center align-items-center mt-3 text-center flex-column flex-sm-row">
                            <p class="mb-0">Not registered? <a href="register.php"  class="d-block d-sm-inline">Create an account</a></p>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>

    <script>
        const successDiv = document.getElementById("serverSuccess");
            if (successDiv) {
                setTimeout(() => {
                    window.location.href = "index.php";
                }, 1500);
            }
    </script>
</body>
</html>