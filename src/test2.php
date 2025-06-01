<?php

class mixed{}

$mixed = new mixed();

# string to number comparison
$users = [
    ['id' => '0001', 'name' => 'Alice'],
    ['id' => '10', 'name' => 'Charlie'],
    ['id' => '0', 'name' => 'Eve'],
    ['id' => ' ', 'name' => 'Frank'],
];

$input = 0;

foreach ($users as $user) {
    if ($user['id'] == $input) {
        echo "🎯 Match trovato: " . $user['name'] . " (ID: " . $user['id'] . ")\n";
    }
}


# use of round passing null as third argument
$rounded = round(7.564, 2, null);

class utils {
    public function round($val, $precision, $mode = null) {
        return round($val, $precision, $mode);
    }
}

$utils = new utils();
print($utils->round(7.567, 2));

# access to undefined key

$array = ['abc' => 143];
print($array['cde']);