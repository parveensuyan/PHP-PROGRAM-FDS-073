<?php
$variable = 'purple';
switch ($variable) {
    case 'red':
    echo '<p style=color:'.$variable.'>The color is Red</p>';
       break; //x
    case 'blue':
    echo '<p style=color:'.$variable.'>The color is Blue</p>';
     break; //x
    default:
    echo '<p style=color:'.$variable.'>INVALID COLOR</p>';
        break;
}
echo  "test output<br>";
//initial value
$i = 1;
//condition
while($i <= 5){
echo $i;
// increment
$i++.'<br>';
}
/*
i = 1
1<=5
1+1 = 2
2<5
*/
//INTIAL VALUE
$j = 1;
do{
//INCREMENT THE VALUE
echo $j.'<br>';
$j++;
}while($j <= 5);
//CHECK THE CONDITION
/*
j = 1;

j = 2 ;
2 <5
j = 2;
j = 2+1 = 3;
3<5
j = 3+1 = 4
|
|
j = 5
5 + 1 = 6
6 <5 x
*/

?>
