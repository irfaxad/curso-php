<?php

function showAhorcado($remainAttempts)
{
    switch ($remainAttempts) {
        case 0:
            echo "😄 JUEGO DEL AHORCADO 😄\n\n";
            echo "\u{250C}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2502}\n";
            echo "\u{2534}\u{2500}\u{2500}\n";
            echo "\n\n\n";
            break;
        case 1:
            echo "😃 JUEGO DEL AHORCADO 😃\n\n";
            echo "\u{250F}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            echo "\n\n\n";
            break;
        case 2:
            echo "😐 JUEGO DEL AHORCADO 😐\n\n";
            echo "\u{250F}\u{2501}\u{2501}\u{2501}\u{2501}\u{2513}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            echo "\n\n\n";
            break;
        case 3:
            echo "😟 JUEGO DEL AHORCADO 😟\n\n";
            echo "\u{250F}\u{2501}\u{2501}\u{2501}\u{2501}\u{2513}\n";
            echo "\u{2503}   \u{256D}\u{2538}\u{256E}\n";
            echo "\u{2503}   \u{2570}\u{2500}\u{256F}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            echo "\n\n\n";
            break;
        case 4:
            echo "😞 JUEGO DEL AHORCADO 😞\n\n";
            echo "\u{250F}\u{2501}\u{2501}\u{2501}\u{2501}\u{2513}\n";
            echo "\u{2503}   \u{256D}\u{2538}\u{256E}\n";
            echo "\u{2503}   \u{2570}\u{2530}\u{256F}\n";
            echo "\u{2503}    \u{2503}\n";
            echo "\u{2503}    \u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            echo "\n\n\n";
            break;
        case 5:
            echo "😨 JUEGO DEL AHORCADO 😨\n\n";
            echo "\u{250F}\u{2501}\u{2501}\u{2501}\u{2501}\u{2513}\n";
            echo "\u{2503}   \u{256D}\u{2538}\u{256E}\n";
            echo "\u{2503}   \u{2570}\u{2530}\u{256F}\n";
            echo "\u{2503}  \u{2501}\u{2501}\u{254B}\u{2501}\u{2501}\n";
            echo "\u{2503}    \u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            echo "\n\n\n";
            break;
        case 6:
            echo "😭 JUEGO DEL AHORCADO 😭\n\n";
            echo "\u{250F}\u{2501}\u{2501}\u{2501}\u{2501}\u{2513} \u{1F480}\n";
            echo "\u{2503}   \u{256D}\u{2538}\u{256E}\n";
            echo "\u{2503}   \u{2570}\u{2530}\u{256F}\n";
            echo "\u{2503}  \u{2501}\u{2501}\u{254B}\u{2501}\u{2501}\n";
            echo "\u{2503}    \u{2503}\n";
            echo "\u{2503}   \u{250F}\u{253B}\u{2513}\n";
            echo "\u{2503}   \u{2503} \u{2503}\n";
            echo "\u{2503}\n";
            echo "\u{253B}\u{2501}\u{2501}\n";
            break;
    }
}

// Inicializamos el juego
$possibleWords = [
    'BEBIDA', 'PRISMA', 'ALA', 'DOLOR', 'PILOTO', 'BALDOSA', 'NUEVO', 'TERREMOTO', 'ASTEROIDE', 'GALLO', 'PLATZI', 'ERIZO', 'RED', 'TARRO', 'PARA', 'COMIDA', 'MICHI', 'GATOS', 'ARTE', 'GLOSARIO', 'DESARROLLO', 'FILOSOFIA', 'AEROPUERTO', 'CARPA', 'QUINQUE', 'ALARIDO', 'RIZAR', 'GUERRA', 'AGUA', 'AZAFATA', 'SOMETIDO', 'GUIRNALDA', 'GRANDE', 'TRAPECIO', 'TELEFONO', 'PIZCA', 'CIRROSIS', 'ARENA',
];
define('MAX_ATTEMPTS', 6);

do {
    $choosenWord       = $possibleWords[rand(0, count($possibleWords) - 1)];
    $choosenWord       = strtoupper($choosenWord);
    $wordLength        = strlen($choosenWord);
    $discoveredLetters = str_pad('', $wordLength, '_');
    $attempts          = 0;
    do {
        echo PHP_OS === 'WINNT' ? `cls` : `clear`;
        showAhorcado($attempts);

        echo "Adivina la palabra de $wordLength letras.\n\n";
        echo 'Te quedan '.MAX_ATTEMPTS - $attempts." intentos.\t";
        echo $discoveredLetters."\n\n";

        $playerLetter = readline('Escribe una letra: ');
        $playerLetter = substr($playerLetter, 0, 1);
        $playerLetter = strtoupper($playerLetter);

        if (str_contains($choosenWord, $playerLetter)) {
            $offset = 0;
            // Verificar ocurrencias de la letra para reemplazarla
            while (($letterPosition = strpos($choosenWord, $playerLetter, $offset)) !== false) {
                echo $letterPosition."\n";
                $discoveredLetters[$letterPosition] = $playerLetter;
                $offset                             = $letterPosition + 1;
            }
        } else {
            $attempts++;
        }
    }
    while ($attempts < 6 && str_contains($discoveredLetters, '_'));

    echo PHP_OS === 'WINNT' ? `cls` : `clear`;
    showAhorcado($attempts);
    if ($attempts == 6) {
        echo "\n\nYa no tienes intentos restantes.\n";
        echo 'La palabra por encontrar era '.$choosenWord;
    } else {
        echo "\n¡Ganaste! (Intentos restantes: ".MAX_ATTEMPTS - $attempts.")\n";
        echo 'Hallaste la palabra, es: '.$choosenWord;
    }
    echo "\n\n";

    do {
        $continueGame = readLine('¿Deseas jugar de nuevo (S/N)?: ');
        $continueGame = strtoupper($continueGame);
    } while (!($continueGame === 'S' || $continueGame === 'N'));
} while ($continueGame === 'S');

echo "\n\n";
