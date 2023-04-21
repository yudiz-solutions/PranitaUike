<!DOCTYPE html>
<html>
    <head>
        <title>Arrays</title>
    </head>
    <body>
        <!-- <?php
        $name = array("pranita","rani", "vedika","sum");
        echo "i like" . $name[0]. "<br>" .$name[2]."<br>" .$name[1];
        ?> -->
        <?
        // class InvalidInputException extends Exception
        // {
        // }
    
        // function calculatePrice($quantity, $price)
        // {
        //     if ($quantity <= 0) {
        //         throw new InvalidInputException("Quantity must be greater than zero");
        //     }
        //     if ($price <= 0) {
        //         throw new InvalidInputException("Price must be greater than zero");
        //     }
        //     return $quantity * $price;
        // }
    
        // try {
        //     $total = calculatePrice(5, -10);
        //     echo "Total price: $total";
        // } catch (InvalidInputException $e) {
        //     echo "Error: " . $e->getMessage();
        // }
        ?>
        <?
        //constructor
        //  class Animal{
        //     public $lion;
        //     public $leopard;
        //     public $tiger;
    
        //     function __construct($lion,$leopard,$tiger){
        //       $this->lion = $lion;
        //       $this->leopard = $leopard;
        //       $this->tiger = $tiger;
        //     }
    
        //     function get_lion(){
        //         return $this->lion;
        //     }
        //     function get_leopart(){
        //         return $this->leopard;
        //     }
        //     function get_tiger(){
        //         return $this->tiger;
        //     }
        // }
        // $newAnimal = new Animal("Fast", " Very Fast" ,"Sharp");
        // echo $newAnimal->get_lion();
        // echo "<br>";
        // echo $newAnimal->get_leopart();
        // echo "<br>";
        // echo $newAnimal->get_tiger();
    
         
        ?>
        <?
        //Destructor
        //     class SomeClass{
        //     public $name;
        
    
        //        function __construct()
        //        {
        //            echo "In constructor, ";
        //            $this->name = "Class object! ";
        //        }
    
        //        function __destruct()
        //        {
        //            echo "destroying " . $this->name . "\n";
        //        }
        //   }
        //  $obj = new Someclass();
   
        ?>
        class myplanet{
        public $name ;
        public $nation;
        
        public function __construct($name,$nation){
            $this->name = $name;
            $this->nation = $nation;
        }
            public function intro(){
              echo "this is {$this->name}'s planet and my nation is {$this->nation}";
            }

        }
        class Update extends myplanet{
            public $weight;
        

        public  function __construct($name,$nation,$weight){
              $this->name = $name;
              $this->nation = $nation;  
              $this->weight = $weight;          
        }
        public function  intro(){
            echo "this is new {$this->name} and new update about {$this->weight} and nation is {$this->nation}";
        }
        }
       $updatedworld = new myplanet("pranita","india" , "35000");
       $updatedworld->intro();
       
      ?>
      <?
      //constant
      
    // class Hello{
    // const name = "This is my  script";

    // public function byebye(){
    // echo self::name;
    // }
    // }
    // $newname = new Hello();
    // $newname->byebye();

    ?>

    <?
    // class InvalidInputException extends Exception
    // {
    // }

    // function calculatePrice($quantity, $price)
    // {
    //     if ($quantity <= 0) {
    //         throw new InvalidInputException("Quantity must be greater than zero");
    //     }
    //     if ($price <= 0) {
    //         throw new InvalidInputException("Price must be greater than zero");
    //     }
    //     return $quantity * $price;
    // }

    // try {
    //     $total = calculatePrice(5, -10);
    //     echo "Total price: $total";
    // } catch (InvalidInputException $e) {
    //     echo "Error: " . $e->getMessage();
    // }

    // ?>



        ?>
    </body>
</html>