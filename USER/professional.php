<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Professional</title>

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <!--  -->

</head>
<body class="bg-black text-white">
    <!-- Pick A Professional Page -->
    
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
          <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Professional</li>
          <li class="breadcrumb-item "><a href="date_time.php" class="text-decoration-none text-white">Date and Time</a></li>
          <li class="breadcrumb-item "><a href="confirmation.php" class="text-decoration-none text-white">Confirmation</a></li>
        </ol>
      </nav>
      <!--  -->

      <br>

      <!-- Select professional -->
      <h1><b>Select Professional</b></h1>
      <br><br>
      <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.1 -->
          <div class="card interactive-card bg-black border-dark" data-id="1" data-name="Tralalero Tralala" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_1">Tralalero Tralala</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Tralalero', 'Tralala', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->

        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.2 -->
          <div class="card interactive-card bg-black border border-dark" data-id="2" data-name="Bombardiro Crocodilo" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_2">Bombardiro Crocodilo</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Bombardiro', 'Crocodilo', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->
          
        </div>
        
        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.3 -->
          <div class="card interactive-card bg-black border border-dark" data-id="3" data-name="Tung Tung Sahur" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_3">Tung Tung Sahur</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Tung Tung', 'Sahur', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->

        </div>

      </div>

      <br><br>

      <div class="row">
        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.4 -->
          <div class="card interactive-card bg-black border border-dark" data-id="4" data-name="Chimpanzini Bananini" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_4">Chimpanzini Bananini</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Chimpanzini', 'Bananini', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->

        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.5 -->
          <div class="card interactive-card bg-black border border-dark" data-id="5" data-name="Capuccino Assassino" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_5">Capuccino Assassino</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Capuccino', 'Assassino', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->

        </div>

        <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">

          <!-- Card for Barber no.6 -->
          <div class="card interactive-card bg-black border border-dark" data-id="6" data-name="Bombombini Gusini" style="width: 18rem;">
            <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <div class="card-body">
              <h5 class="card-title d-flex justify-content-center align-items-center text-white" id="barber_6">Bombombini Gusini</h5>
            </div>
            <h6 class="d-flex justify-content-center align-items-center text-white">5.0</h6>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('Assets/dot.png', 'Bombombini', 'Gusini', '09617814164', '7 Years', 'Fades, Classic Cuts', 'Mon - Sat, 10:00 AM - 7:00 PM', '4 / 5', 'English, Tagalog')">View Details</a>
            </div>
          </div>
          <!--  -->

        </div>

        <div class="col-lg-12 col-12 col-md-12 col-sm-12 d-flex mt-5 justify-content-center">
          <a href="services.php" class="btn btn-outline-light w-50 mb-3 me-3">Back</a>
          <a href="date_time.php" class="btn btn-outline-light w-50 mb-3 me-3" onclick="saveSelectedBarber(event)">Continue</a>
        </div>

      </div>


      <br><br><br>

    </div>

    <!-- Barber description modal -->
    <div class="modal fade" id="descriptionModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-dark">
          
          <div class="modal-header bg-black text-white">
            <h5 class="modal-title" id="exampleModalCenterTitle">Barber's Description</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body bg-dark text-white">
            <img id="image" src="" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
            <hr>
            <p id="name"></p>
            <p id="contact"></p>
            <p id="experience"></p>
            <p id="specialties"></p>
            <p id="availabilty"></p>
            <p id="ratings"></p>
            <p id="languages"></p>
          </div>

          <div class="modal-footer bg-black">
            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!--  -->
  

    <style>
      .interactive-card:hover {
        cursor: pointer;
        transform: scale(1.10);
        transition: transform 0.5s ease, box-shadow 0.10s ease;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
      }
    </style>
    

    <script>

      // Store selected barber name in localStorage
    function saveSelectedBarber() {
      const selectedCard = document.querySelector(".interactive-card.border-white");
      if (!selectedCard) {
        alert("Please select a professional first.");
        event.preventDefault();  // This stops the navigation
        return false;
      }
      const barberName = selectedCard.getAttribute("data-name");
      localStorage.setItem("selectedBarber", barberName);
    }

      /* 
      //Get data from services.hmtl
      const dataService = JSON.parse(localStorage.getItem("haircutTypePrice"));
      const haircutName = document.getElementById("haircutName");
      const haircutPrice = document.getElementById("haircutPrice");
      haircutName.innerText = dataService.haircut;
      haircutPrice.innerText = dataService.price;
      */

      // Get all cards with class interactive-card
      const cards = document.querySelectorAll(".interactive-card");

      //Get barber name id placeholder in summary
      const barberName = document.getElementById("chosenBarber");
    
      cards.forEach(card => {
        card.addEventListener("click", function () {

          cards.forEach(e => e.classList.remove("border", "border-white"));
    
          // Change the border into white when clicked
          this.classList.add("border", "border-white");
    
          // Get selected card id
          const cardId = this.getAttribute("data-id");
          const selectedBarber = document.getElementById(`barber_${cardId}`);

          barberName.innerText = selectedBarber.innerText;

        });
      });

      //Open the barber's description
      function openDescriptionModal(image, name, lastName, contact, experience, specialties, availabilty, ratings, languages){
        event.preventDefault();

        document.getElementById("image").src = image;
        document.getElementById("name").innerText = "Name: " + name + " " + lastName;
        document.getElementById("contact").innerText = "Contact: " + contact;

        if (experience === "") experience = "N/A";
        if (specialties === "") specialties = "N/A";
        if (availabilty === "") availabilty = "N/A";
        if (ratings === "") ratings = "N/A";
        if (languages === "") languages = "N/A";

        document.getElementById("experience").innerText = "Experience: " + experience;
        document.getElementById("specialties").innerText = "Specialties: " + specialties;
        document.getElementById("availabilty").innerText = "Availability: " + availabilty;
        document.getElementById("ratings").innerText = "Ratings: " + ratings;
        document.getElementById("languages").innerText = "Languages: " + languages;

        let descriptionModal = new bootstrap.Modal(document.getElementById("descriptionModal"));
        descriptionModal.show();
      }
    </script>

</body>
</html>