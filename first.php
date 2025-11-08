<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Smart Agriculture System</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      font-family: Arial, sans-serif;
      background: url('image.jpg') no-repeat center center fixed;
      background-size: cover;
      color: #2f4f4f;
    }

    header, footer {
      background-color: rgba(56, 161, 105, 0.85);
      color: white;
      text-align: center;
      padding: 15px;
    }

    .container {
      display: flex;
      flex-direction: row;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      padding: 20px;
    }

    .card {
      width: 300px;
      background: rgba(255, 255, 255, 0.9);
      border-radius: 10px;
      padding: 20px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.2);
      flex-shrink: 0;
    }

    h2 {
      margin-top: 0;
      color: #2f855a;
    }

    .btn {
      background-color: #2f855a;
      color: white;
      border: none;
      padding: 10px;
      cursor: pointer;
      border-radius: 5px;
      margin-top: 10px;
    }

    input, select {
      width: 100%;
      padding: 8px;
      margin-top: 10px;
      border-radius: 5px;
      border: 1px solid #ccc;
    }

    #soilResult, #registerResult, #estimateResult {
      margin-top: 10px;
      font-weight: bold;
    }
  </style>
</head>
<body>

<header>
  <h1>🌾 Smart Agriculture Support System</h1>
  <p>One-Row (Horizontal) Layout</p>
</header>

<div class="container">

  <!-- Weather Info -->
  <div class="card">
    <h2>🌤️ Weather Info</h2>
    <input type="text" id="cityInput" placeholder="Enter city (e.g. Kathmandu)" />
    <button class="btn" onclick="fetchWeather()">Search</button>
    <p><strong>Location:</strong> <span id="location">--</span></p>
    <p><strong>Temp:</strong> <span id="temp">--</span></p>
    <p><strong>Humidity:</strong> <span id="humidity">--</span></p>
    <p><strong>Wind:</strong> <span id="wind">--</span></p>
  </div>

  <!-- Farming Tips -->
  <div class="card">
    <h2>🌱 Farming Tips</h2>
    <ul id="tipsList">
      <li>Use organic compost.</li>
      <li>Drip irrigation saves water.</li>
      <li>Plant crops seasonally.</li>
      <li>Check weather updates.</li>
    </ul>
    <button class="btn" onclick="toggleTips()">Show/Hide</button>
  </div>

  <!-- Crop Selection -->
  <div class="card">
    <h2>🌾 Crop Submission</h2>
    <select id="cropSelect">
      <option value="">-- Select Crop --</option>
      <option value="wheat">Wheat</option>
      <option value="rice">Rice</option>
      <option value="maize">Maize</option>
      <option value="potato">Potato</option>
      <option value="mustard">Mustard</option>
    </select>
    <button class="btn" onclick="submitCrop()">Submit</button>
    <div id="soilResult"></div>
  </div>

  <!-- Soil Test -->
  <div class="card">
    <h2>🧪 Soil Test Registration</h2>
    <input type="text" id="name" placeholder="Your Name">
    <input type="tel" id="phone" placeholder="Phone Number">
    <button class="btn" onclick="registerSoilTest()">Register</button>
    <div id="registerResult"></div>
  </div>

  <!-- Seed & Fertilizer Estimation -->
  <div class="card">
    <h2>🌾 Seed & Fertilizer Estimator</h2>
    <select id="cropEstimate">
      <option value="">-- Select Crop --</option>
      <option value="wheat">Wheat</option>
      <option value="rice">Rice</option>
      <option value="maize">Maize</option>
      <option value="potato">Potato</option>
      <option value="mustard">Mustard</option>
    </select>
    <input type="number" id="fieldArea" placeholder="Enter field area in ropani" min="1" />
    <button class="btn" onclick="estimateInputs()">Estimate</button>
    <div id="estimateResult"></div>
  </div>

</div>

<footer>
  &copy; 2025 Smart Agri Nepal | SL IT COMPANY
</footer>

<script>
  function toggleTips() {
    const tips = document.getElementById("tipsList");
    tips.style.display = tips.style.display === "none" ? "block" : "none";
  }

  function submitCrop() {
    const crop = document.getElementById("cropSelect").value;
    const result = document.getElementById("soilResult");

    const soilData = {
      wheat: "Loamy soil, moderate water.",
      rice: "Clayey soil, water retaining.",
      maize: "Sandy loam, well-drained.",
      potato: "Rich sandy loam.",
      mustard: "Loamy to sandy soil."
    };

    if (!crop) {
      result.innerHTML = "<span style='color:red;'>Please select a crop.</span>";
    } else {
      result.innerHTML = `Soil type for <strong>${crop}</strong>: ${soilData[crop]}`;
    }
  }

  function registerSoilTest() {
    const name = document.getElementById("name").value.trim();
    const phone = document.getElementById("phone").value.trim();
    const result = document.getElementById("registerResult");

    const phonePattern = /^[0-9]{7,15}$/;

    if (!name || !phone) {
      result.innerHTML = "<span style='color:red;'>Enter name and phone.</span>";
    } else if (!phonePattern.test(phone)) {
      result.innerHTML = "<span style='color:red;'>Invalid phone format.</span>";
    } else {
      result.innerHTML = `<span style='color:green;'>Registered: ${name}</span>`;
    }
  }

  function estimateInputs() {
    const crop = document.getElementById("cropEstimate").value;
    const area = parseFloat(document.getElementById("fieldArea").value);
    const result = document.getElementById("estimateResult");

    if (!crop || isNaN(area) || area <= 0) {
      result.innerHTML = "<span style='color:red;'>Please select a crop and enter a valid area.</span>";
      return;
    }

    const estimates = {
      wheat:  { seed: 40, fertilizer: 50 },    // kg/ropani
      rice:   { seed: 30, fertilizer: 60 },
      maize:  { seed: 25, fertilizer: 45 },
      potato: { seed: 100, fertilizer: 80 },
      mustard:{ seed: 5, fertilizer: 25 }
    };

    const seedNeeded = area * estimates[crop].seed;
    const fertNeeded = area * estimates[crop].fertilizer;

    result.innerHTML = `
      For <strong>${area} ropani</strong> of <strong>${crop}</strong>:<br>
      🌱 Seed required: <strong>${seedNeeded} kg</strong><br>
      🧪 Fertilizer required: <strong>${fertNeeded} kg</strong>
    `;
  }

  async function fetchWeather() {
    const apiKey = "e15b01d95d5d02eb33f313867c0479eb";
    const city = document.getElementById("cityInput").value.trim() || "Kathmandu";
    const url = `https://api.openweathermap.org/data/2.5/weather?q=${city}&appid=${apiKey}&units=metric`;

    try {
      const res = await fetch(url);
      const data = await res.json();

      if (data.cod === 200) {
        document.getElementById("location").textContent = data.name;
        document.getElementById("temp").textContent = data.main.temp + " °C";
        document.getElementById("humidity").textContent = data.main.humidity + " %";
        document.getElementById("wind").textContent = data.wind.speed + " km/h";
      } else {
        document.getElementById("location").textContent = "City not found";
      }
    } catch (err) {
      document.getElementById("location").textContent = "API Error";
    }
  }

  window.onload = fetchWeather;
</script>

</body>
</html>
