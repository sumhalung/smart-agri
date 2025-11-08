<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>SmartAgri | Registration Form</title>
  <style>
    body {
      margin: 0;
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
      min-height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      color: #2f4f4f;
    }

    .container {
      width: 400px;
      background: rgba(255, 255, 255, 0.15);
      backdrop-filter: blur(10px);
      border-radius: 15px;
      box-shadow: 0 8px 30px rgba(0, 0, 0, 0.2);
      padding: 30px 25px;
      color: white;
      animation: fadeIn 0.8s ease-in-out;
      position: relative;
    }

    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(-20px); }
      to { opacity: 1; transform: translateY(0); }
    }

    .brand {
      position: absolute;
      top: -40px;
      left: 50%;
      transform: translateX(-50%);
      background: linear-gradient(90deg, #00c851, #007bff);
      padding: 10px 20px;
      border-radius: 30px;
      color: #fff;
      font-weight: 700;
      font-size: 18px;
      letter-spacing: 1px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.3);
    }

    h2 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 26px;
      letter-spacing: 1px;
    }

    label {
      display: block;
      margin-bottom: 5px;
      font-weight: 600;
      font-size: 14px;
    }

    input[type="text"],
    input[type="email"],
    input[type="password"],
    input[type="tel"] {
      width: 100%;
      padding: 10px 12px;
      margin-bottom: 18px;
      border: none;
      border-radius: 8px;
      background: rgba(255, 255, 255, 0.9);
      font-size: 14px;
      outline: none;
      transition: all 0.3s ease;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    input[type="password"]:focus,
    input[type="tel"]:focus {
      box-shadow: 0 0 10px rgba(37, 117, 252, 0.7);
      background: #fff;
      transform: scale(1.02);
    }

    input[type="submit"] {
      width: 100%;
      padding: 12px;
      background: linear-gradient(90deg, #00c851, #007bff);
      color: white;
      border: none;
      border-radius: 8px;
      font-size: 16px;
      font-weight: 600;
      cursor: pointer;
      letter-spacing: 0.5px;
      transition: all 0.3s ease;
    }

    input[type="submit"]:hover {
      background: linear-gradient(90deg, #007bff, #00c851);
      transform: translateY(-2px);
      box-shadow: 0 4px 10px rgba(0, 123, 255, 0.4);
    }

    .error {
      color: #ffdddd;
      text-align: center;
      font-size: 14px;
      background: rgba(255, 0, 0, 0.2);
      padding: 8px;
      border-radius: 6px;
      margin-bottom: 10px;
      display: none;
    }

    .show-error {
      display: block;
      animation: shake 0.3s ease-in-out;
    }

    @keyframes shake {
      0%, 100% { transform: translateX(0); }
      20%, 60% { transform: translateX(-6px); }
      40%, 80% { transform: translateX(6px); }
    }
  </style>
</head>
<body>
  <div class="container">
    <div class="brand">🌿 SmartAgri</div>
    <h2>Registration Form</h2>
    <form id="registrationForm" method="POST" action="first.php">
      <label for="name">Full Name:</label>
      <input type="text" id="name" name="name" required autocomplete="name"/>

      <label for="email">Email ID:</label>
      <input type="email" id="email" name="email" required autocomplete="email"/>

      <label for="phone">Phone Number:</label>
      <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required placeholder="10-digit number"/>

      <label for="password">Password:</label>
      <input type="password" id="password" name="password" required autocomplete="new-password"/>

      <label for="confirm_password">Confirm Password:</label>
      <input type="password" id="confirm_password" name="confirm_password" required/>

      <div id="error" class="error"></div>

      <input type="submit" value="Register"/>
    </form>
  </div>

  <script>
    const form = document.getElementById("registrationForm");
    const errorDiv = document.getElementById("error");

    form.addEventListener("submit", function (e) {
      e.preventDefault();

      const password = document.getElementById("password").value;
      const confirmPassword = document.getElementById("confirm_password").value;

      if (password !== confirmPassword) {
        errorDiv.textContent = "Passwords do not match ❌";
        errorDiv.classList.add("show-error");
      } else if (password.length < 8) {
        errorDiv.textContent = "Password must be at least 8 characters long ⚠️";
        errorDiv.classList.add("show-error");
      } else {
        errorDiv.textContent = "";
        errorDiv.classList.remove("show-error");
        alert("🎉 Registration successful!");
        window.location.href = "first.php";
      }
    });
  </script>
</body>
</html>
