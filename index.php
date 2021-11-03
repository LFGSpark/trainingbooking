<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking</title>
</head>
<body>
    <h1>Book a demo class</h1>

    <div class="container"></div>

    <form action="send-data.php" method="POST">
        <label>Fecha</label>
        <input name="fecha" type="date">

        <label>Hora</label>
        <input name="hora" type="time">

        <label>Capacidad</label>
        <select name="tipo">
            <option value="bike">bike</option>
            <option value="ems">ems</option>
        </select>

        <label>Capacidad</label>
        <input name="capacidad" type="number">

        <input type="submit">
    </form>

    </div>
</body>
</html>