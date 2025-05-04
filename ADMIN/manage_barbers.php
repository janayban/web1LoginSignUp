<?php
include('server.php');

// SQL to select barbers
$sql = "SELECT * FROM barbers";
$result = $conn->query($sql);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Barbers</title>

    <!-- External CSS -->
    <link rel="stylesheet" href="styles.css">
    <!--  -->

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
      <div class="row">
        <!-- Offcanvas dark navbar -->
          <div class="col">
            <nav class="navbar navbar-dark bg-black align-items-end d-flex flex-column">
              <div class="container-fluid">
                <a class="navbar-brand" href="#"><h1>Manage Accounts Barbers</h1></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasDarkNavbar" aria-controls="offcanvasDarkNavbar" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end text-bg-dark" tabindex="-1" id="offcanvasDarkNavbar" aria-labelledby="offcanvasDarkNavbarLabel">
                  <div class="offcanvas-header align-items-center justify-content-between">
                    <img src="rect.png" alt="logo" width="80" height="80">
                    <div class="d-flex align-items-end flex-column mb-3" style="height: 60px;">
                      <button type="button" class="btn-close btn-close-white p-2" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                  </div>
                  <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                      <li class="nav-item">
                        <hr>
                        <a class="nav-link" href="today.html">Dash board</a>
                        <hr>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link" href="#">Manage Appointments</a>
                        <hr>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#"><strong>Manage Accounts</strong></a>
                        <hr>
                      </li>
                      <div style="height: 55vh;" class="d-flex justify-content-center align-items-end">
                        <li class="nav-item">
                          <button type="button" class="btn btn-outline-light text-white">Log out</button>
                        </li>
                      </div>
                    </ul>
                  </div>
                </div>
              </div>
            </nav>
          </div>
        <!--  -->
        <hr>
      </div>


      <br>
      <div class="row">
        <div class="col">
          <!-- Breadcrumbs navigation -->
          <nav style="--bs-breadcrumb-divider: '|';" aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item "><a href="manage_users.php" class="text-decoration-none text-white">Users</a></li>
              <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Barbers</li>
            </ol>
          </nav>
          <!--  -->
        </div>
        <div class="col">
          <!-- Search Bar -->
          <nav class="navbar navbar-light bg-black align-items-end d-flex flex-column">
            <form id="searchBarForm" class="form-inline d-flex">
              <input id="searchDataInput" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
              <button class="btn btn-outline-secondary my-2 my-sm-0" type="submit">Search</button>
            </form>
          </nav>
          <!--  -->
        </div>

      </div>

      <br><br>

      <div class="row" id="row1">
      <?php
      // Check if there are barbers
      if ($result->num_rows > 0) {
        // Output data for each barber
        while($row = $result->fetch_assoc()) {
          echo '
          <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center mb-5">
            <div class="card bg-black border border-dark" style="width: 18rem;">
              <img src="Assets/dot.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber\'s face">
              <hr>
              <div class="card-body">
                <h6 class="card-title d-flex justify-content-center align-items-center text-white">' . $row['name'] . '</h6>
              </div>
              <p class="d-flex justify-content-center align-items-center text-white">' . $row['contact'] . '</p>
              <div class="card-body">
                <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal(\'' . $row['barber_id'] . '\', \'' . $row['name'] . '\', \'' . $row['contact'] . '\', \'' . $row['experience'] . '\', \'' . $row['specialty'] . '\', \'' . $row['availability'] . '\', \'' . $row['rating'] . '\', \'' . $row['language'] . '\')">Description</a>
                <br>
                <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="confirmDelete(event)"><img src="Assets/delete.png" alt="delete" height="40px" width="40px"></a>
              </div>
            </div>
          </div>';
        }
      } else {
        echo "0 results";
      }
      $conn->close();
      ?>
    </div>

    <br><br>

     <!-- Add barber modal -->
     <div class="modal fade" id="addBarberModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border border-dark">
          
          <div class="modal-header bg-black text-white">
            <h5 class="modal-title" id="exampleModalCenterTitle">Add New Barber</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body bg-dark text-white">
            <!--  form -->
            <form id="newBarberForm" onsubmit="validateNewBarberForm(event)">

              <div class="text-white">
                <!-- Put profile image -->
                <h4>Barber's Profile Picture</h4>
                <h6>(Picture must be 1 by 1)</h6>
                <br>
                <input type="file" id="imageInput" accept="image/*" onchange="previewImage(event)">
                <br>
                <img id="uploadedImage" src="" alt="Uploaded Image" style="max-width: 200px; margin-top: 10px; border-radius: 50%; object-fit: cover; width: 150px; height: 150px;">
                <br><hr><br>
              </div>
  
              <div class="mb-3">
                  <label for="firstNameForm" class="form-label">Name</label>
                  <input type="text" id="firstNameForm" class="form-control" placeholder="Enter Name">
              </div>

              <div class="mb-3">
                  <label for="lastNameForm" class="form-label">Last Name</label>
                  <input type="text" id="lastNameForm" class="form-control" placeholder="Enter Last Name">
              </div>

              <div class="mb-3">
                  <label for="contactForm" class="form-label">Contact</label>
                  <input type="text" id="contactForm" class="form-control" placeholder="Enter Contact">
              </div>
  
              <div class="mb-3">
                  <label for="experienceForm" class="form-label">Experience</label>
                  <input type="text" id="experienceForm" class="form-control" placeholder="Enter Experience">
              </div>
                
              <div class="mb-3">
                  <label for="specialtiesForm" class="form-label">Specialties</label>
                  <input type="text" id="specialtiesForm" class="form-control" placeholder="Enter Specialties">
              </div>

              <div class="mb-3">
                <label for="availabilityForm" class="form-label">Availability</label>
                <input type="text" id="availabilityForm" class="form-control" placeholder="Enter Availability">
              </div>

              <div class="mb-3">
                <label for="ratingsForm" class="form-label">Ratings</label>
                <input type="text" id="ratingsForm" class="form-control" placeholder="Enter Ratings (Default N/A)">
              </div>

              <div class="mb-3">
                <label for="languagesForm" class="form-label">Languages</label>
                <input type="text" id="languagesForm" class="form-control" placeholder="Enter Languages">
              </div>
  
              <br>
  
          </div>

          <div class="modal-footer bg-black">
            <button type="button" class="btn btn-dark" data-bs-dismiss="modal" onclick="clearForm()">Close</button>
            <button type="submit" class="btn btn-dark" id="save">Save changes</button>
          </div>

        </div>
      </div>
    </div>

    <br><br>

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
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
    <!--  -->

    <br><br>

    <div class="toast-container position-fixed bottom-0 end-0 p-3">
      <div id="liveToast" class="toast bg-black text-white border border-dark" role="alert" aria-live="assertive" aria-atomic="true">
        <div class="toast-header">
          <strong class="me-auto">Error</strong>
          <small>Now</small>
          <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
        </div>
        <div class="toast-body">
          Toast message will appear here.
        </div>
      </div>
    </div>

    <!-- Delete confirmation modal -->
    <div class="modal fade" id="deleteConfirmationModal" tabindex="-1" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content border border-dark">
          
          <div class="modal-header bg-black text-white">  
            <h3 class="modal-title text-danger" id="exampleModalCenterTitle">Warning!</h3>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>

          <div class="modal-body bg-dark text-white">
            
          <h5> Are you sure you want to delete this account?</h5>
      
          </div>

          <div class="modal-footer bg-black">
            <button type="button" class="btn btn-secondary text-black" id="deleteButton" onclick="deleteCard(event)">Confirm</button>
            <button type="button" class="btn btn-secondary text-black" data-bs-dismiss="modal">Close</button>
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

      //Delete confirmation modal
      let cardToDelete = null;
      function confirmDelete(event){
        event.preventDefault();

        cardToDelete = event.target.closest(".card");

        let deleteConfirmationModal = new bootstrap.Modal(document.getElementById("deleteConfirmationModal"));
        deleteConfirmationModal.show();
      }

      //Remove a barber
      function deleteCard(event){
        event.preventDefault();

        if(!cardToDelete) return;

        const col = cardToDelete.closest(".col-4");

        if(col){
          col.remove();  
        }

        const remainingUsers = document.querySelectorAll("#row1 .col-4");

        if (remainingUsers.length === 1) {
          const row1 = document.getElementById("row1");
          row1.innerHTML = `
            <div class="col-lg-12 col-md-12 col-sm-12 col-12 d-flex justify-content-center align-items-center text-white mb-5">
              <h1>No Barber is employed yet</h1>
            </div>
            <div class="col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center">
              <div class="card interactive-card bg-black border border-dark" style="width: 18rem;" data-bs-toggle="modal" data-bs-target="#addBarberModal">
                <img src="Assets/plus.png" class="card-img-top d-flex justify-content-center align-items-center" alt="Barber's face">
                <h4 class="card-title d-flex justify-content-center align-items-center text-white">Add Barber</h4>
                <div class="card-body">
                  <hr><br><br>
                </div>
                <br><br><br><br><br>
              </div>
            </div>
          `;
        }

        //close the modal after deleting the account
        const modalToDelete = document.getElementById("deleteConfirmationModal");
        const modalClose = bootstrap.Modal.getInstance(modalToDelete);
        if (modalClose) {
          modalClose.hide();
        }

        cardToDelete = null;

      }

      //Search bar function
      const searchBarForm = document.getElementById("searchBarForm");
      const searchDataInput = document.getElementById("searchDataInput");
      
      //search a barber's name
      searchBarForm.addEventListener("submit", function(event){
        event.preventDefault(

        );
        searchCard();
      });

      //remove white border on x
      searchDataInput.addEventListener("input", function(){
        event.preventDefault();
        if(searchDataInput.value.trim() === "") resetSearch();
      })

      function searchCard(){
        const cardsToSearch = document.querySelectorAll(".card");
        const querySearch = searchDataInput.value.trim().toLowerCase();

        let matchingCard = null;

        cardsToSearch.forEach(card =>{
          const titleElement = card.querySelector("h6.card-title");

          if (titleElement) {
            const nameCard = titleElement.textContent.toLowerCase();

            if(nameCard.includes(querySearch)){
              card.parentElement.style.display = "flex"; 
              card.classList.add("border-white"); 
              card.classList.remove("border-dark");

              if(!matchingCard) matchingCard = card.parentElement;

            }else{
              card.parentElement.style.display = "none"; // Hide card
              card.classList.remove("border-white"); // Remove white border if not matched
              card.classList.add("border-dark");
            }
          }
        });

        if (matchingCard) {
          setTimeout(() => {
            matchingCard.scrollIntoView({ behavior: "smooth", block: "center"});
          }, 100);
        }
      };

      function resetSearch(){
        const cardsToSearch = document.querySelectorAll(".card");

        cardsToSearch.forEach(card =>{

          card.parentElement.style.display = "flex";
          card.classList.remove("border-white");
          card.classList.add("border-dark");
        })
      }


      //Open the barber's description
      function openDescriptionModal(image, name, contact, experience, specialties, availabilty, ratings, languages){
        event.preventDefault();

        document.getElementById("image").src = image;
        document.getElementById("name").innerText = "Name: " + name;
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

      //Add a barber
      const addBarberCard = document.querySelector(".interactive-card");

      function validateNewBarberForm(event) {
        event.preventDefault(); 
        
        const firstNameForm = document.getElementById("firstNameForm").value.trim();
        const lastNameForm = document.getElementById("lastNameForm").value.trim();
        const contactForm = document.getElementById("contactForm").value.trim();
        const experienceForm = document.getElementById("experienceForm").value.trim();
        const specialtiesForm = document.getElementById("specialtiesForm").value.trim();
        const availabiltyForm = document.getElementById("availabilityForm").value.trim();
        const ratingsForm = document.getElementById("ratingsForm").value.trim();
        const languagesForm = document.getElementById("languagesForm").value.trim();
        const barberImage = imageUploadedData;

        const toastElement = document.getElementById('liveToast');
        const toastBody = toastElement.querySelector('.toast-body'); 
        const toast = new bootstrap.Toast(toastElement);

        if(barberImage === ""){
          toastBody.innerText = "Put the picture of the barber first."; 
          toast.show(); 
          return; 
        }

        if (firstNameForm === "") {
          toastBody.innerText = "First name must not be empty."; 
          toast.show(); 
          return; 
        }

        if (lastNameForm === "") {
          toastBody.innerText = "Last name must not be empty."; 
          toast.show(); 
          return; 
        }

        if (contactForm === "") {
          toastBody.innerText = "Contact must not be empty."; 
          toast.show(); 
          return; 
        }

        function setNA(value) {
          return value === "" ? "N/A" : value;
        }

        const rowContainer = document.getElementById('row1');

        const newCard = document.createElement('div');
        newCard.className = "col-lg-4 col-sm-4 col-md-4 col-4 d-flex justify-content-center align-items-center mb-5";
        newCard.innerHTML = `
          <div class="card bg-black border border-dark" style="width: 18rem; height: 34rem; overflow: hidden;">
            <img src="${image}" class="card-img-top mx-auto d-block mt-3" alt="Barber's face" style="border-radius: 50%; width: 270px; height: 270px; object-fit: cover;">
            <hr>
            <div class="card-body">
              <h6 class="card-title d-flex justify-content-center align-items-center text-white text-center">${name}</h6>
            </div>
            <p class="d-flex justify-content-center align-items-center text-white text-center">${contactForm}</p>
            <div class="card-body">
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="openDescriptionModal('${barberImage}', '${firstNameForm}', '${lastNameForm}', '${contactForm}', '${experienceForm}', '${specialtiesForm}', '${availabiltyForm}', '${ratingsForm}', '${languagesForm}')">Description</a>                
              <br>
              <a href="#" class="card-link d-flex justify-content-center align-items-center text-white" onclick="confirmDelete(event)">
                <img src="Assets/delete.png" alt="delete" height="40px" width="40px">
              </a>              
            </div>
          </div>
          `;

        const updatedAddBarberCard = document.querySelector(".interactive-card");
        
        if (updatedAddBarberCard) rowContainer.insertBefore(newCard, updatedAddBarberCard.parentNode);
        else rowContainer.appendChild(newCard);
        
        clearForm();
        const modal = bootstrap.Modal.getInstance(document.getElementById('addBarberModal'));
        modal.hide();

    }

    //Put an image
    let imageUploadedData = "";

    function previewImage(event) {
      let file = event.target.files[0];
      let reader = new FileReader();
      
      reader.onload = function(e) {
        document.getElementById('uploadedImage').src = e.target.result;
        imageUploadedData = e.target.result;
      }
      
      if (file) {
        reader.readAsDataURL(file);
      }
    }

    //Clear inputs
    function clearForm(){
      document.querySelector('#newBarberForm').reset();
      document.getElementById('uploadedImage').src = "";
    }

    const newBarberModal = document.getElementById('addBarberModal');

    newBarberModal.addEventListener('hidden.bs.modal', function(){
      clearForm();
    })

    </script>
</body>
</html>