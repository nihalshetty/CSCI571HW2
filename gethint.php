<?php
// Fill up array with names
$a[]="Hummus Pita &veggie";
$a[]="Party Wings";
$a[]="Chicken Fingers";
$a[]="Chilli Cheese Fries";
$a[]="Pesto Chicken Penne";
$a[]="Chicken Jambalaya Pasta";
$a[]="Fresh Tomato, Sausage, and Pecorino Pasta";
$a[]="Mediterranean Orzo Salad with Feta Vinaigrette";
$a[]="Turkey Burger";
$a[]="Frisco Burger";
$a[]="Grilled Fish Sandwich";
$a[]="SC Chicken Club";
$a[]="Belgian Waffles with Winter White Honey";
$a[]="Strawberry Crepes with Chocolate Merlot Fudge Sauce";
$a[]="Brownie Ice Cream with Chocolate Sea Salt";
$a[]="Maple BrÃ»lÃ©e Oatmeal with Cherry Vanilla Crumbles";
$a[]="coke";
$a[]="pepsi";
$a[]="coke zero";
$a[]="Miranda";
$a[]="Amaretto Sour";
$a[]="Treme";
$a[]="Tropical Sunset";
$a[]="VeeV Holiday Highballs";
$a[]="Cran-Dandy Cooler";
$a[]="Tropical Cooler Smoothie";
$a[]="Candy Cane Cooler";
$a[]="Peach Cooler";
$a[]="Chateau Guiraud Sauternes 2005";
$a[]="Vasse Felix Heytesbury Chardonnay 2011";
$a[]="Smith Woodhouse Vintage Port 2011";
$a[]="Chapoutier and Laughton Cluster M45 Shiraz 2010";



// get the q parameter from URL
$q=$_REQUEST["q"]; $hint="";

// lookup all hints from array if $q is different from "" 
if ($q !== "") {
  $q=strtolower($q); $len=strlen($q);
  foreach($a as $name) {
    if (stristr($q, substr($name,0,$len))) {
      if ($hint==="") {
        $hint=$name;
      } else {
        $hint .= ", $name";
      }
    }
  }
}

// Output "no suggestion" if no hint were found
// or output the correct values 
echo $hint==="" ? "no suggestion" : $hint;
?>