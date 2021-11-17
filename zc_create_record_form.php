<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/estilos.css"/>
    <title>ZC REST API</title>
</head>
<body>

    <?php include "nav.html"?>

    <div class="container">
        <p class="form-title1">Registrar Usuario</p>    
        <div class="form-container">
            <form class="form" action="zc_create_record.php" method="POST">

                <div class="form-group">
                    <label class="form-label">Access Token</label>
                    <input class="form-field" name="access_token" type="text" placeholder="" />
                </div>
            
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input class="form-field" name="nombre" type="text" placeholder="" />
                </div>

                <div class="form-group">
                    <label class="form-label">Correo</label>
                    <input class="form-field" name="correo" type="text" placeholder="" />
                </div>

                <div class="form-group">
                    <label class="form-label">Suscripcion</label>
                    <select  class="form-field" name="suscripcion" required>
                        <option value="DEMO">DEMO</option>
                        <option value="BASE">BASE</option>
                        <option value="PREMIUM">PREMIUM</option>
                </select>
                </div>

                <input class="form-btn" type="submit" value="Registrar Usuario" />
            </form>
        <div>
        
    </div>
    

</body>
</html>