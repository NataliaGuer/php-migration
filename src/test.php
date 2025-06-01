<?php


//test
// 1. Funzione each() deprecata da PHP 7.2, rimossa in PHP 8.0
$arr = ['a' => 1, 'b' => 2];
reset($arr);
while (list($key, $value) = each($arr)) {
    echo "$key => $value\n";
}

// 2. Creazione dinamica di funzione con create_function() (deprecata e rimossa)
$square = create_function('$n', 'return $n * $n;');
echo $square(4);

// 3. Funzione che non dichiara i tipi ma viene usata con parametri incompatibili
function sum($a, $b) {
    return $a + $b;
}

echo sum("1", []); // warning in PHP 8.1+, fatal in 8.4 (TypeError)

// 4. Accesso a proprietà non definite (notice in PHP 7.2, fatal in PHP 8.4 con stricter checks)
class Person {
    public $name = "Mario";
}

$p = new Person();
echo $p->surname; // undefined property

// 5. Variabile non inizializzata (warning/notice → error in future versions)
function useVar() {
    if (false) {
        $x = 10;
    }
    return $x; // possibly undefined
}

echo useVar();


class mixed {}

$mixed = new mixed();

// 6. Uso di una funzione con il nome di una parola chiave riservata (PHP 8.0+)
// function match() {
//     return 'this is fine in 7.2, but "match" is a keyword in PHP 8.0+';
// }

// echo match();

// 7. Riferimenti a oggetti in maniera non sicura (modifica in PHP 8.0+)
function updateObject(&$obj) {
    $obj->value = 10;
}

updateObject(null); // TypeError in PHP 8.x

