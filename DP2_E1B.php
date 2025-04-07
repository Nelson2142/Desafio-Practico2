<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>DP2 E1B</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-dark text-light p-4">
        <div class="container">
            <h2 class="text-center mb-4">Alumnos inscritos en la academia de idiomas</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Multidimensional anidado
                $matriz = array(
                    array(25, 10, 8, 12, 30, 90),
                    array(15, 5, 4, 8, 15, 25),
                    array(10, 2, 1, 4, 10, 67)
                );
                $niveles = array("Básico", "Intermedio", "Avanzado");
                $idiomas = array("Inglés", "Francés", "Mandarín", "Ruso", "Portugués", "Japonés");
                
                $clases_nivel = [
                    "Básico" => "table-success",
                    "Intermedio" => "table-warning text-dark",
                    "Avanzado" => "table-danger"
                ];
                
                function mostrarTablas($matriz, $niveles, $idiomas, $clases_nivel) {
                    for ($i = 0; $i < count($idiomas); $i++) {
                        echo "<div class='col'>";
                        echo "<div class='card bg-secondary text-white'>";
                        echo "<div class='card-header text-center fw-bold bg-primary'>{$idiomas[$i]}</div>";
                        echo "<div class='card-body p-0'>";
                        echo "<table class='table table-bordered table-dark mb-0'><tbody>";
                        for ($j = 0; $j < count($niveles); $j++) {
                            $nivel = $niveles[$j];
                            $valor = $matriz[$j][$i];
                            $clase = $clases_nivel[$nivel];
                            echo "<tr class='$clase'><td>$nivel</td><td>$valor</td></tr>";
                        }
                        echo "</tbody></table></div></div></div>";
                    }
                }
                mostrarTablas($matriz, $niveles, $idiomas, $clases_nivel);
                ?>
            </div>
        </div>
    </body>
</html>