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
        background-color: #333;
        width: 50%;
        margin: auto;
        padding: 20px;
        border-radius: 10px;
    }

    label {
        color: white;
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
    </style>
</head>

<body>
    <!-- 
        form that have email field and password field that validate with jquery validation plugin
-->
    <!-- <form action="validation.php" method="post" id="form">
        <label for="email">Email:</label>
        <input type="email" name="email" id="email">
        <span class="error" id="emailError"></span>
        <label for="password">Password:</label>
        <input type="password" name="password" id="password">
        <span class="error" id="emailError"></span>
        <input type="submit" value="Submit">
    </form> -->
    <div id="container"></div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
<script>
//validation the form
$(document).ready(function() {
    $.ajax({
        type: 'GET',
        dataType: 'json',
        url: 'https://newsapi.org/v2/everything?q=tesla&from=2023-04-28&sortBy=publishedAt&apiKey=eb4975f784974dc1a83779da423fc8e5',
        success: function(data, status, xhr) {
            for (var i = 0; i < data.articles.length; i++) {
                if (data.articles[i].urlToImage == null) {
                    // $('#container').append('<img src="' + data.articles[i].urlToImage + '"/>');
                    $('#container').append('<h1>' + data.articles[i].title + '</h1>');
                    // $('#container').append('<p>' + data.articles[i].description + '</p>');
                }
            }
        }
    })
});
</script>


</html>