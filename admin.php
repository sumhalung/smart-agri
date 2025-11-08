<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Admin Panel – Smart Agri</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      background: #f7fafc;
    }
    header {
      background-color: #2f855a;
      color: white;
      padding: 20px;
      text-align: center;
    }
    .container {
      padding: 30px;
      max-width: 1000px;
      margin: auto;
    }
    h2 {
      color: #2f855a;
    }
    table {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      background-color: white;
      box-shadow: 0 2px 6px rgba(0,0,0,0.1);
    }
    th, td {
      padding: 12px;
      border-bottom: 1px solid #ddd;
      text-align: left;
    }
    th {
      background-color: #2f855a;
      color: white;
    }
    tr:hover {
      background-color: #f1f1f1;
    }
  </style>
</head>
<body>

<header>
  <h1>🌿 Admin Panel</h1>
  <p>View Registered Farmers' Data</p>
</header>

<div class="container">
  <h2>🗂️ Registration List</h2>
  <table>
    <thead>
      <tr>
        <th>Name</th>
        <th>Phone</th>
        <th>Crop</th>
        <th>Area (sq.ft)</th>
      </tr>
    </thead>
    <tbody id="dataBody">
      <!-- Data will be inserted here -->
    </tbody>
  </table>
</div>

<script>
  // Dummy farmer registration data (replace with fetch from backend in real app)
  const registeredFarmers = [
    { name: "Ramesh", phone: "9812345678", crop: "Rice", area: 2000 },
    { name: "Sita", phone: "9841123456", crop: "Wheat", area: 1500 },
    { name: "Hari", phone: "9808123412", crop: "Maize", area: 1800 }
  ];

  // Insert data into table
  const tbody = document.getElementById("dataBody");

  registeredFarmers.forEach(farmer => {
    const row = document.createElement("tr");
    row.innerHTML = `
      <td>${farmer.name}</td>
      <td>${farmer.phone}</td>
      <td>${farmer.crop}</td>
      <td>${farmer.area}</td>
    `;
    tbody.appendChild(row);
  });
</script>

</body>
</html>
