<?php
// Database connection settings
$host = "localhost";  // Your MySQL server
$username = "root";   // Default XAMPP username
$password = "";       // Default XAMPP password (empty)
$dbname = "blood_donors"; // Your database name

// Create a connection
$conn = new mysqli($host, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Process form data after submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize and store form inputs
    $name = $conn->real_escape_string($_POST['name']);
    $nid = $conn->real_escape_string($_POST['nid']);
    $dob = $conn->real_escape_string($_POST['dob']);
    $email = $conn->real_escape_string($_POST['email']);
    $gender = $conn->real_escape_string($_POST['gender']);
    $contact_number = $conn->real_escape_string($_POST['contact_number']);
    $address = $conn->real_escape_string($_POST['address']);
    $blood_type = $conn->real_escape_string($_POST['blood_type']);
    $height = (int) $_POST['height'];
    $weight = (int) $_POST['weight'];
    $donated_blood_before = $conn->real_escape_string($_POST['donated_blood_before']);
    $allergy_details = $conn->real_escape_string($_POST['allergy_details']);
    $serious_disease_history = $conn->real_escape_string($_POST['serious_disease_history']);
    $anemia = $conn->real_escape_string($_POST['anemia']);
    $cardiac_patient = $conn->real_escape_string($_POST['cardiac_patient']);
    $under_medication = $conn->real_escape_string($_POST['under_medication']);
    $password = trim($_POST['password'], PASSWORD_DEFAULT); // Secure password storage
    $confirm_password = trim($_POST['confirm_password'], PASSWORD_DEFAULT);


    // Check if the NID and DOB already exist in the database
    $check_sql = "SELECT * FROM donors WHERE nid='$nid' AND dob='$dob'";
    $result = $conn->query($check_sql);

    

    

    if ($result->num_rows > 0) {
        // If a matching record is found
        echo "<div style='
            background-image: url(img.PNG);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            '>
            <!-- Dimmed overlay (less dark to keep the background bright) -->
            <div style='
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.2); /* Lighter dark overlay */
                    z-index: 1;
            '></div>
            <!-- Bigger Content Box -->
            <div style='
                    position: relative;
                    background-color: rgba(255, 255, 255, 0.8); /* White with opacity */
                    padding: 40px 50px; /* Increased padding for a bigger box */
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    z-index: 2;
                    text-align: center;
                    width: 60%; /* Slightly larger width */
                    max-width: 500px; /* Slightly larger max width */
            '>
                <h1 style='color: #333; font-size: 28px;'>Good News !!! You are already a blood donor!</h1>
                <!-- Visit Website Button -->
                <a href=index.html' style='
                        display: inline-block;
                        margin-top: 20px;
                        background-color: #e74c3c; 
                        color: white; 
                        padding: 15px 30px;
                        text-decoration: none;
                        border-radius: 5px;
                        font-size: 18px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        transition: background-color 0.3s ease;
                    ' onmouseover='this.style.backgroundColor = \"#c0392b\";' onmouseout='this.style.backgroundColor = \"#e74c3c\";'>
                    Visit Website
                </a>
            </div>
          </div>";
    } else {
        // If no matching record is found, insert the new data
    $sql = "INSERT INTO donors (name, nid, dob, email, gender, contact_number, address, blood_type, height, weight, donated_blood_before, allergy_details, serious_disease_history, anemia, cardiac_patient, under_medication, password, confirm_password)
    VALUES ('$name', '$nid', '$dob', '$email', '$gender', '$contact_number', '$address', '$blood_type', $height, $weight, '$donated_blood_before', '$allergy_details', '$serious_disease_history', '$anemia', '$cardiac_patient', '$under_medication', '$password', '$confirm_password')";
    

if ($conn->query($sql) === TRUE) {
    echo "<div style='
            background-image: url(img.PNG);
            background-size: cover;
            background-position: center;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            '>
            <!-- Dimmed overlay (less dark to keep the background bright) -->
            <div style='
                    position: absolute;
                    top: 0;
                    left: 0;
                    width: 100%;
                    height: 100%;
                    background-color: rgba(0, 0, 0, 0.2); /* Lighter dark overlay */
                    z-index: 1;
            '></div>
            <!-- Bigger Content Box -->
            <div style='
                    position: relative;
                    background-color: rgba(255, 255, 255, 0.8); /* White with opacity */
                    padding: 40px 50px; /* Increased padding for a bigger box */
                    border-radius: 10px;
                    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                    z-index: 2;
                    text-align: center;
                    width: 60%; /* Slightly larger width */
                    max-width: 500px; /* Slightly larger max width */
            '>
                <h1 style='color: #333; font-size: 28px;'>Congratulations! You are now a blood donor!</h1>
                <!-- Visit Website Button -->
                <a href=index.html' style='
                        display: inline-block;
                        margin-top: 20px;
                        background-color: #e74c3c; 
                        color: white; 
                        padding: 15px 30px;
                        text-decoration: none;
                        border-radius: 5px;
                        font-size: 18px;
                        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                        transition: background-color 0.3s ease;
                    ' onmouseover='this.style.backgroundColor = \"#c0392b\";' onmouseout='this.style.backgroundColor = \"#e74c3c\";'>
                    Visit Website
                </a>
            </div>
          </div>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

    }

    // Close the connection
    $conn->close();
}
?>
