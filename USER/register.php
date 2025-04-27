<?php include('registration_connection.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Account</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
     <!-- Bootstrap Icons -->
     <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>

<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url(Assets/bg.png); background-size: cover; background-position: center;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card p-4 text-white" style="background-color: rgba(0, 0, 0, 0.85); box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);">

                    <a href="guest.php"><i class="bi bi-arrow-left text-white col-1"></i></a> <!-- Back icon -->
                    <h2 class="text-center">Create New Account</h2>
                    <hr>

                    <!-- JS Alert -->
                    <div id="alert" class="alert d-none"></div>

                    <!-- PHP Alert -->
                    <?php if ($registrationSuccess): ?>
                        <div class="alert alert-success" id="serverSuccess">Registration successful! Redirecting to login...</div>
                    <?php elseif (!empty($errorMessage)): ?>
                        <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                    <?php endif; ?>

                    <!-- Form -->
                    <form id="registerForm" method="POST" action="" onsubmit="validateForm(event)">
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="firstName" class="form-label">First Name</label>
                                    <input type="text" id="firstName" name="firstName" class="form-control" 
                                           value="<?php echo htmlspecialchars($firstName); ?>" placeholder="Enter First Name">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="lastName" class="form-label">Last Name</label>
                                    <input type="text" id="lastName" name="lastName" class="form-control" 
                                           value="<?php echo htmlspecialchars($lastName); ?>" placeholder="Enter Last Name">
                                </div>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="contact" class="form-label">Contact</label>
                            <input type="text" id="contact" name="contact" class="form-control" 
                                   value="<?php echo htmlspecialchars($contact); ?>" placeholder="Enter Contact">
                        </div>

                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" id="username" name="username" class="form-control" 
                                   value="<?php echo htmlspecialchars($username); ?>" placeholder="Enter Username">
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" id="password" name="password" class="form-control" placeholder="Enter Password">
                        </div>

                        <div class="mb-3">
                            <label for="confirmPassword" class="form-label">Confirm Password</label>
                            <input type="password" id="confirmPassword" name="confirmPassword" class="form-control" placeholder="Re-enter Password">
                        </div>

                        <button type="submit" class="btn btn-outline-dark w-100 text-white">Register</button>

                        <div class="d-flex justify-content-center align-items-center mt-3 text-center flex-column flex-sm-row">
                            <p class="mb-0">Already have an account? <a href="login.php">Login</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Client-side Validation & Redirect -->
    <script>
        function validateForm(event) {
            event.preventDefault();

            const firstName = document.getElementById("firstName").value.trim();
            const lastName = document.getElementById("lastName").value.trim();
            const contact = document.getElementById("contact").value.trim();
            const username = document.getElementById("username").value.trim();
            const password = document.getElementById("password").value.trim();
            const confirmPassword = document.getElementById("confirmPassword").value.trim();
            const alertDiv = document.getElementById("alert");

            // Reset alert
            alertDiv.className = "alert d-none";
            alertDiv.innerText = "";

            const onlyChars = /^[A-Za-z]+$/;
            const onlyNumbers = /^\d+$/;
            const min8Chars = /^.{8,}$/;
            const min11Chars = /^.{11,}$/;
            const oneUpper = /[A-Z]/;
            const oneLower = /[a-z]/;
            const oneDigit = /\d/;
            const oneSpecial = /[@$!%*?&./]/;

            if (!firstName || !lastName || !contact || !username || !password || !confirmPassword) {
                return showAlert("All fields are required");
            }
            if (!onlyChars.test(firstName)) {
                return showAlert("First Name must contain only letters");
            }
            if (!onlyChars.test(lastName)) {
                return showAlert("Last Name must contain only letters");
            }
            if (!onlyNumbers.test(contact) || !min11Chars.test(contact)) {
                return showAlert("Contact must be at least 11 digits and numeric only");
            }
            if (!min8Chars.test(username)) {
                return showAlert("Username must be at least 8 characters");
            }
            if (!min8Chars.test(password)) {
                return showAlert("Password must be at least 8 characters");
            }
            if (!oneUpper.test(password) || !oneLower.test(password) || !oneDigit.test(password) || !oneSpecial.test(password)) {
                return showAlert("Password must contain upper, lower, digit, and special character");
            }
            if (password !== confirmPassword) {
                return showAlert("Passwords do not match");
            }

            // alertDiv.classList.remove("d-none", "alert-danger");
            // alertDiv.classList.add("alert-success");
            // alertDiv.innerText = "Registration Successful";

            // Submit form after short delay
            setTimeout(() => {
                document.getElementById("registerForm").submit();
            }, 1500);
        }

        function showAlert(message) {
            const alertDiv = document.getElementById("alert");
            alertDiv.classList.remove("d-none", "alert-success");
            alertDiv.classList.add("alert", "alert-danger");
            alertDiv.innerText = message;
        }

        // Auto-hide and redirect
        window.onload = function () {
            const alerts = document.querySelectorAll(".alert:not(#alert)");
            alerts.forEach(alert => {
                setTimeout(() => alert.classList.add("d-none"), 5000);
            });

            const successDiv = document.getElementById("serverSuccess");
            if (successDiv) {
                setTimeout(() => {
                    window.location.href = "login.php";
                }, 1500);
            }
        };
    </script>
</body>
</html>
