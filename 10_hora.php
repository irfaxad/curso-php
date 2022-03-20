<?php

echo `clear`;
$segs = readline('Ingresa el tiempo en segundos: ');
$mins = 0;
$hors = 0;

if (is_numeric($segs) && $segs > 0)
{
    if ($segs >= 3600)
    {
        echo 'Horas: '.($hors = (int) ($segs / 3600))."\n";
        echo 'Minutos: '.($mins = (int) (($segs % 3600) / 60))."\n";
        echo 'Segundos: '.($segs = (($segs % 3600) % 60))."\n";
    }
    else if ($segs >= 60)
    {
        echo 'Minutos: '.($mins = (int) (($segs % 3600) / 60))."\n";
        echo 'Segundos: '.($segs = (($segs % 3600) % 60))."\n";
    }
    else
    {
        echo "Segundos: $segs \n";
    }
    echo "\nCáiculo de segundos:\n".$hors * 3600 .' + '.$mins * 60 .' + '.$segs.' = '.($hors * 3600) + ($mins * 60) + $segs;
}
else
{
    echo 'Escribe un dato numérico válido.';
}
echo "\n\n";
$hour     = readline('Ahora captura horas, minutos y segundos en formato horario (hh:mm:ss): ');
$hourConv = explode(':', $hour);
if (count($hourConv) == 3)
{
    $hors = $hourConv[0];
    $mins = $hourConv[1];
    $segs = $hourConv[2];
    if (is_numeric($hors) && is_numeric($mins) && is_numeric($segs))
    {
        $hors = (int) $hors;
        $mins = (int) $mins;
        $segs = (int) $segs;
        echo 'EL horario capturado tiene '.($hors * 3600) + ($mins * 60) + $segs.' segundos.';
        echo "\nCáiculo de segundos:\n".$hors * 3600 .' + '.$mins * 60 .' + '.$segs.' = '.($hors * 3600) + ($mins * 60) + $segs;
    }
}
else
{
    echo 'Capture un horario válido (hh:mm:ss).';
}
echo "\n";
