<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <title>DP2 E1C</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body class="bg-dark text-light p-4">
        <div class="container">
            <h2 class="text-center mb-4">Alumnos inscritos en la academia de idiomas</h2>
            <div class="row row-cols-1 row-cols-md-3 g-4">
                <?php
                // Multidimensional asociativo
                $matriz = [
                    "Básico" => ["Inglés" => 25, "Francés" => 10, "Mandarín" => 8, "Ruso" => 12, "Portugués" => 30, "Japonés" => 90],
                    "Intermedio" => ["Inglés" => 15, "Francés" => 5, "Mandarín" => 4, "Ruso" => 8, "Portugués" => 15, "Japonés" => 25],
                    "Avanzado" => ["Inglés" => 10, "Francés" => 2, "Mandarín" => 1, "Ruso" => 4, "Portugués" => 10, "Japonés" => 67]
                ];
                
                $clases_nivel = [
                    "Básico" => "table-success",
                    "Intermedio" => "table-warning text-dark",
                    "Avanzado" => "table-danger"
                ];

                function mostrarTablas($matriz, $clases_nivel) {
                    $idiomas = array_keys($matriz["Básico"]);
                    $niveles = array_keys($matriz);
                    
                    foreach ($idiomas as $idioma) {
                        echo "<div class='col'>";
                        echo "<div class='card bg-secondary text-white'>";
                        echo "<div class='card-header text-center fw-bold bg-primary'>$idioma</div>";
                        echo "<div class='card-body p-0'>";
                        echo "<table class='table table-bordered table-dark mb-0'>";
                        echo "<tbody>";
                        foreach ($niveles as $nivel) {
                            $clase = $clases_nivel[$nivel];
                            $valor = $matriz[$nivel][$idioma];
                            echo "<tr class='$clase'><td>$nivel</td><td>$valor</td></tr>";
                        }
                        echo "</tbody></table></div></div></div>";
                    }
                }
                mostrarTablas($matriz, $clases_nivel);
                ?>
            </div>
        </div>
    </body>
</html>