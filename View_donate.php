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

// Retrieve donor data
$sql = "SELECT name, email, phone, blood_type, donation_date FROM donors";
$result = $conn->query($sql);

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Donor List</title>
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

        table {
            width: 100%;
            max-width: 800px;
            border-collapse: collapse;
            margin: 20px 0;
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
</style>
</head>
<body>
<h1>Donor List</h1>
<?php
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
        echo "<p>No donors found.</p>";
    }
    // Close connection
    $conn->close();
    ?>
</body>
</html>
