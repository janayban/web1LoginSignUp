<?php include('registration_connection.php') ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(bg.png); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-10 col-sm-11 col-md-10 col-lg-8 col-xl-8">
                <div class="card p-4 text-white" style="background-color: rgba(0, 0, 0, 0.85); box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">
                    <h2 class="text-center">Create New Account</h2>
                    <hr>
            
                    <!--  alert container (default as hidden) -->
                    <div id="alert" class="alert d-none"></div>
            
                    <!--  form -->
                    <form id="loginForm" method="POST" action="" onsubmit="validateForm(event)">
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>
            
                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" placeholder="Enter Contact">
                        </div>
            
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" placeholder="Enter Username">
                        </div>
                          
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Re-enter Password">
                        </div>
            
                        <br>
            
                        <button type="submit" class="btn btn-outline-dark w-100 text-white" id="register">Register</button>
                        
                        <div class="d-flex justify-content-center align-items-center mt-3 text-center flex-column flex-sm-row">
                            <p class="mb-0">Already have an account? <a href="login.php" >Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function validateForm(event) {
            event.preventDefault(); // Stop form submission for validation
    
            // Get Form Values
            const username          = document.getElementById("username").value.trim();
            const password          = document.getElementById("password").value.trim();
            const firstName         = document.getElementById("firstName").value.trim();
            const lastName          = document.getElementById("lastName").value.trim();
            const contact           = document.getElementById("contact").value.trim();
            const confirmPassword   = document.getElementById("confirmPassword").value.trim();
            const alertDiv          = document.getElementById("alert");
    
            // Resetting Alert
            alertDiv.className = "alert d-none";
            alertDiv.innerText = "";
    
            // Define regex for checks
            const onlyNumber = /^\d+$/;                      // Contact must be only digits
            const min11Chars = /^.{11,}$/;                   // Minimum of 11 characters
            const min8Chars = /^.{8,}$/;                     // Minimum of 8 characters
            const onlyUpper = /(?=.*[A-Z])/;                 // At least one uppercase
            const onlyLower = /(?=.*[a-z])/;                 // At least one lowercase
            const specialChars = /(?=.*[@$!%*?%&./#^-])/;    // At least one special character
            const onlyChars = /^[A-Za-z]+$/;                 // Only characters
            const oneDigit = /(?=.*\d)/;                     // At least one digit

    
            // Empty field check
            if (!contact || !username || !password || !firstName || !lastName || !confirmPassword) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "All fields are required";
                return;
            }

            // First Name
            // Only characters
            if (!onlyChars.test(firstName)) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "First Name must contain only letters";
                return;
            }

            // Last Name
            // Only characters
            if (!onlyChars.test(lastName)) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Last Name must contain only letters";
                return;
            }
            
            // Contact 
            // Contact digits only
            if (!onlyNumber.test(contact)) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Contact must contain only numbers (0-9)";
                return;
            }

            // Contact length check
            if (!min11Chars.test(contact)) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Contact must have a minimum of eleven (11) characters";
                return;
            }

            //Username
            //Username must have minimum 8 characters
            if (!min8Chars.test(username)) {
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Username must have a minimum of eight (8) characters";
                return;
            }

            //Password
            // Minimum 8 letters
            if (!min8Chars.test(password)){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Password must have at least eight (8) characters";
                return;
            }

            // Contains at least one upper case
            if (!onlyUpper.test(password)){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Password must have at least one (1) UPPER case letter";
                return;
            }

            // Contains at least one lower case
            if (!onlyLower.test(password)){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Password must have at least one (1) lower case letter";
                return;
            }

            // Contains at least one special character
            if (!specialChars.test(password)){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Password must have at least one (1) special character (@, $, !, %, *, ?, %, &)";
                return;
            }

            // Contains at least one digit/number
            if (!oneDigit.test(password)){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Password must have at least one (1) digit/number (0-9)";
                return;
            }

            // Confirm password
            // Must be the same with password
            if (confirmPassword!=password){
                alertDiv.classList.remove("d-none", "alert-success");
                alertDiv.classList.add("alert-danger");
                alertDiv.innerText = "Passwords do not match";
                return;
            }

            
            // // Success
            // alertDiv.classList.remove("d-none", "alert-danger");
            // alertDiv.classList.add("alert-success");
            // alertDiv.innerText = "Login Successful";
    
            // Submit form after a short delay
            setTimeout(() => {
                document.getElementById("loginForm").submit();
            }, 1500);
        }
    </script>
    
</body>
</html>