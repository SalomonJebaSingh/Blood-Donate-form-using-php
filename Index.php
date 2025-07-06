<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Blood Donation Form</title>
<style>
        body {
            background-image: url('https://nhsbtdbe.blob.core.windows.net/umbraco-assets-corp/25124/blood-g4e28dcb97_1920.jpg');
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            color: white;
            font-family: Arial, sans-serif;
        }

        form {
            background-color: rgba(0, 0, 0, 0.7);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.5);
            text-align: center;
        }

        input, select {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }

        button {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
            width: 100%;
            margin-top: 10px;
        }

button:hover {
            background-color: #d32f2f;
        }
</style>
</head>
<body>
<form action="donate.php" method="post">
<h1>Blood Donation Form</h1>

<label for="name">Name:</label>
<input type="text" id="name" name="name" required>

<label for="email">Email:</label>
<input type="email" id="email" name="email" required>

<label for="phone">Phone:</label>
<input type="text" id="phone" name="phone" required>

<label for="blood_type">Blood Type:</label>
<select id="blood_type" name="blood_type" required>
<option value="A+">A+</option>
<option value="A-">A-</option>
<option value="B+">B+</option>
<option value="B-">B-</option>
<option value="O+">O+</option>
<option value="O-">O-</option>
<option value="AB+">AB+</option>
<option value="AB-">AB-</option>
</select>

<button type="submit">Donate</button>

<!-- View Donors Button -->
<button type="button" onclick="window.location.href='view_donors.php'">View Donors</button>
</form>
<form action="search.php" method="post">
<h2>Search for Blood Donors</h2>
<button type="submit">Search</button>
</form>
</body>
</html>
