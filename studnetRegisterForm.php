<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    /*style the form*/
    form {
        display: flex;
        flex-direction: column;
        align-items: flex-start;
        background-color: #f1f1f1;
        width: 50%;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
    }


    input {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        box-sizing: border-box;
        border-radius: 10px;
        border: 2px solid #ccc;
        -webkit-transition: 0.5s;
        transition: 0.5s;
        outline: none;
    }

    input:focus {
        border: 2px solid #555;
    }

    input[type="radio"] {
        width: 10%;
        margin: 0 10px;
    }

    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        cursor: pointer;
    }

    input[type="submit"]:hover {
        background-color: #45a049;
    }

    .error {
        color: red;
    }

    div .error {
        width: 300px;
    }

    .gender {
        display: inline !important;
    }

    div {
        display: flex;
        flex-direction: row;
        justify-content: space-between;
    }
    </style>
</head>

<body>
    <?php
    //? define variables and set to empty values
        $nameErr = $emailErr = $genderErr = $phoneErr=$ageErr = "";
        $name = $email = $age =$gender = $phone = "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            if (empty($_POST["name"])) {
                $nameErr = "Name is required";
            } else {
                $name = test_input($_POST["username"]);
                //? check if name only contains letters and whitespace
                if (!preg_match("/^[a-zA-Z-' ]*$/",$name)) {
                $nameErr = "Only letters and white space allowed";
                }
            }
            if(empty($_POST["age"])){
                $ageErr="Age is required";
            }
            else{
                $age=test_input($_POST["age"]);
            }
            
            if (empty($_POST["email"])) {
                $emailErr = "Email is required";
            } 
            else {
                $email = test_input($_POST["email"]);
                //? check if e-mail address is well-formed
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
                {
                    $emailErr = "Invalid email format";
                }
            }
                

            if (empty($_POST["comment"])) {
                $comment = "";
            } else {
                $comment = test_input($_POST["comment"]);
            }

            if (empty($_POST["gender"])) {
                $genderErr = "Gender is required";
            } else {
                $gender = test_input($_POST["gender"]);
            }
            if(empty($_POST["phone"])){
                $phoneErr="Phone is required";
            }
            else{
                $phone=test_input($_POST["phone"]);

            }
        }

        function test_input($data) {
        $data = trim($data);
        //   $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
        }    
    ?>
    <!-- Generate form with username ,gender,email,phone, and one submit button using method post to index.php and do validation-->
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Name:</label>
        <input type="text" name="username" value="<?php echo $name;?>">
        <span class="error">* <?php echo $nameErr;?></span>
        <br><br>
        <label for="age">Age:</label>
        <input type="number" name=age id="age" value="<?php echo $age;?> placeholder=" Enter your age" require>
        <span class="error">* <?php echo $ageErr?></span>

        <label>Gender:</label>
        <div>

            <label for="female" class="gender">Female</label>
            <input type="radio" name="gender" <?php 
                    if (isset($gender) && $gender=="female") 
                        echo "checked";
                ?> value="female">
            <label for="male" class="gender">Male</label>
            <input type="radio" name="gender" <?php 
                    if (isset($gender) && $gender=="male")
                        echo "checked"
                ;?> value="male">
            <label for="other" class="gender">Other</label>
            <input type="radio" name="gender" <?php if (isset($gender) && $gender=="other") echo "checked";?>
                value="other">
            <span class="error">* <?php echo $genderErr;?></span>
        </div>


        <br><br>
        <label for="email">E-mail:</label>
        <input type="text" name="email" value="<?php echo $email;?>">
        <span class="error">* <?php echo $emailErr;?></span>
        <br><br>
        <label for="phone">Phone:</label><input type="number" name="phone" value="<?php echo $phone;?>">
        <span class="error"><?php echo $phoneErr;?></span>

        <input type="submit" name="submit" value="Submit">
    </form>
    <?php
    echo "<h1>Username:$name</h1>";
    echo "<h1>Age:$age</h1>";
    echo "<h1>Gender:$gender</h1>";
    echo "<h1>Email:$email</h1>";
    echo "<h1>Phone:$phone</h1>";
    ?>

</body>

</html>