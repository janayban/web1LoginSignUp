<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
</head>
<body class="bg-black text-white">

    <div class="container">

        <br><br>

        <!-- Name heading -->
        <div class="row align-items-center">
            <div class="col-auto">
                <img src="Assets/arrow.png" width="50" height="30" alt="arrow">
            </div>
            <div class="col">
                You are booking as <strong>Name</strong>
            </div>
        </div>
        <!--  -->

        <hr><br>

        <!-- Breadcrumbs navigation -->
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item "><a href="services.php" class="text-decoration-none text-white">Services</a></li>
                <li class="breadcrumb-item "><a href="professional.php" class="text-decoration-none text-white">Professional</a></li>
                <li class="breadcrumb-item "><a href="date_time.php" class="text-decoration-none text-white">Date and Time</a></li>
                <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Confirmation</li>
            </ol>
        </nav>
        <!--  -->
    

        <div class="row">
            <div class="col-8">
                <br>
                <h1 class="mb-5"><strong>Confirm Order Details</strong></h1>
                <h5 class="mb-4">Reservation Payment</h5>
                <p>Please select your payment method</p>
            

        <div class="container justify-content-center mb-4">
            <div class="row g-4">
                <div class="col-md-6">
                    <button type="button" class="btn btn-outline-light w-50 payment-btn">GCASH</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-outline-light w-50 payment-btn">SMART/SUN</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-outline-light w-50 payment-btn">BANK PAYMENT</button>
                </div>
                <div class="col-md-6">
                    <button type="button" class="btn btn-outline-light w-50 payment-btn">OTHER MOP</button>
                </div>
            </div>
        </div>
    

            <h5 class="mt-5">You are 4 book away to our Loyalty Promo</h5>
        
            <div class="d-flex align-items-center justify-content-between mt-5">
                <div class="rounded-circle bg-light ratio ratio-1x1 d-inline-block" style="width: 10vw; max-width: 60px;"></div>
                <div class="rounded-circle bg-light ratio ratio-1x1 d-inline-block" style="width: 10vw; max-width: 60px;"></div>
                <div class="rounded-circle bg-light ratio ratio-1x1 d-inline-block" style="width: 10vw; max-width: 60px;"></div>
                <div class="rounded-circle bg-light ratio ratio-1x1 d-inline-block" style="width: 10vw; max-width: 60px;"></div>
                <div class="rounded-circle bg-light ratio ratio-1x1 d-inline-block" style="width: 10vw; max-width: 60px;"></div>
                </div>
            </div>

        <!-- Summary card -->
        <div class = "col-md-4">
            <div class="card bg-black text-white border border-dark">
            <h3 class="card-header d-flex justify-content-center align-items-center"><b>Summary</b></h3>

            <div class="card-body">
                <br>
                <h5 class="card-title fw-bold">Haircut</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text mb-1 text-secondary" id="haircut">Selected None</p>
                    <p class="card-text mb-1" id="price">₱ 0</p>
                </div>
                <br>
                <h5 class="card-title fw-bold">Barber</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text mb-1 text-secondary" id="barberName">Barber Name</p>
                </div>
                <br>
                <h5 class="card-title fw-bold">Date</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text mb-1 text-secondary" id="date">Selected Date</p>
                </div>
                <br>
                <h5 class="card-title fw-bold">Time</h5>
                <div class="d-flex justify-content-between">
                    <p class="card-text mb-1 text-secondary" id="time">Selected Time</p>
                </div>
                <br>
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Applied Discount</h5>
                    <p class="card-text mb-1">₱ -00</p>
                </div>
                <br><hr>
                <div class="d-flex justify-content-between">
                    <h5 class="card-title">Total to pay</h5>
                    <p class="card-text mb-1" id="total">₱ 0</p>
                </div>

                <br>
                <div class="card-body d-flex flex-column justify-content-between">
                    <a href="#" class="btn btn-outline-dark mb-3 text-white" onclick="confirmDataModal(event)">Confirm</a>
                    <a href="user_history.php" class="btn btn-outline-dark mt-auto text-white mb-3">View History</a>
                    <a href="date_time.php" class="btn btn-outline-dark mt-auto text-white">Back</a>
                </div>
            </div>
        </div>
    </div>

        </div>
    </div>

    <style>
    body{
        background-color: #292929;
        color:white;
    }
    </style>

    <br><br>

    <!-- Confirmation modal -->
    <div class="modal fade" id="confirmationModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border border-dark">
                
                <div class="modal-header bg-black text-white">  
                <h2 class="modal-title text-white" id="exampleModalCenterTitle">Confirm Your Order</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body bg-dark text-white">
                
                <h5>Proceed with your new appointment?</h5>
            
                </div>
    
                <div class="modal-footer bg-black">
                <button type="button" class="btn btn-success text-white" id="deleteButton" onclick="confirmedOrder(event)">Confirm</button>
                <button type="button" class="btn btn-danger text-white" data-bs-dismiss="modal">Close</button>
                </div>
    
            </div>
        </div>
    </div>
    <!--  -->

    
    <!-- Confirmed modal -->
    <div class="modal fade" id="confirmedModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content border border-dark">
                
                <div class="modal-header bg-black text-white">  
                <h2 class="modal-title text-white" id="exampleModalCenterTitle">Payment Successful!</h2>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
    
                <div class="modal-body bg-dark text-white">
                
                <h4>Booking Added:</h4>
                <h6>Track your booking status in history section.</h6>
            
                </div>
    
                <div class="modal-footer bg-black">
                <button type="button" class="btn btn-secondary text-white" data-bs-dismiss="modal">Finish</button>
                </div>
    
            </div>
        </div>
    </div>
      <!--  -->
      
    <script>

        // Get all buttons with class 'payment-btn'
        const buttons = document.querySelectorAll('.payment-btn');

            buttons.forEach(button => {
                button.addEventListener('click', () => {
                    // Remove 'active' class from all buttons
                    buttons.forEach(btn => btn.classList.remove('active', 'btn-light'));
                    buttons.forEach(btn => btn.classList.add('btn-outline-light'));

                    // Add 'active' class to the clicked button
                    button.classList.remove('btn-outline-light');
                    button.classList.add('btn-light', 'active');
                });
            });

            
        function confirmDataModal(event){
            event.preventDefault();

            let confirmDataModalShow = new bootstrap.Modal(document.getElementById("confirmationModal"));
            confirmDataModalShow.show();
        }

        function confirmedOrder(event) {
        event.preventDefault();

        const haircutData = JSON.parse(localStorage.getItem("haircutTypePrice")) || {};
        const haircut = haircutData.haircut || "None";
        const price = parseFloat((haircutData.price || "0").replace(/[₱,]/g, ''));
        const barber = localStorage.getItem("selectedBarber") || "No barber";
        const date = localStorage.getItem("selectedDate") || null;
        const time = localStorage.getItem("selectedTime") || null;
        const discount = 0; // Update if you implement discounts later

        const bookingData = {
            haircut,
            price,
            barber,
            date,
            time,
            discount
        };

        fetch("save_bookings.php", {
            method: "POST",
            headers: { "Content-Type": "application/json" },
            body: JSON.stringify(bookingData)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Hide current modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('confirmationModal'));
                modal.hide();

                // Show success modal
                let confirmedModalShow = new bootstrap.Modal(document.getElementById("confirmedModal"));
                confirmedModalShow.show();

                // Clear localStorage after confirmation
                localStorage.clear(); // This will reset all localStorage data

                // Optionally, you can redirect the user to another page after confirmation
                // window.location.href = "your-success-page.html";
            } else {
                alert("Booking failed: " + data.error);
            }
        })
        .catch(error => {
            alert("Error submitting booking: " + error);
        });
    }



        document.addEventListener("DOMContentLoaded", function() {
            // Load haircut and price
            const saved = JSON.parse(localStorage.getItem("haircutTypePrice"));
            if (saved) {
                document.getElementById("haircut").textContent = saved.haircut || "Selected None";
                document.getElementById("price").textContent = saved.price || "₱ 0";
                document.getElementById("total").textContent = saved.price || "₱ 0";
            }

            // Load barber
            const barber = localStorage.getItem("selectedBarber");
            document.getElementById("barberName").innerText = barber || "No barber selected";

            // Load date & time
            const selectedDate = localStorage.getItem("selectedDate");
            const selectedTime = localStorage.getItem("selectedTime");
            document.getElementById("date").textContent = selectedDate || "No date selected";
            document.getElementById("time").textContent = selectedTime || "No time selected";
        });
    </script>

</body>
</html>