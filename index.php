<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    /* * style the table */
    table {
        border-collapse: collapse;
        width: 100%;
        color: whtie;
        font-family: monospace;
        font-size: 25px;
        text-align: left;
    }
</style>

<body>
    <div style="background-image:linear-gradient(135deg,blue,yellow,red,green);
                width:100vh;
                height:100vh;
                display:flex;
                justify-content:center;
                align-items:center;">
        <h1>
            <?php
            //                 //$cars = array("Volvo","BMW","Toyota");
            //                 $cars=["Volvo","BMW","Toyota"];
            //                 var_dump($cars);
            //                 $colors="red";
            //                 //create switch case with 7 colors;
            //                 switch($colors){
            //                     case "red":
            //                         echo "Your favorite color is red!";
            //                         break;
            //                     case "blue":
            //                         echo "Your favorite color is blue!";
            //                         break;
            //                     case "green":
            //                         echo "Your favorite color is green!";
            //                         break;
            //                     case "yellow":
            //                         echo "Your favorite color is yellow!";
            //                         break;
            //                     case "pink":
            //                         echo "Your favorite color is pink!";
            //                         break;
            //                     case "black":
            //                         echo "Your favorite color is black!";
            //                         break;
            //                     case "white":
            //                         echo "Your favorite color is white!";
            //                         break;
            //                     default:
            //                         echo "Your favorite color is neither red, blue, nor green!";
            //                 }
            //                 $age = ["Peter"=>"35", "Ben"=>"37", "Joe"=>"43"]; 
            // //TO output
            //                 echo "</br>Peter is " . $age['Peter'] . " years old."; 
            //                 settype($a,"integer");
            //                 $a="Hello";
            //                 echo (int)$a;//Output : 0

            //                 //print all product
            //                 echo "<pre>";
            //                 print_r($product);
            //                 echo "</pre>";
            //                 //print array in product in table
            // echo "<table border='1'>";
            // echo "<tr>
            //         <th>SKU</th>
            //         <th>Name</th>
            //         <th>Description</th>
            //         <th>Price</th>
            //         <th>Qty</th>
            //     </tr>";
            // $product =  [
            //     ["sku"=>'001',"name"=>"Keyboard","description"=>"Standard Keyboard","price"=>100],
            //     ["sku"=>'002',"name"=>"Mouse","description"=>"Standard mouse","price"=>10],
            //     ["sku"=>'003',"name"=>"Monitor","description"=>"Standard monitor","price"=>1000,"qty"=>10],
            // ];
            // // $keys=array_keys($product[0]);
            // foreach($product as $value){
            //         echo "<tr>";
            //         echo "<td>".$value['sku']."</td>";
            //         echo "<td>".$value['name']."</td>";
            //         echo "<td>".$value['description']."</td>";
            //         echo "<td>".$value['price']."</td>";
            //         echo "<td>".@$value['qty']."</td>";
            // }
            // //* Function
            // function add($a,$b){
            //     return $a+$b;
            // }
            // function printHelloWorld($a){
            //     for($i=1;$i<=$a;$i++){
            //         echo "Hello World ".$i."</br>";
            //     }
            // }            
            // printHelloWorld(20);
            // echo add(1,2);
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $username = $_REQUEST['username'];
                $password = $_REQUEST['password'];
                //do validation using regex not allow user to input number as username
                if (preg_match("/[0-9]/", $username)) {
                    echo "Username must not contain number";
                } else {
                    echo "Username : " . $username . "</br>";
                    echo "Password : " . $password . "</br>";
                }
            }
            ?>

        </h1>
    </div>
</body>

</html>