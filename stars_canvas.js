var d = document.getElementById("dibujito");;
var lienzo = d.getContext("2d");
var colorPrimario = "#AAF";
var dw = d.width;
var dh = d.height;

dibujarEstrella(colorPrimario, 200, 200, 400, 40);
dibujarEstrella(colorPrimario, 200, 600, 400, 40);
dibujarEstrella(colorPrimario, 600, 200, 400, 40);
dibujarEstrella(colorPrimario, 600, 600, 400, 40);
dibujarEstrella("red", 400, 400, 600, 60);

function dibujarEstrella(color, xCentro, yCentro, ancho, lineas) {
    var mid_ancho = ancho / 2;
    var Di = mid_ancho / lineas;
    var notModZero = mid_ancho % lineas !== 0;
    var notEnoughWidth = ancho > (xCentro * 2);
    var notEnoughHeight = ancho > (yCentro * 2);
    var notEnoughCanvas = ancho > dw || ancho > dh;

    if (notModZero || notEnoughWidth || notEnoughHeight || notEnoughCanvas) {
        dibujarLinea("red", xCentro, yCentro, xCentro + mid_ancho, yCentro + mid_ancho);
        dibujarLinea("red", xCentro, yCentro, xCentro - mid_ancho, yCentro + mid_ancho);
        dibujarLinea("red", xCentro, yCentro, xCentro + mid_ancho, yCentro - mid_ancho);
        dibujarLinea("red", xCentro, yCentro, xCentro - mid_ancho, yCentro - mid_ancho);
    } else {
        for (i = 0; i < mid_ancho; i += Di) {
            xi = xCentro;
            yi = yCentro - (i + Di);
            xf = xCentro + mid_ancho - i;
            yf = yCentro;
            dibujarLinea(color, xi, yi, xf, yf);
            xi = xCentro + (i + Di);
            yi = yCentro;
            xf = xCentro;
            yf = yCentro + mid_ancho - i;
            dibujarLinea(color, xi, yi, xf, yf);
            xi = xCentro - (i + Di);
            yi = yCentro;
            xf = xCentro;
            yf = yCentro + mid_ancho - i;
            dibujarLinea(color, xi, yi, xf, yf);
            xi = xCentro;
            yi = yCentro - (i + Di);
            xf = xCentro - mid_ancho + i;
            yf = yCentro;
            dibujarLinea(color, xi, yi, xf, yf);
        }
        dibujarLinea(color, xCentro, yCentro, xCentro + mid_ancho, yCentro);
        dibujarLinea(color, xCentro, yCentro, xCentro - mid_ancho, yCentro);
        dibujarLinea(color, xCentro, yCentro, xCentro, yCentro + mid_ancho);
        dibujarLinea(color, xCentro, yCentro, xCentro, yCentro - mid_ancho);
    }
}

function dibujarLinea(color, xInicial, yInicial, xFinal, yFinal) {
    lienzo.beginPath();
    lienzo.strokeStyle = color;
    lienzo.moveTo(xInicial, yInicial);
    lienzo.lineTo(xFinal, yFinal);
    lienzo.stroke();
    lienzo.closePath();
}

function dibujarCuadrado(color, xInicial, yInicial, lado) {
    dibujarLinea(color, xInicial, yInicial, xInicial, yInicial + lado);
    dibujarLinea(color, xInicial, yInicial + lado, xInicial + lado, yInicial + lado);
    dibujarLinea(color, xInicial + lado, yInicial + lado, xInicial + lado, yInicial);
    dibujarLinea(color, xInicial + lado, yInicial, xInicial, yInicial);
}
