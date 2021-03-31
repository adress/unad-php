<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>unad</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>

    <?php
    $mysqli = new mysqli("localhost", "jaime", "unad123", "unad");

    /* comprobar la conexión. */
    if (mysqli_connect_errno()) {
        printf("Error de conexión: %s\n", mysqli_connect_error());
        exit();
    }

    if (isset($_GET['nombre']) and isset($_GET['apellido'])){
        $nombre = $_GET["nombre"];
        $apellido = $_GET["apellido"];
        $query = "INSERT INTO personas (nombre, apellido) VALUES ('$nombre', '$apellido')";
        $mysqli->query($query);
        header("Location: lista.php");
        exit();
    }
    ?>
    <a class="btn btn-primary" style="margin: 2em; position: relative" href="index.php" role="button">Regresar</a>
    <div class="container-fluid" style="padding: 4em; position: relative; margin-top: -3em;">
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($resultado = $mysqli->query("SELECT * FROM personas")) {
                    /* fetch associative array */

                    while ($row = $resultado->fetch_assoc()) {
                        print("<tr>\n");
                        printf("<th scope='col'>%s</th>\n", $row["id"]);
                        printf("<td>%s</td>\n", $row["nombre"]);
                        printf("<td>%s</td>\n", $row["apellido"]);
                        print("</tr>\n");
                    }
                    /* free result set */
                    $resultado->close();
                }
                ?>
            </tbody>
        </table>
    </div>


    <?php
    /* close connection */
    $mysqli->close();
    ?>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
</body>

</html>