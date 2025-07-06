<?php
$servername = "localhost";
$username = "root"; // Change to your DB username
$password = ""; // Change to your DB password
$dbname = "mysql";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}

// Initialize variable for blood type
$blood_type = isset($_POST['blood_type']) ? $_POST['blood_type'] : '';

// Prepare statement to search donors with the selected blood type if blood type is chosen
if (!empty($blood_type)) {
    $stmt = $conn->prepare("SELECT name, email, phone, blood_type, donation_date FROM donors WHERE blood_type = ?");
    $stmt->bind_param("s", $blood_type);
    $stmt->execute();
    $result = $stmt->get_result();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Search Blood Donors</title>
<style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
            background-color: #f4f4f4;
        }
        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            text-align: center;
            width: 100%;
            max-width: 400px;
        }
        select, button {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
        }
        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
        }
th, td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }
th {
            background-color: #f44336;
            color: white;
        }
        button {
            background-color: #f44336;
            color: white;
            cursor: pointer;
        }
button:hover {
            background-color: #d32f2f;
        }
</style>
</head>
<body>
<h2>Search for Blood Donors by Blood Type</h2>

<!-- Blood Type Selection Form -->
<form method="post" action="">
<label for="blood_type">Choose Blood Type:</label>
<select name="blood_type" id="blood_type" required>
<option value="">Select Blood Type</option>
<option value="A+" <?php if ($blood_type == "A+") echo "selected"; ?>>A+</option>
<option value="A-" <?php if ($blood_type == "A-") echo "selected"; ?>>A-</option>
<option value="B+" <?php if ($blood_type == "B+") echo "selected"; ?>>B+</option>
<option value="B-" <?php if ($blood_type == "B-") echo "selected"; ?>>B-</option>
<option value="O+" <?php if ($blood_type == "O+") echo "selected"; ?>>O+</option>
<option value="O-" <?php if ($blood_type == "O-") echo "selected"; ?>>O-</option>
<option value="AB+" <?php if ($blood_type == "AB+") echo "selected"; ?>>AB+</option>
<option value="AB-" <?php if ($blood_type == "AB-") echo "selected"; ?>>AB-</option>
</select>
<button type="submit">Search</button>
</form>

<?php
    // Display results if blood type is selected and there are matches
    if (!empty($blood_type)) {
        if ($result->num_rows> 0) {
            echo "<table>";
            echo "<tr><th>Name</th><th>Email</th><th>Phone</th><th>Blood Type</th><th>Donation Date</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
<td>" .htmlspecialchars($row["name"]) . "</td>
<td>" .htmlspecialchars($row["email"]) . "</td>
<td>" .htmlspecialchars($row["phone"]) . "</td>
<td>" .htmlspecialchars($row["blood_type"]) . "</td>
<td>" .htmlspecialchars($row["donation_date"]) . "</td>
</tr>";
            }
            echo "</table>";
        } else {
            echo "<p>No donors found for blood type " .htmlspecialchars($blood_type) .".</p>";
        }
        // Close the statement after fetching results
        $stmt->close();
    }

    // Close the database connection
    $conn->close();
    ?>
</body>
</html>
