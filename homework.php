<?php
$servername = "localhost"; // replace with your database server name
$username = "root"; // replace with your database username
$password = "Root@123"; // replace with your database password
$dbname = "student"; // replace with your database name
//* Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//form validation in php
//check if the form is submitted
$errorFirstname = $errorLastname = $errorPhone = $errorAddress = "";

if (isset($_POST['submit'])) {
    //get the data from the form
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $gender = $_POST['sex'];
    //check if the username  are empty or input number in it
    if (empty($firstname)) {
        //make p display block
        $errorFirstname = "Firstname is empty";
    }

    //check if the password is empty
    if (empty($lastname)) {
        $errorLastname = "Lastname is empty";
    }
    //collect value from radio


    //check if the confirm password is equal to password value
    if (empty($phone)) {
        $errorPhone = "Phone is empty";
    } else {
        if (!preg_match("/[0-9]/", $phone)) {
            $errorPhone = "Phone must be number";
        }
    }

    //check if the email is empty and validation email
    if (empty($address)) {
        $errorAddress = "Address is empty";
    }

    //check if all data are correct then display success message
    if (!empty($firstname) && !empty($lastname) && !empty($phone) && !empty($address)) {
        $stmt = $conn->prepare("Insert into student_list set studentFirstName='$firstname',studentLastName='$lastname',studentGender='$gender',phone='$phone',address='$address' ;
        ");
        //Execute the statement
        if ($stmt->execute()) {
            echo '<div class="alert alert-success" >';
            echo '<svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>';
            echo '<span>New Record Added</span>';
            echo ' </div>';
        } else {
            echo "Error: " . $stmt->error;
        }
        //select all data from database and display it in table
        $sql = "SELECT * FROM student_list";
        $result = $conn->query($sql);
        //display data in table
        //display in pre
        echo '<div class="overflow-x-auto">
        <table class="table">
            <!-- head -->
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Gender</th>
                    <th>Phone</th>
                </tr>
            </thead>
            <tbody>';
        if ($result->num_rows > 0) {

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['studentID'] . '</td>';
                echo '<td>' . $row['studentFirstName'] . '</td>';
                echo '<td>' . $row['studentLastName'] . '</td>';
                echo '<td>' . $row['studentGender'] . '</td>';
                echo '<td>0' . $row['phone'] . '</td>';
                echo '</tr>';
            }
        } else {
            echo "0 results";
        }
        echo '</tbody>
    </table>
</div>';

        //close statement and connection
        $stmt->close();
        $conn->close();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/daisyui@3.0.1/dist/full.css" rel="stylesheet" type="text/css" />
    <style>
        #wrapper {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        #wrapper h1 {
            font-size: 2rem;
            margin-bottom: 2rem;
        }

        form {
            width: 20rem;
            padding: 2rem;
            background-color: #27272a;
            border: 1px solid #3abef7;
            border-radius: 13px;
        }

        .radio-wrap {
            display: flex;
            align-items: flex-start;

        }

        .radio-wrap .input-group {
            width: 45% !important;
        }
    </style>
</head>

<body>

    <div id='wrapper'>
        <h1>Form Register</h1>
        <form action="" method="post">
            <div class="form-control w-full max-w-xs">
                <label for='firstname' class="input-group input-group-vertical ">
                    <span>First Name</span>
                    <input type="text" placeholder="Enter Your First Name" class="input input-bordered input-info" name='firstname' />
                    <?php

                    echo "<p class='text-clifford'>$errorFirstname</p>";

                    ?>
                </label>
            </div>

            <br>
            <div class="form-control w-full max-w-xs">
                <label for='lastname' class="input-group input-group-vertical ">
                    <span>Last Name</span>
                    <input type="text" placeholder="Enter Your Last Name" class="input input-bordered input-info" name='lastname' />
                    <?php

                    echo "<p class='text-clifford'>$errorLastname</p>";

                    ?>
                </label>
            </div>
            <br>
            <div class="form-control">
                <div class="radio-wrap">

                    <label class="input-group">
                        <span>Male</span>
                        <input type="radio" name="sex" value="Male" class="radio radio-info" checked />
                    </label>
                    <br>
                    <label class="input-group">
                        <span>Female</span>
                        <input type="radio" name="sex" value="Female" class="radio radio-info" />
                    </label>
                </div>
            </div>
            <br>
            <div class="form-control w-full max-w-xs">
                <label for='lastname' class="input-group input-group-vertical ">
                    <span>Phone</span>
                    <input type="text" placeholder="Enter Your Phone" class="input input-bordered input-info" name='phone' />
                    <?php

                    echo "<p class='text-clifford'>$errorPhone</p>";

                    ?>
                </label>
            </div>
            <br>
            <div class="form-control w-full max-w-xs">
                <label for='lastname' class="input-group input-group-vertical ">
                    <span>Address</span>
                    <input type="text" placeholder="Enter Your Address" class="input input-bordered input-info" name='address' />
                    <?php

                    echo "<p class='text-clifford'>$errorAddress</p>";

                    ?>
                </label>
            </div>
            <br>
            <button class="btn  sm:btn-sm md:btn-md lg:btn-md btn-block btn-info btn-outline" name="submit">Submit</button>
        </form>
    </div>
</body>
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    clifford: '#da373d',
                }
            }
        }
    }
</script>

</html>

<?php

?>