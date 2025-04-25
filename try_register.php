<?php include('try_registration_conn.php') ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Account</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS & JS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="d-flex justify-content-center align-items-center vh-100" style="background-image: url('bg.png'); background-size: cover; background-position: center;">

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card p-4 text-white" style="background-color: rgba(0, 0, 0, 0.85); box-shadow: 0 0 20px rgba(0, 0, 0, 0.3);">
                <h2 class="text-center mb-3">Create New Account</h2>
                <hr>

                <!-- JS Alert -->
                <div id="alert" class="alert d-none"></div>

                <!-- PHP Alert -->
                <?php if ($registrationSuccess): ?>
                    <div class="alert alert-success">Registration successful!</div>
                <?php elseif (!empty($errorMessage)): ?>
                    <div class="alert alert-danger"><?php echo $errorMessage; ?></div>
                <?php endif; ?>

                <!-- Registration Form -->
                <!-- Registration Form -->
                <form id="registerForm" method="POST" action="" onsubmit="validateForm(event)">
                    <div class="row">
                        <div class="col-sm-6 mb-3">
                            <label for="firstName" class="form-label">First Name</label>
                            <input type="text" name="firstName" id="firstName" class="form-control" placeholder="Enter First Name" value="<?php echo htmlspecialchars($_POST['firstName'] ?? ''); ?>">
                        </div>
                        <div class="col-sm-6 mb-3">
                            <label for="lastName" class="form-label">Last Name</label>
                            <input type="text" name="lastName" id="lastName" class="form-control" placeholder="Enter Last Name" value="<?php echo htmlspecialchars($_POST['lastName'] ?? ''); ?>">
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="contact" class="form-label">Contact</label>
                        <input type="text" name="contact" id="contact" class="form-control" placeholder="Enter Contact" value="<?php echo htmlspecialchars($_POST['contact'] ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Enter Username" value="<?php echo htmlspecialchars($_POST['username'] ?? ''); ?>">
                    </div>

                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Enter Password">
                    </div>

                    <div class="mb-3">
                        <label for="confirmPassword" class="form-label">Confirm Password</label>
                        <input type="password" id="confirmPassword" class="form-control" placeholder="Re-enter Password">
                    </div>

                    <button type="submit" class="btn btn-outline-light w-100">Register</button>

                    <p class="text-center mt-3">Already have an account? <a href="login.php">Login</a></p>
                </form> 
            </div>
        </div>
    </div>
</div>

<!-- Client-side JS Validation -->
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

        // Success, submit form
        document.getElementById("registerForm").submit();
    }

    function showAlert(message) {
        const alertDiv = document.getElementById("alert");
        alertDiv.classList.remove("d-none", "alert-success");
        alertDiv.classList.add("alert", "alert-danger");
        alertDiv.innerText = message;
    }

    // Auto-hide server-side alerts
    window.onload = function () {
        const alerts = document.querySelectorAll(".alert:not(#alert)");
        alerts.forEach(alert => {
            setTimeout(() => alert.classList.add("d-none"), 5000);
        });
    };
</script>

</body>
</html>
