<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
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

        /* style all the input*/
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

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>

<body>
    <?php
    //form validation in php
    //check if the form is submitted
    $errorUsername = $errorPassword = $errorcConfirmPassword = $erroremail = "";
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        //get the data from the form
        $username = $_POST['username'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirmPassword'];
        $email = $_POST['email'];

        //check if the username  are empty or input number in it
        if (empty($username)) {
            //make p display block
            $errorUsername = "Username is empty";
        }

        //check if the password is empty
        if (empty($password)) {
            $errorPassword = "Password is empty";
            if (!empty($password)) {
                if (strlen($password) < 6) {
                    $errorPassword = "Password is less than 6 characters";
                }
            }
        }

        //check if the confirm password is equal to password value
        if ($confirmPassword != $password) {
            $errorcConfirmPassword = "Confirm password is not equal to password";
        }

        //check if the email is empty and validation email
        if (empty($email)) {
            $erroremail = "Email is empty";
        }

        //check if all data are correct then display success message
        if (!empty($username) && !empty($password) && !empty($confirmPassword) && !empty($email)) {
            if ($password === $confirmPassword)
                echo "<h1>Success</h1>";
        }
    }
    ?>
    <!-- Generate form with username and password and one submit button using method post to index.php and do validation-->
    <form action="form-validation.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" require>
        <span class="error">
            <?php echo $errorUsername; ?>
        </span>
        <input type="number" name=age id="age" placeholder="Enter your age" require>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" require>
        <span class="error">
            <?php echo $errorPassword; ?>
        </span>
        <label for="confirmPassword">Confirm Password</label>
        <input type="password" name="confirmPassword" id="confirmPassword" placeholder="Enter your password" require>
        <span class="error">
            <?php echo $errorcConfirmPassword; ?>
        </span>
        <label for="email">email</label>
        <input type="text" name="email" id="email" placeholder="Enter your password" require>
        <span class="error">
            <?php echo $erroremail; ?>
        </span>
        <!--create error text when password input is in valid -->
        <input type="submit" name="submit" value="Submit">
    </form>
</body>

</html>