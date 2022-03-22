<?php
$br  = "\n";
$hr  = "------------------------------------------------------------------------------------------\n";
$hhr = "==========================================================================================\n";

$rutas = [
    1 => ['1'],
    2 => ['1-2'],
];

do {
    echo `clear`;
    echo $hhr.'RETO: ¿CUÁNTAS RUTAS HAY DEL PUNTO A AL PUNTO B?'.$br.$hhr;
    $rutaSelected = readline('Captura la tienda a la que quieres llegar (máximo 30): ');
} while (!(is_numeric($rutaSelected)) || $rutaSelected <= 1 || $rutaSelected > 30);

if ($rutaSelected > array_key_last($rutas)) {
    for ($i = array_key_last($rutas) + 1; $i <= $rutaSelected; $i++) {
        $rutas += [$i => []];
        for ($j = 0; $j < count($rutas[$i - 2]); $j++) {
            array_push($rutas[$i], $rutas[$i - 2][$j].'-'.$i);
        }
        for ($k = 0; $k < count($rutas[$i - 1]); $k++) {
            array_push($rutas[$i], $rutas[$i - 1][$k].'-'.$i);
        }
    }
}

$counter = 0;
echo $br.'En total hay ';
for ($i = 0; $i < count($rutas[$rutaSelected]); $i++) {
    $counter++;
}
echo $counter.' rutas disponibles para llegar de la Tienda 1 a la Tienda '.$rutaSelected.$br;
echo $br.$hr;

if ($rutaSelected <= 20) {
    do {
        $opt = readline('¿Deseas imprimir las posibles rutas generadas? (S/N): ');
    } while (!($opt === 'S' || $opt === 'N'));

    if ($opt === 'S') {
        echo $br.'Las posibles rutas generadas son: '.$br;
        for ($i = 0; $i < count($rutas[$rutaSelected]); $i++) {
            echo $i + 1 .":\t".$rutas[$rutaSelected][$i].$br;
        }
    }
    echo $br.$hr;
}
