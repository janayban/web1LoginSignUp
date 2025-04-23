<?php include('server.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Account</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(bg.png); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-8 col-sm-8 col-md-6">
                <div class="card p-4 text-white" style="background-color: rgba(0, 0, 0, 0.85); box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
                    <h2 class="text-center">Welcome Back!</h2>
                    <hr>
            
                    <!--  alert container (default as hidden) -->
                    <div id="alert" class="alert d-none"></div>
            
                    <!--  form -->
                    <form id="loginForm" onsubmit="validateForm(event)">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" class="form-control" placeholder="Enter Username">
                        </div>
                          
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Enter Password">
                        </div>
            
                        <br>
            
                        <button type="submit" class="btn btn-outline-dark w-100 text-white">Login</button>
                        
                        <div class="d-flex justify-content-center align-items-center mt-3 text-center flex-column flex-sm-row">
                            <p class="mb-0">Not registered? <a href="register.html"  class="d-block d-sm-inline">Create an account</a></p>
                        </div>
                    </form>
                </div>
            
            </div>
        </div>
    </div>


</body>
</html>