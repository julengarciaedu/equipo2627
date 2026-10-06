<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="equipo.css" />
    <title>Dora Calculadora</title>
</head>
<body>
    <h1>Dora Calculadora</h1>
    <p>Introduce dos números y elige la operación que quieres realizar</p>
    <form action="calculadorabotonesservice.php" method="POST">
        <label>Primer operando: </label>
        <input type="number" name="oper1" required>
        <label>Segundo operando: </label>
        <input type="number" name="oper2" required>
        <button type="submit" name="boton" value="1">+</button>
        <button type="submit" name="boton" value="2">-</button><br>
        <button type="submit" name="boton" value="3">*</button>
        <button type="submit" name="boton" value="4">/</button>
        <label>Resultado</label>
        <input type="text" disabled>    
    </form>  
</body>
</html>