<?php
session_start();

if (!isset($_GET['index']) || !isset($_SESSION['books'][$_GET['index']])) {
    header("Location: display.php");
    exit();
}

$index = $_GET['index'];
$book = $_SESSION['books'][$index];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Libro</title>
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
        .book-detail {
            margin-bottom: 20px;
        }
        .detail-label {
            font-weight: bold;
            color: #495057;
        }
        .detail-value {
            color: #212529;
        }
        .btn-back {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-book"></i> Detalles del Libro</h1>
        
        <div class="row">
            <div class="col-md-6">
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-user-tie"></i> Autor:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['author']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-heading"></i> Título:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['title']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-superscript"></i> Edición:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['edition']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-map-marker-alt"></i> Lugar de Publicación:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['publication_place']); ?></p>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-print"></i> Editorial:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['editorial']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-calendar-alt"></i> Año de Edición:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['year']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-file-alt"></i> Páginas:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['pages']); ?></p>
                </div>
                
                <div class="book-detail">
                    <p class="detail-label"><i class="fas fa-barcode"></i> ISBN:</p>
                    <p class="detail-value"><?php echo htmlspecialchars($book['isbn']); ?></p>
                </div>
            </div>
        </div>
        
        <?php if (!empty($book['notes'])): ?>
            <div class="book-detail">
                <p class="detail-label"><i class="fas fa-sticky-note"></i> Notas:</p>
                <p class="detail-value"><?php echo nl2br(htmlspecialchars($book['notes'])); ?></p>
            </div>
        <?php endif; ?>
        
        <div class="text-center">
            <a href="display.php" class="btn btn-primary btn-back">
                <i class="fas fa-arrow-left"></i> Volver a la lista
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>