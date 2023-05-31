<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Formulario PHP</title>
</head>
<body>
<div class="form">
    <h2>Formulario de Registro</h2>
    <form method="POST" action="">
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" required class="input"><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" id="apellido" name="apellido" required class="input"><br><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required class="input"><br><br>

        <input type="submit" name="submit" value="Enviar" class="btn">


        <?php
            if($_POST){
                $nombre = $_POST['nombre'];
                $apellido = $_POST['apellido'];
                $email = $_POST['email'];
            

            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "cursosql";

            $con = new mysqli($servername, $username, $password, $dbname);

            if ($con->connect_error) {
                die("Connection failed: " . $con->connect_error);
            }

            $sql = "INSERT INTO usuario (nombre, apellido, email)
            VALUES ('$nombre', '$apellido', '$email')";

            if ($con->query($sql)===TRUE) {
                echo "New record created successfully";
            }else{
                echo "Error " . $sql . "<br>" . $con->error;
            }
        
            $con->close();
        }

        ?>
    </form>
</div>
</body>
</html>
