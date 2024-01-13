function sumar() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(num1) || isNaN(num2)) {
        alert("Por favor, ingrese números válidos en ambas cajas.");
        return;
    }
    var resultado = num1 + num2;
    document.getElementById("resultado").textContent = resultado;
}

function restar() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(num1) || isNaN(num2)) {
        alert("Por favor, ingrese números válidos en ambas cajas.");
        return;
    }
    var resultado = num1 - num2;
    document.getElementById("resultado").textContent = resultado;
}

function multiplicar() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(num1) || isNaN(num2)) {
        alert("Por favor, ingrese números válidos en ambas cajas.");
        return;
    }
    var resultado = num1 * num2;
    document.getElementById("resultado").textContent = resultado;
}

function dividir() {
    var num1 = parseFloat(document.getElementById("numero1").value);
    var num2 = parseFloat(document.getElementById("numero2").value);

    if (isNaN(num1) || isNaN(num2)) {
        alert("Por favor, ingrese números válidos en ambas cajas.");
        return;
    }
    var resultado = num1 / num2;
    document.getElementById("resultado").textContent = resultado;
}