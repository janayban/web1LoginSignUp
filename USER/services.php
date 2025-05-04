<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="styles.css">
    <!--  -->

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!--  -->
</head>
<body class="bg-black text-white">
    <!-- Pick A Service -->

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
                <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Services</li>
                <li class="breadcrumb-item "><a href="professional.php" class="text-decoration-none text-white">Professional</a></li>
                <li class="breadcrumb-item "><a href="date_time.php" class="text-decoration-none text-white">Date and Time</a></li>
                <li class="breadcrumb-item "><a href="confirmation.php" class="text-decoration-none text-white">Confirmation</a></li>
            </ol>
        </nav>
        <!--  -->

        <br>

        <!-- Select service -->
        <h1><b>Select Services</b></h1>
        <br><br>
        
        <!-- Card for Service.1 -->
        <div class="row text-white border border-dark align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-5 col-6">
                <img src="Assets/rect.png" width="300" height="250" alt="picture of a haircut">
            </div>
            <div class="col-lg-9 col-md-6 col-sm-7 col-6">
                <div class="card bg-black text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title" id="haircut_1"><b>Regular Men's Haircut</b></h4>
                            <h4 class="card-text" id="price_1">₱ 100</h4>
                        </div>
                      <p class="card-text">30-40 mins</p>
                      <hr>
                      <p class="card-text">A classic men’s haircut customized to your preferred length and style. Includes trimming the sides and top, cleaning up the neckline, and styling with quality products for a fresh, sharp finish. Perfect for maintaining a timeless, well-groomed look.</p>
                      <br><br>
                      <a href="#" class="btn btn-outline-dark mb-3 text-white btn-lg interactive-btn" data-id="1" onclick="selectHaircut(1)">Select this haircut</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <br><br>

        <!-- Card for Service.2 -->
        <div class="row text-white border border-dark align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-5 col-6">
                <img src="Assets/rect.png" width="300" height="250" alt="picture of a haircut">
            </div>
            <div class="col-lg-9 col-md-6 col-sm-7 col-6">
                <div class="card bg-black text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title" id="haircut_2"><b>Fade/Taper/Skin Fade</b></h4>
                            <h4 class="card-text" id="price_2">₱ 200</h4>
                        </div>
                      <p class="card-text">30-40 mins</p>
                      <hr>
                      <p class="card-text">Precision fades and tapers designed to match your personal style—ranging from subtle tapers to bold skin fades. Blended seamlessly from short to long, this haircut offers a clean, modern edge with sharp detailing and smooth transitions.</p>
                      <br><br>
                      <a href="#" class="btn btn-outline-dark mb-3 text-white btn-lg interactive-btn" data-id="2" onclick="selectHaircut(2)">Select this haircut</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <br><br>

        <!-- Card for Service.3 -->
        <div class="row text-white border border-dark align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-5 col-6">
                <img src="Assets/rect.png" width="300" height="250" alt="picture of a haircut">
            </div>
            <div class="col-lg-9 col-md-6 col-sm-7 col-6">
                <div class="card bg-black text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title" id="haircut_3"><b>Senior's Haircut</b></h4>
                            <h4 class="card-text" id="price_3">₱ 150</h4>
                        </div>
                      <p class="card-text">30-40 mins</p>
                      <hr>
                      <p class="card-text">A traditional, comfortable haircut service tailored specifically for seniors. Includes trimming the hair to your desired length, cleaning up the neckline, and light styling to maintain a neat and polished appearance with care and attention to detail.</p>
                      <br><br>
                      <a href="#" class="btn btn-outline-dark mb-3 text-white btn-lg interactive-btn" data-id="3" onclick="selectHaircut(3)">Select this haircut</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <br><br>

        <!-- Card for Service.4 -->
        <div class="row text-white border border-dark align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-5 col-6">
                <img src="Assets/rect.png" width="300" height="250" alt="picture of a haircut">
            </div>
            <div class="col-lg-9 col-md-6 col-sm-7 col-6">
                <div class="card bg-black text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title" id="haircut_4"><b>Kid's Haircut</b></h4>
                            <h4 class="card-text" id="price_4">₱ 120</h4>
                        </div>
                      <p class="card-text">30-40 mins</p>
                      <hr>
                      <p class="card-text">A fun, friendly haircut experience for kids of all ages. Our barbers are patient and experienced in making young clients feel comfortable while delivering a clean, stylish cut—whether it’s a classic look or something more playful.</p>
                      <br><br>
                      <a href="#" class="btn btn-outline-dark mb-3 text-white btn-lg interactive-btn" data-id="4" onclick="selectHaircut(4)">Select this haircut</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->
        
        <br><br>
        
        <!-- Card for Service.5 -->
        <div class="row text-white border border-dark align-items-center">
            <div class="col-lg-3 col-md-6 col-sm-5 col-6">
                <img src="Assets/rect.png" width="300" height="250" alt="picture of a haircut">
            </div>
            <div class="col-lg-9 col-md-6 col-sm-7 col-6">
                <div class="card bg-black text-white">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <h4 class="card-title" id="haircut_5"><b>Others</b></h4>
                            <h4 class="card-text" id="price_5">₱ 250</h4>
                        </div>
                      <p class="card-text">30-40 mins</p>
                      <hr>
                      <p class="card-text">LALALAL  A fun, friendly haircut experience for kids of all ages. Our barbers are patient and experienced in making young clients feel comfortable while delivering a clean, stylish cut—whether it’s a classic look or something more playful.</p>
                      <br><br>
                      <a href="#" class="btn btn-outline-dark mb-3 text-white btn-lg interactive-btn" data-id="5" onclick="selectHaircut(5)">Select this haircut</a>
                    </div>
                </div>
            </div>
        </div>
        <!--  -->

        <div class="row">
            <div class="col-lg-12 col-12 col-md-12 col-sm-12 d-flex mt-5 justify-content-center">
                <!-- Back btn of this should homepage with acc -->
                <a href="#" class="btn btn-outline-light w-50 mb-3 me-3">Back</a>
                <a href="professional.php" class="btn btn-outline-light w-50 mb-3 me-3" onclick="checkSelection(event)">Continue</a>
            </div>
        </div>

        <br><br><br><br>
    </div>

    <style>
        .interactive-btn:hover {
        background-color: #383838; 
        color: white;            
        border-color: #212529;
        }
      </style>

    <script>

        function selectHaircut(id) {
            const haircutName = document.getElementById(`haircut_${id}`).textContent;
            const haircutPrice = document.getElementById(`price_${id}`).textContent;

            localStorage.setItem("haircutTypePrice", JSON.stringify({
                haircut: haircutName,
                price: haircutPrice
            }));

            // Optional: Navigate to next page
            // window.location.href = "professional.php";
        }

        //Get all selected buttons elements with class interactive-btn
        const selectedBtns = document.querySelectorAll(".interactive-btn");

        //Get haircut element name from summary
        const haircutName = document.getElementById("haircut");

        //Get price element from summary
        const price = document.getElementById("price");

        
        //Get total element from summary
        const total = document.getElementById("total");

        let haircutPassData = null;
        let haircutPrice = null;

        selectedBtns.forEach(btn => {
            btn.addEventListener("click", function(){
                //To stop the page from going up by clicking
                event.preventDefault();

                const allRows = document.querySelectorAll(".row.align-items-center");
                allRows.forEach(r => r.classList.remove("border", "border-white"));

                const selectedCard = this.closest(".card-body");
                const selectedCol = selectedCard.closest(".col-lg-9");
                const selectedBorderRow = selectedCol.closest(".row");

                selectedBorderRow.classList.add("border", "border-white");
            })
        })

        function checkSelection() {
            const haircutData = localStorage.getItem("haircutTypePrice");

            if (!haircutData) {
                alert("Please select a haircut before continuing.");
                event.preventDefault();  // This stops the navigation
                return;
            }

            // Redirect if selection exists
            window.location.href = "professional.php";
        }

    </script>
</body>
</html>