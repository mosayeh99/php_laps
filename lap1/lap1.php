<?php
// phpinfo();

//******************************/
define('WEBSITE_NAME','PHP');
echo WEBSITE_NAME;

//******************************/
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['SERVER_ADDR'];
echo "<br>";
echo $_SERVER['SERVER_PORT'];
echo "<br>";
echo basename(__FILE__);
echo '<br>';
echo __FILE__;
echo '<br>';


//******************************/
//for loop
$a = 0;
$b = 0;

for( $i = 0; $i<5; $i++ ) {
   $a += 10;
   $b += 5;
}

echo $a; //50
echo '<br>';
echo $b; //25
echo '<br>';

//At the end of the loop a = ?? and b = ??
// a=50 , b=25

//******************************/
// while loop
$i = 0;
$num = 50;

while( $i < 10) {
   $num--;
   $i++;
}
echo $i; //10
echo '<br>';
echo $num; //40
echo '<br>';

//Loop stopped at i = ?? and num = ??
// i =10 , num =40

//******************************/
//do...while
$i = 0;

do {
   $i++;
}
while( $i < 10 );
echo $i; //10
echo '<br>';

//Loop stopped at i = ?? // i=10

//******************************/
//break
$i = 0;

while( $i < 10) {
   $i++;
   if( $i == 3 )break;
}
echo $i; //3
echo '<br>';

//Loop stopped at i = ?? //i=3

//******************************/
$age = 10;

switch($age) {

   case $age < 5:
      echo "Stay at home";
      break;

   case $age == 5:
      echo "Go to Kindergarden";
      break;

   case $age >= 6 && $age <= 12:
      echo "Go to grade : ".$age - 6;
      break;

   default:
      echo "Unknown Grade";
}
?>
