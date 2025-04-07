<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>DP2 E1A</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-dark text-light p-4">
        <div class="container">
            <h2 class="text-center mb-4">Alumnos inscritos en la academia de idiomas</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Matrices asociativas
                $matriz = array(
                    "Básico" => array(0 => 25, 1 => 10, 2 => 8, 3 => 12, 4 => 30, 5 => 90),
                    "Intermedio" => array(0 => 15, 1 => 5, 2 => 4, 3 => 8, 4 => 15, 5 => 25),
                    "Avanzado" => array(0 => 10, 1 => 2, 2 => 1, 3 => 4, 4 => 10, 5 => 67)
                );
                
                $idiomas = array(
                    0 => "Inglés",
                    1 => "Francés",
                    2 => "Mandarín",
                    3 => "Ruso",
                    4 => "Portugués",
                    5 => "Japonés"
                );
                
                $clases_nivel = [
                    "Básico" => "table-success",
                    "Intermedio" => "table-warning text-dark",
                    "Avanzado" => "table-danger"
                ];
                
                function mostrarTablas($matriz, $idiomas, $clases_nivel) {
                    foreach ($idiomas as $indice => $idioma) {
                        echo "<div class='col'>";
                        echo "<div class='card bg-secondary text-white'>";
                        echo "<div class='card-header text-center fw-bold bg-primary'>$idioma</div>";
                        echo "<div class='card-body p-0'>";
                        echo "<table class='table table-bordered table-dark mb-0'><tbody>";
                        foreach ($matriz as $nivel => $valores) {
                            $valor = $valores[$indice];
                            $clase = $clases_nivel[$nivel];
                            echo "<tr class='$clase'><td>$nivel</td><td>$valor</td></tr>";
                        }
                        echo "</tbody></table></div></div></div>";
                    }
                }
                mostrarTablas($matriz, $idiomas, $clases_nivel);
                ?>
            </div>
        </div>
    </body>
</html>

