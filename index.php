<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Ingreso de Libros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        body {
            background-color: #f8f9fa;
            padding-top: 20px;
            padding-bottom: 20px;
        }
        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #343a40;
            margin-bottom: 30px;
            text-align: center;
        }
        .form-header {
            background-color: #007bff;
            color: white;
            padding: 15px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 500;
        }
        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px;
            font-weight: 500;
        }
        .btn-primary:hover {
            background-color: #0069d9;
        }
        .btn-secondary {
            background-color: #6c757d;
            border: none;
        }
        .btn-danger {
            background-color: #dc3545;
            border: none;
        }
        .card {
            margin-bottom: 20px;
            border: none;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card-header {
            background-color: #f8f9fa;
            font-weight: 500;
        }
        .input-group-text {
            background-color: #e9ecef;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="form-header">
            <h1><i class="fas fa-book-open"></i> Ingreso de Libros</h1>
        </div>
        
        <form action="process.php" method="POST">
            <div class="row">
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-user-edit"></i> Información del Autor
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="author"><i class="fas fa-user-tie"></i> Autor:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="author" name="author" required 
                                           pattern="^[A-Za-zÁÉÍÓÚáéíóúñÑ\s,]+$" 
                                           title="Formato: APELLIDOS, Nombre (solo letras y comas)">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-book"></i> Información del Libro
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title"><i class="fas fa-heading"></i> Título del Libro:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-font"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="title" name="title" required 
                                           pattern="^[A-Za-zÁÉÍÓÚáéíóúñÑ0-9\s.,;:¡!¿?\-()]+$" 
                                           title="No usar comillas, solo caracteres válidos">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="edition"><i class="fas fa-superscript"></i> Número de Edición:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-list-ol"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="edition" name="edition" required 
                                           pattern="^\d+$" title="Solo números">
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="pages"><i class="fas fa-file-alt"></i> Número de Páginas:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-file"></i></span>
                                    </div>
                                    <input type="number" class="form-control" id="pages" name="pages" required min="1">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-md-6">
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-building"></i> Información de Publicación
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="publication_place"><i class="fas fa-map-marker-alt"></i> Lugar de Publicación:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-city"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="publication_place" name="publication_place" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="editorial"><i class="fas fa-print"></i> Editorial:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-industry"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="editorial" name="editorial" required>
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label for="year"><i class="fas fa-calendar-alt"></i> Año de Edición:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-clock"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="year" name="year" required 
                                           pattern="^\d{4}$" title="Formato: AAAA (4 dígitos)">
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card mb-3">
                        <div class="card-header">
                            <i class="fas fa-info-circle"></i> Información Adicional
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <label for="notes"><i class="fas fa-sticky-note"></i> Notas:</label>
                                <textarea class="form-control" id="notes" name="notes" rows="3"></textarea>
                            </div>
                            
                            <div class="form-group">
                                <label for="isbn"><i class="fas fa-barcode"></i> ISBN:</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="fas fa-hashtag"></i></span>
                                    </div>
                                    <input type="text" class="form-control" id="isbn" name="isbn" required 
                                           pattern="^(97(8|9))?\d{9}(\d|X)$" 
                                           title="Formato: 13 dígitos, puede empezar con 978 o 979">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary btn-lg">
                    <i class="fas fa-save"></i> Guardar Libro
                </button>
                <a href="display.php" class="btn btn-secondary btn-lg ml-3">
                    <i class="fas fa-list"></i> Ver Libros
                </a>
            </div>
        </form>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>