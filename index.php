<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <title>Booking</title>
</head>
<body>

<div class="container">
    <p class="form-title1">Registrar Clase Demo</p>    

    <div class="form-container">

        <form class="form" action="send-data.php" method="POST">

            <label class="form-label">Nombre</label>
            <input class="form-field" name="nombre" type="text" placeholder="Participante" required>

            <label class="form-label">Fecha</label>
            <input class="form-field" name="fecha" type="date" required>

            <label class="form-label">Hora</label>
            <input class="form-field" name="hora" type="time" required>

            <label class="form-label">Capacidad</label>
            <select  class="form-field" name="tipo" required>
                <option value="bike">bike</option>
                <option value="ems">ems</option>
            </select>

            <input class="form-btn" type="submit" value="Registrar Clase" />
        </form>
    </div>
</div>
    
</body>
</html>