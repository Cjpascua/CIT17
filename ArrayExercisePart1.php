<title> Array Exercises Part 1 </title>
<header> </header>
<h3> PHP Array Exercise 1</h3>
<?php
$weather_condition = array("rain","sunshine","clouds","hail","sleet","snow","wind");

echo "We've seen all kinds of weather this month. At the beginning of the month, we had $weather_condition[5] and
    $weather_condition[6]. Then came $weather_condition[1] with a few $weather_condition[2] and some $weather_condition[0].
    At least we didn't get any $weather_condition[3] or $weather_condition[4]."
?>

<h3>PHP Array Exercise 2</h3>
<?php
$largest_cities = array('Tokyo', 'Mexico City', 'New York City', 'Mumbai', 'Seoul', 'Shanghai', 'Lagos', 'Buenos Aires',
    'Cairo', 'London','Los Angeles', 'Calcutta', 'Osaka', 'Beijing');
sort($largest_cities);

foreach ($largest_cities as $cities) {
    echo $cities. ", ";
}
?>
