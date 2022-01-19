//Modo estricto;
"use strict";
// El window.onload hace que Javascript espere a que cargue el HTML entero antes de ejecutarse.
window.onload = function() {

    var canvas = document.getElementById("canvas");
    var control = canvas.getContext("2d");
    control.fillStyle = "#5780ff";
    control.fillRect(60, 10, 100, 10);
    control.fillRect(75, 20, 70, 70);
    control.fillStyle = "#1e57ff";
    control.strokeRect(75, 20, 70, 70);
    control.strokeRect(60, 10, 100, 10);
    control.fillStyle = "#ee283c";
    control.fillRect(85, 35, 10, 10);
    control.fillRect(125, 35, 10, 10);
    control.fillStyle = "#eee350";
    control.fillRect(100, 50, 20, 40);

    var canvas2 = document.getElementById("canvas2");
    var control2 = canvas2.getContext("2d");
    control2.fillStyle = "#5780ff";
    control2.beginPath();
    control2.moveTo(110, 10);
    control2.lineTo(50, 60);
    control2.lineTo(170, 60);
    control2.closePath();
    control2.fill();
    control2.fillStyle = "#1e57ff";
    control2.moveTo(110, 10);
    control2.lineTo(50, 60);
    control2.lineTo(170, 60);
    control2.closePath();
    control2.stroke();

    control2.fillRect(75, 60, 70, 70);
    control2.fillStyle = "#1e57ff";
    control2.strokeRect(75, 60, 70, 70);
    control2.fillStyle = "#ee283c";
    control2.fillRect(85, 75, 10, 10);
    control2.fillRect(125, 75, 10, 10);
    control2.fillStyle = "#eee350";
    control2.fillRect(100, 90, 20, 40);

};
