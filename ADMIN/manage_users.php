<?php
include('server.php');

// Fetch users
$query = "SELECT user_id, first_name, last_name, contact FROM users";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Users</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-black text-white">

<div class="container py-5">
    <!-- Header -->
    <nav class="navbar navbar-dark bg-black mb-3">
        <h1 class="navbar-brand">Manage Account Users</h1>
    </nav>

    <!-- Breadcrumbs & Search -->
    <div class="row mb-4">
        <div class="col-md-6">
            <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
                <ol class="breadcrumb text-white">
                    <li class="fw-bold breadcrumb-item active text-white">Users</li>
                    <li class="breadcrumb-item"><a href="manage_barbers.php" class="text-white text-decoration-none">Barbers</a></li>
                </ol>
            </nav>
        </div>
        <div class="col-md-6 d-flex justify-content-end">
            <form class="d-flex" id="searchBarForm">
                <input id="searchDataInput" class="form-control me-2" type="search" placeholder="Search">
                <button class="btn btn-outline-secondary" type="submit">Search</button>
            </form>
        </div>
    </div>

    <!-- User Cards -->
    <div class="row" id="userCardsRow">
        <?php if ($users): ?>
            <?php foreach ($users as $user): ?>
                <?php
                    $fullName = htmlspecialchars($user['first_name'] . ' ' . substr($user['last_name'], 0, 1) . '.');
                    $contact = htmlspecialchars($user['contact']);
                    $userId = (int)$user['user_id'];
                ?>
                <div class="col-lg-2 col-md-3 col-sm-4 col-6 mb-4 user-card" data-user-id="<?= $userId ?>">
                    <div class="card bg-black border border-dark text-white h-100">
                        <img src="Assets/dot.png" class="card-img-top" alt="User image">
                        <div class="card-body text-center">
                            <h6 class="card-title"><?= $fullName ?></h6>
                            <p class="card-text"><?= $contact ?></p>
                            <a href="#" class="card-link text-danger" onclick="deleteUser(event)">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center">
                <h1>No Current Users</h1>
            </div>
        <?php endif; ?>
    </div>
</div>

<!-- JS -->
<script>
    const searchInput = document.getElementById("searchDataInput");
    const searchForm = document.getElementById("searchBarForm");

    searchForm.addEventListener("submit", function (e) {
        e.preventDefault();
        searchUsers();
    });

    searchInput.addEventListener("input", function () {
        if (searchInput.value.trim() === "") resetSearch();
    });

    function searchUsers() {
    const query = searchInput.value.trim().toLowerCase();
    const cards = document.querySelectorAll(".user-card");
    let matchFound = false;

    cards.forEach(card => {
        const name = card.querySelector(".card-title").textContent.toLowerCase();
        const contact = card.querySelector(".card-text").textContent.toLowerCase();

        if (name.includes(query) || contact.includes(query)) {
            card.style.display = "block";
            matchFound = true;
        } else {
            card.style.display = "none";
        }
    });

    const noResult = document.getElementById("noResultsMessage");
    if (!matchFound) {
        if (!noResult) {
            const message = document.createElement("div");
            message.id = "noResultsMessage";
            message.className = "col-12 text-center text-white";
            message.innerHTML = "<h1>No Matching Users</h1>";
            document.getElementById("userCardsRow").appendChild(message);
        }
    } else if (noResult) {
        noResult.remove();
    }
}


    function resetSearch() {
        document.querySelectorAll(".user-card").forEach(card => {
            card.style.display = "block";
        });

        const noResult = document.getElementById("noResultsMessage");
        if (noResult) noResult.remove();
    }



    function deleteUser(event) {
        event.preventDefault();
        const card = event.target.closest(".user-card");
        const userId = card.getAttribute("data-user-id");

        if (!confirm("Are you sure you want to delete this user?")) return;

        fetch("delete_user.php", {
            method: "POST",
            headers: { "Content-Type": "application/x-www-form-urlencoded" },
            body: `user_id=${encodeURIComponent(userId)}`
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                card.remove();

                const remaining = Array.from(document.querySelectorAll(".user-card")).filter(c => c.style.display !== "none");
                if (remaining.length === 0) {
                    document.getElementById("userCardsRow").innerHTML = `
                        <div class="col-12 text-center text-white">
                            <h1>No Current Users</h1>
                        </div>
                    `;
                }
            } else {
                alert("Error: " + (data.error || "Could not delete user."));
            }
        })
        .catch(err => {
            console.error(err);
            alert("An error occurred.");
        });
    }
</script>

</body>
</html>
