<?php
$servername = "localhost"; // replace with your database server name
$username = "root"; // replace with your database username
$password = "Root@123"; // replace with your database password
$dbname = "instinst-project-test"; // replace with your database name

//* Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//! Check connection
//? if ($conn->connect_error) {
//?     die("Connection failed: " . $conn->connect_error);
//? } else {
//?     echo "Connected successfully";
//? }
//! Insert data
//? $name = 'Johny';
//? $gender = 'M';
//? $sql = "Insert into Employee set employeeName='$name',Gender='$gender';";

//? if ($result === TRUE) {
//?     echo "New record created successfully";
//? } else {
//?     echo "Error: " . $sql . "<br>" . $conn->error;
//? }

//Todo Select data
$sql = "SELECT * FROM Employee";
$result = $conn->query($sql);



// $conn->close();
// Prepare the insert statement
// $stmt = $conn->prepare("INSERT INTO  Employee set employeeName=?,Gender=?;");
// $stmt->bind_param("ss", $name, $gender);

// // Set the values to insert
// $name = "John Doe";
// $gender = "johndoe@example.com";


// Execute the statement
// if ($stmt->execute()) {
//     echo "New record created successfully";
// } else {
//     echo "Error: " . $stmt->error;
// }

// Close statement and connection
// $stmt->close();
// $conn->close();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.1/dist/full.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Gender</th>
                </tr>
            </thead>
            <tbody>
                <!-- row 1 -->
                <?php
                if ($result->num_rows > 0) {

                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row['employeeID'] . '</td>';
                        echo '<td>' . $row['employeeName'] . '</td>';
                        echo '<td>' . $row['Gender'] . '</td>';
                        echo '</tr>';
                    }
                } else {
                    echo "No data";
                }
                ?>

            </tbody>
        </table>
    </div>
</body>

</html>