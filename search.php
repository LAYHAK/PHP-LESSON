<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php 
        $lastname = array("Smith", "Jones", "Taylor", "Williams", "Brown");
        //create table header
        if(isset($_POST['search'])){
            $search = $_POST['search'];
            if(in_array($search, $lastname)){
                echo "found ".$search;
            }else{
                echo "Not found " . $search;
            }
        }
    ?>
    <!-- 
        form that have search input and search button 
    -->
    <form action="search.php" method="post">
        <label for="search">Search by last name:</label>
        <input type="text" name="search" id="search">
        <input type="submit" value="Search">
    </form>
</body>


</html>