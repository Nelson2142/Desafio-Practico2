<?php
session_start();

// Función para eliminar un libro
if (isset($_GET['delete'])) {
    $index = $_GET['delete'];
    if (isset($_SESSION['books'][$index])) {
        unset($_SESSION['books'][$index]);
        $_SESSION['books'] = array_values($_SESSION['books']); // Reindexar el array
        header("Location: display.php?deleted=1");
        exit();
    }
}

// Función para editar un libro
if (isset($_GET['edit'])) {
    $index = $_GET['edit'];
    if (isset($_SESSION['books'][$index])) {
        $_SESSION['edit_index'] = $index;
        $_SESSION['edit_book'] = $_SESSION['books'][$index];
        header("Location: index.php?edit=1");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Libros Ingresados</title>
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
        .table th {
            background-color: #007bff;
            color: white;
        }
        .table td {
            vertical-align: middle;
        }
        .action-buttons a {
            margin-right: 5px;
        }
        .alert {
            margin-bottom: 20px;
        }
        .btn-back {
            margin-top: 20px;
        }
        .empty-message {
            text-align: center;
            padding: 30px;
            color: #6c757d;
        }
        .empty-message i {
            font-size: 50px;
            margin-bottom: 15px;
            color: #dee2e6;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1><i class="fas fa-book"></i> Libros Registrados</h1>
        
        <?php if (isset($_GET['deleted']) && $_GET['deleted'] == 1): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>¡Libro eliminado!</strong> El libro ha sido eliminado correctamente.
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        <?php endif; ?>
        
        <?php if (isset($_SESSION['books']) && count($_SESSION['books']) > 0): ?>
            <div class="table-responsive">
                <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <tr>
                            <th>Autor</th>
                            <th>Título</th>
                            <th>Edición</th>
                            <th>Editorial</th>
                            <th>Año</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($_SESSION['books'] as $index => $book): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($book['author']); ?></td>
                                <td><?php echo htmlspecialchars($book['title']); ?></td>
                                <td><?php echo htmlspecialchars($book['edition']); ?></td>
                                <td><?php echo htmlspecialchars($book['editorial']); ?></td>
                                <td><?php echo htmlspecialchars($book['year']); ?></td>
                                <td class="action-buttons">
                                    <a href="detail.php?index=<?php echo $index; ?>" class="btn btn-info btn-sm" title="Ver detalles">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <a href="display.php?edit=<?php echo $index; ?>" class="btn btn-warning btn-sm" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="display.php?delete=<?php echo $index; ?>" class="btn btn-danger btn-sm" title="Eliminar" 
                                       onclick="return confirm('¿Estás seguro de que deseas eliminar este libro?');">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        <?php else: ?>
            <div class="empty-message">
                <i class="fas fa-book-open"></i>
                <h3>No hay libros registrados</h3>
                <p>Aún no has agregado ningún libro a la biblioteca.</p>
            </div>
        <?php endif; ?>
        
        <div class="text-center">
            <a href="index.php" class="btn btn-primary btn-back">
                <i class="fas fa-plus"></i> Agregar Nuevo Libro
            </a>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>