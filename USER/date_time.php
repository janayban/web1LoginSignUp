<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Booking Calendar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
  <style>
    body {
      background-color: #292929;
      color: white;
      height: 100vh;
    }

    .date-cell:hover,
    .time-slot:hover {
      background-color: rgb(31, 29, 27);
      cursor: pointer;
    }

    .date-cell.selected,
    .time-slot.selected {
      background-color: white !important;
      color: black !important;
    }

    s {
      color: rgb(116, 116, 116);
    }
  </style>
</head>
<body class="bg-black text-white">
  <div class="container mt-4">

    <!-- Heading -->
    <div class="row align-items-center mb-4">
      <div class="col-auto">
        <img src="Assets/arrow.png" width="50" height="30" alt="arrow" />
      </div>
      <div class="col">
        You are booking as <strong>Name</strong>
      </div>
    </div>

    <!-- Breadcrumb -->
    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="services.php" class="text-decoration-none text-white">Services</a></li>
        <li class="breadcrumb-item"><a href="professional.php" class="text-decoration-none text-white">Professional</a></li>
        <li class="fw-bold breadcrumb-item active text-white" aria-current="page">Date and Time</li>
        <li class="breadcrumb-item"><a href="confirmation.php" class="text-decoration-none text-white">Confirmation</a></li>
      </ol>
    </nav>

    <!-- Title -->
    <h1 class="mt-4"><strong>Select Date and Time</strong></h1>

    <!-- Calendar -->
    <div class="container-calendar my-4">
      <div class="row">
        <table class="table-condensed table-bordered table-striped w-100 text-center">
          <thead>
            <tr>
              <th colspan="7">
                <div class="d-flex justify-content-between align-items-center">
                  <strong id="monthYear">March 2025</strong>
                  <div>
                    <button class="btn btn-outline-light btn-sm me-2" id="prevMonth">&lt;</button>
                    <button class="btn btn-outline-light btn-sm" id="nextMonth">&gt;</button>
                  </div>
                </div>
              </th>
            </tr>
            <tr>
              <th>Su</th><th>M</th><th>T</th><th>W</th><th>T</th><th>F</th><th>S</th>
            </tr>
          </thead>
          <tbody id="calendarDates"></tbody>
        </table>
      </div>
    </div>

    <!-- Time Slots -->
    <div class="row g-2 mb-4" id="timeSlots">
      <!-- Dynamically populated -->
    </div>

    <!-- Navigation Buttons -->
    <div class="row">
      <div class="col-12 d-flex justify-content-center mt-5">
        <a href="professional.php" class="btn btn-outline-light w-50 mb-3 me-3">Back</a>
        <a href="confirmation.php" class="btn btn-outline-light w-50 mb-3" id="continueBtn">Continue</a>
      </div>
    </div>
  </div>

  <script>
    const calendarDates = document.getElementById("calendarDates");
    const monthYear = document.getElementById("monthYear");
    const timeSlots = document.getElementById("timeSlots");

    const monthNames = [
      "January", "February", "March", "April", "May", "June",
      "July", "August", "September", "October", "November", "December"
    ];

    const slotTimes = [
      "10:00AM", "10:30AM", "11:00AM", "11:30AM",
      "1:00PM", "1:30PM", "2:00PM", "2:30PM",
      "3:00PM", "3:30PM", "4:00PM", "4:30PM"
    ];

    let date = new Date();
    let month = date.getMonth();
    let year = date.getFullYear();
    let selectedDate = null;
    let selectedTime = null;

    function renderCalendar() {
      const firstDay = new Date(year, month, 1).getDay();
      const numDays = new Date(year, month + 1, 0).getDate();
      const prevMonthLastDay = new Date(year, month, 0).getDate();

      let html = "<tr>";
      for (let i = 0; i < firstDay; i++) {
        html += `<td class="text-muted"><s>${prevMonthLastDay - firstDay + i + 1}</s></td>`;
      }

      for (let i = 1; i <= numDays; i++) {
        html += `<td class="date-cell" data-date="${i}">${i}</td>`;
        if ((firstDay + i) % 7 === 0) html += "</tr><tr>";
      }

      const remaining = (firstDay + numDays) % 7;
      if (remaining !== 0) {
        for (let i = 1; i <= (7 - remaining); i++) {
          html += `<td class="text-muted"><s>${i}</s></td>`;
        }
      }

      calendarDates.innerHTML = html;
      monthYear.textContent = `${monthNames[month]} ${year}`;

      document.querySelectorAll(".date-cell").forEach(cell => {
        cell.addEventListener("click", (e) => {
          document.querySelectorAll(".date-cell").forEach(c => c.classList.remove("selected"));
          e.target.classList.add("selected");
          const pad = n => n.toString().padStart(2, '0');
          selectedDate = `${year}-${pad(month + 1)}-${pad(e.target.dataset.date)}`;

        });
      });
    }

    function renderTimeSlots() {
      let html = "";
      slotTimes.forEach(time => {
        html += `
          <div class="col-6 col-md-3">
            <button type="button" class="btn btn-outline-light w-100 time-slot">${time}</button>
          </div>
        `;
      });
      timeSlots.innerHTML = html;

      document.querySelectorAll(".time-slot").forEach(button => {
        button.addEventListener("click", (e) => {
          document.querySelectorAll(".time-slot").forEach(b => b.classList.remove("selected"));
          e.target.classList.add("selected");
          selectedTime = e.target.textContent;
        });
      });
    }

    // Month navigation
    document.getElementById("prevMonth").addEventListener("click", () => {
      if (month === 0) {
        month = 11;
        year--;
      } else {
        month--;
      }
      renderCalendar();
    });

    document.getElementById("nextMonth").addEventListener("click", () => {
      if (month === 11) {
        month = 0;
        year++;
      } else {
        month++;
      }
      renderCalendar();
    });

    renderCalendar();
    renderTimeSlots();

    // Store date/time in localStorage when "Continue" is clicked
    document.getElementById("continueBtn").addEventListener("click", (e) => {
      if (!selectedDate || !selectedTime) {
        e.preventDefault();
        alert("Please select both a date and time.");
        return;
      }

      localStorage.setItem("selectedDate", selectedDate);
      localStorage.setItem("selectedTime", selectedTime);
    });

  </script>
</body>
</html>
