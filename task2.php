<!DOCTYPE html>
<html>
<body>
    <!-- <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
    Name : <input type="text" name="firstName"/>
    <input type="submit"/>
    </form> -->
 

    <!-- <form action="hello.php">
    Name:<input type = "text" name = "name"/>;
    <input type="submit" value="visit"/>;
    </form> -->


    <!-- <form action="login.php" method="post">   
    <table>   
    <tr><td>Name:</td><td> <input type="text" name="name"/></td></tr>  
    <tr><td>Password:</td><td> <input type="password" name="password"/></td></tr>   
    <tr><td colspan="2"><input type="submit" value="login"/>  </td></tr>  
    </table>  
    </form>   
<?php    

//declare(strict_types=1);


#1) $GLOBALS
// $x = 75;
// $y = 25; 

// function addition() {
//   $GLOBALS['z'] = $GLOBALS['x'] + $GLOBALS['y'];  
// }

// addition();
// echo $z;


#2)functions

// function newFunction(int $a, int $b){
//      return $a + $b;

//    }
//    echo newFunction(5,6);
//    newFunction();


// function newaddition(int $a,int $b){
//     $z = $a + $b;
//     return $z;
// }

// echo "5 + 10 =" . newaddition(5,10)."<br>";
// echo "10 + 20=" . newaddition(20,30) . "<br>";
// echo "15 + 30=" . newaddition(15,30);



#3) Emojis

// $😎 = "Hello World";
// echo $😎;

// class 💩💩💩💩
// {
// 	function 💩💩💩($😎, $🐯)
// 	{
// 		return $😎 + $🐯;
// 	}

// }
// $🐔 = 3;
// $😥 = $🐔 + 2;
// $💩 = new 💩💩💩💩;
// echo $💩 -> 💩💩💩($🐔, $😥);


#4) $_SERVER ,$_POST , $_REQUEST
// if($_SERVER["REQUEST_METHOD"] == "POST"){
//     $name = $_POST['firstName'];

//  if (empty($name)){
//     echo "name is empty";
//     # code...
//  }else{
//     echo $name;
//  }
// }

#5) Array
// $numbers = array(1, 20, 13, 58 ,60);
// sort($numbers);

// echo "i like" .$numbers[0].  "<br>" .$numbers[1]  .$numbers[2];


//Indexed Array
// $cars = array("Volvo", "BMW", "Toyota");
// $arrlength = count($cars);

// for($x = 0; $x < $arrlength; $x++) {
//   echo $cars[$x];
//   echo "<br>";
// }


#5) RegExp
// $str = "Visit W3Schools";
// $pattern = "/w3schools/i";
// echo preg_match($pattern, $str); 

//Grouping
// $str = " bananas and apples .";
// $pattern = "/ap(pl){1}/i";
// echo preg_match($pattern, $str);


#6) form
//   $name = $_GET["name"];
//   echo "hello , $name";


#form
// $name =$_Post["name"];
// $password =$_POST["password"];
// echo "Welcome : $name, your password is : $password";


#7)preg_match() function
// $website = "php is best platform to learn.";  
      
      
//     $res = preg_match('/php/i', $website, $matches);  
      
//     if ($res) {  
//         echo "Pattern matched in string.</br>";  
//         print_r($matches);  
//     } else {  
//         echo "Pattern not matched in string.";  
//     }  



?>


</body>
</html>
