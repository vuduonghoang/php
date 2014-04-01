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

























?>


