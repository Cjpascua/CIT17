<title> Hands On Exercise 2 </title>
<h3> PHP Exercise 5</h3>
<?php
$around = "around";
echo 'what goes '. $around . ', comes ' . $around;
?>

<h3>PHP Exercise 6</h3>
<?php
for ($i = 1; $i <= 12; $i++)
{
   echo "$i * $i = ". $i * $i;
   echo "<br>";
}
?>

<h3>PHP Exercise 7</h3>
<?php
for ($i = 1; $i <= 7; $i++)
{
    for ($n = 1; $n <= 7; $n++){
        echo " ". $i * $n;
    }
    echo ("<br>");
}
?>
