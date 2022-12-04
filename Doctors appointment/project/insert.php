<?php
if (isset($_POST['submit'])) {
    if (isset($_POST['username']) && isset($_POST['age']) &&
        isset($_POST['mobileno']) && isset($_POST['email']) &&
        isset($_POST['date'])) {
        
        $username = $_POST['username'];
        $password = $_POST['age'];
        $gender = $_POST['mobileno'];
        $email = $_POST['email'];
        $date = $_POST['date'];
        $host = "localhost";
        $dbUsername = "root";
        $dbPassword = "";
        $dbName = "register";
        $conn = new mysqli($host, $dbusername, $dbage, $dbName);
        if ($conn->connect_error) {
            die('Could not connect to the database.');
        }
        else {
            $Select = "SELECT email FROM bookapp WHERE email = ? LIMIT 1";
            $Insert = "INSERT INTO register(username, password, gender, email, phoneCode, phone) values(?, ?, ?, ?, ?, ?)";
          
            $stmt = $conn->prepare($Select);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $stmt->bind_result($resultEmail);
            $stmt->store_result();
            $stmt->fetch();
            $rnum = $stmt->num_rows;
            if ($rnum == 0) {
                $stmt->close();
                $stmt = $conn->prepare($Insert);
                $stmt->bind_param("ssssii",$username, $age, $mobileno, $email, $date);
                if ($stmt->execute()) {
                    echo "New record inserted sucessfully.";
                }
                else {
                    echo $stmt->error;
                }
            }
            else {
                echo "Someone already registers using this email.";
            }
            $stmt->close();
            $conn->close();
        }
    }
    else {
        echo "All field are required.";
        die();
    }
}
else {
    echo "Submit button is not set";
}
?>