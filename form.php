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
    <!-- Generate form with username and password and one submit button using method post to index.php and do validation-->
    <form action="index.php" method="post">
        <label for="username">Username</label>
        <input type="text" name="username" id="username" placeholder="Enter your username" require>
        <label for="password">Password</label>
        <input type="password" name="password" id="password" placeholder="Enter your password" require>
        <input type="submit" value="Submit">
    </form>


</body>

</html>