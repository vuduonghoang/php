<?php
      $x = 1;
      $y = 2;
function temp()
{
      $y = 2;
      echo "Gia tri cua bien x trong ham temp la: ". $x ."<br>";
      echo "Gia tri cua bien y trong ham temp la: ". $y . "<br>";
}
//      temp();
//      echo "Test gia tri cua bien ngoai ham: " . $y. "<br>"; // gia tri cua bien trong ham chi co ham moi hieu
//      echo "Gia tri cua bien ngoai ham: ".$x."<br";
function tong()
{
      global $x,$y;// globar se chuyen bien ben ngoai vao ham, giong nhu loi khai bao cho bien dc dua vao ham
      $y = $x + $y;
}
//tong();//goi ham
//echo $y; //xuat bien y trong ham, ko phai bien y ngoai ham
function tong1()
{
      $GLOBALS['y'] = $GLOBALS['x'] + $GLOBALS['y']; // khai bao bien vao ham kieu cmn khac
}
//tong1();
//echo $y;
//how about with static variable
function tongstatic()
{
      static $x = 0;
      echo $x;
      $x++;
}
//tongstatic();
//tongstatic();
//tongstatic();
//dieu nay co nghia la khi ban khai bao bien static thi ban co the thuc hien moi thu voi bien static trong ham va goi ham la no tu hieu
// demo echo
//
//$txt1 = "Hello Vu";
//$txt2 = "kakaka";
$friends = array('Thao','Trang','Tuan','Na');
//echo $txt1. "<br>";
//echo $friends[0];
//print "PHP is fun for you!";//prinf se in ra chuoi ki tu va ca bien
//print "vi tri thu 3 trong mang friend la: $friends[2]";
//echo "ko show" . "<br>";

$x = 5985;
//var_dump($x);
//echo "<br>";
$x = -345; // negative number
//var_dump($x);
//echo "<br>";
$x = 0x8C; // hexadecimal number
//var_dump($x);
//echo "<br>";
$x = 047; // octal number
//var_dump($x);
$x = 10.365;
//echo "<br>";
//var_dump($x);
//echo "<br>";
$x = 2.4e3;
//var_dump($x);
//echo "<br>";
$x = 8E-5;
//var_dump($x);
//echo "<br>";
//$x="Hello world!";
//$x=null;
//var_dump($x);
//demo array
$cars = array("toyota","BMW","Mescedes");
//var_dump($cars);
//PHP objects
class car
{
      var $color;
      function car($color="green")
      {
            $this->color = $color;
      }
      function what_color()
      {
            return $this->color;
      }
}
// goi class va in bien ra man hinh
//viet 1 function ngoai lop de goi lai lop va su dung
function print_var($obj)
{
      foreach (get_object_vars($obj) as $prop => $val) {
            echo "\t $prop = $val";
      }
}
$herbie = new car("white");
//echo "\t herbie : Properties \n";
//print_var($herbie);
// Thao tac ve string function
// Ham strlen() tra ve so ki tu cua mot chuoi
$string = "Hello Vu Hoang welcome to the PHP world";
echo strlen($string);echo "<br>";
// Ham strpos() se tra ve vi tri cua character ma ban can tim trong chuoi va co phan biet chu hoa va chu thuong
echo strpos("$string","Vu");
// Back to the real programer :D :D :D
// php constant 
define(Greeting, "Welcome to PHP world");
echo "<br>";
echo Greeting;
define(pi,"3.14");
echo "<br>";
echo pi;
echo "<br>";
var_dump(pi);
define("greeting1", "Welcome to PHP 1", true);
echo "<br>";
echo greeting1;
echo "<br>";
echo "-----------------------------------------------";
echo "<br>";
echo "PHP Operation"; // addition,subtraction,multiplication,division,modulus. +,-,*,/,%
echo "<br>";
$m = 10;
$n = 6;
echo $m + $n;
echo "<br>";
echo $m - $n;
echo "<br>";
echo $m * $n;
echo "<br>";
echo $m/$n;
echo "<br>";
echo $m%$n;
echo "<br>";

echo "-----------------------------------------------";
echo "<br>";
echo "Assignment Operator";
echo "<br>";
//echo $m +=100;
$m += 11;
echo $m;
echo "<br>";

echo "-----------------------------------------------";
echo "<br>";
echo "String operator";
echo "<br>";
$string1 = "Hello";
$string2 = $string1 . " Vu Hoang ";
echo $string2;
echo "<br>";
$string3 = "kakaka";
echo $string3 .= "hehe";
echo "<br>";
echo "-----------------------------------------------"; 
echo "<br>";
echo "Increment Value and Decrement Operator";
echo "<br>";
$h = 1;
$k = 2;
//echo ++$h;
echo "<br>";
echo $h++;
// sau buoc nay qua cai buoc tiep theo thi $h da dc +1
echo "<br>";
echo ++$h;
echo "<br>";
echo --$k;
echo "<br>";
echo $k--;
echo "-----------------------------------------------"; 
echo "<br>";
echo "PHP comparision Operator";
echo "<br>";
// $x == $y; $x === $y; $x != $y; $x <> $y; $x < $y; $x > $y; $x >= $y; $x <= $y;$x !== $y;
$d = 100;
$e = "100";
var_dump($d == $e);
echo "<br>";
var_dump($d);
echo "<br>";
var_dump($e);
echo "<br>";
var_dump($d === $e);
echo "<br>";
var_dump($d != $e);
echo "<br>";
var_dump($d !== $e);
echo "<br>";
var_dump($d <> $e);
echo "<br>";
echo "-----------------------------------------------";
echo "<br>";
echo "PHP logical operators";
echo "<br>";
var_dump($d && $e);
echo "<br>";
var_dump($d || $e);
echo "<br>";
var_dump($d xor $e);// True khi d dung hoac la e dung va false khi ca d va e deu dung. 
echo "<br>";
echo "-----------------------------------------------";
echo "<br>";
echo "Array Operator" . "<br>";
$x = array("1" => "red", "2" => "green");
$y = array("3" => "red","4" => "green");
$z = $x + $y; // union of $x and $y
var_dump($z);
echo "<br>";
var_dump($x == $y);
echo "<br>";
var_dump($x === $y);
echo "<br>";
var_dump($x != $y);
echo "<br>";
var_dump($x <> $y);
echo "<br>";
var_dump($x !== $y);
echo "<br>";
echo "-----------------------------------------------";
echo "<br>";
echo "PHP conditional statements";
echo "<br>";
// if statement: executes some code only if a specified condition is true;
$d = date("D");
if($d == "Sat" or $d =="Sun")
{
      echo $d. "<br>" . "Have nice weekend!";
}
else
{
      echo $d . "<br>" . "Have a good day!";
}
$t = date("H");
if($t <= 11)
{
      var_dump($t);
      echo "<br>";
      echo "Good morning";
}
elseif( $t > 11 and $t <= 12 )
{
      echo "Good lunch";
}
else
{
      echo "Good afternoon";
}
echo "-----------------------------------------------";
echo "<br>";
echo "Switch PHP";
echo "<br>";
$color = "red";
switch ($color) {
      case 'green':
            {
                  echo "red";
                  break;      
            }
      case 'yellow':
                  echo "yellow";
                  break;      
      
      default:
            echo "no color";
            break;
}
echo "<br>";
echo "-----------------------------------------------";
echo "<br>";
echo "PHP while loop";
// syntax while(condition is true) {code to be executed};




















?>


