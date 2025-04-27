<?php
include('server.php');

// Fetch users from the database
$query = "SELECT first_name, last_name, contact FROM users"; // Replace with your actual query and table
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC); // Fetch users as an associative array

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="styles.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body class="bg-black text-white">
    <!-- Pick A Professional Page -->

    <div class="container">
        <br><br>

        <!-- Name heading -->
        <div class="row">
            <!-- Offcanvas dark navbar -->
            <div class="col">
                <nav class="navbar navbar-dark bg-black align-items-end d-flex flex-column">
                    <div class="container-fluid">
                        <a class="navbar-brand" href="#"><h1>Manage Accounts Users</h1></a>
                    </div>
                </nav>
            </div>
        </div>
        <hr>

        <!-- Breadcrumbs navigation -->
        <div class="row">
            <div class="col">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Users</li>
                        <li class="breadcrumb-item "><a href="manage_barbers.html" class="text-decoration-none text-white">Barbers</a></li>
                    </ol>
                </nav>
            </div>
            <div class="col">
                <nav class="navbar navbar-light bg-black align-items-end d-flex flex-column">
                    <form class="form-inline d-flex" id="searchBarForm">
                        <input id="searchDataInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </nav>
            </div>
        </div>

        <br><br>
        <div class="row" id="row1">
            <?php
            // Display the users as cards
            if ($users) {
                foreach ($users as $user) {
                    // Concatenate first name and last name
                    $fullName = $user['first_name'] . ' ' . substr($user["last_name"], 0, 1). '.';
                    $contact = $user['contact'];
                    ?>
                    <div class="col-lg-2 col-sm-4 col-md-3 col-6 d-flex justify-content-center align-items-center mb-4">
                        <!-- Card -->
                        <div class="card bg-black border border-dark" style="width: 15rem;">
                            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="User's face">
                            <div class="card-body">
                                <h6 class="card-title d-flex justify-content-center align-items-center text-white"><?= htmlspecialchars($fullName) ?></h6>
                            </div>
                            <p class="d-flex justify-content-center align-items-center text-white"><?= htmlspecialchars($contact) ?></p>
                            <div class="card-body">
                                <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="deleteCard(event)">Delete</a>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            } else {
                echo "<div class='col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center text-white'>
                        <h1>No Current Users</h1>
                    </div>";
            }
            ?>
        </div>

    </div>

    <script>
        // JavaScript for handling search and delete functionality

        const searchBarForm = document.getElementById("searchBarForm");
        const searchDataInput = document.getElementById("searchDataInput");

        searchBarForm.addEventListener("submit", function(event) {
            event.preventDefault();
            searchCard();
        });

        searchDataInput.addEventListener("input", function() {
            if (searchDataInput.value.trim() === "") resetSearch();
        });

        function searchCard() {
            const cardsToSearch = document.querySelectorAll(".card");
            const querySearch = searchDataInput.value.trim().toLowerCase();

            cardsToSearch.forEach(card => {
                const titleElement = card.querySelector("h6.card-title");

                if (titleElement) {
                    const nameCard = titleElement.textContent.toLowerCase();

                    if (nameCard.includes(querySearch)) {
                        card.parentElement.style.display = "flex";
                        card.classList.add("border-white");
                        card.classList.remove("border-dark");
                    } else {
                        card.parentElement.style.display = "none";
                        card.classList.remove("border-white");
                        card.classList.add("border-dark");
                    }
                }
            });
        }

        function resetSearch() {
            const cardsToSearch = document.querySelectorAll(".card");
            cardsToSearch.forEach(card => {
                card.parentElement.style.display = "flex";
                card.classList.remove("border-white");
                card.classList.add("border-dark");
            });
        }

        function deleteCard(event) {
            event.preventDefault();
            const card = event.target.closest(".card");
            const col = card.closest(".col-2");

            if (col) {
                col.remove();
            }

            const remainingUsers = document.querySelectorAll("#row1 .col-2");
            if (remainingUsers.length === 0) {
                const row1 = document.getElementById("row1");
                row1.innerHTML = `
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center text-white">
                        <h1>No Current Users</h1>
                    </div>
                `;
            }
        }
    </script>
</body>
</html>
