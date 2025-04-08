<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validación de campos
    $author = htmlspecialchars($_POST['author']);
    $title = htmlspecialchars($_POST['title']);
    $edition = htmlspecialchars($_POST['edition']);
    $publication_place = htmlspecialchars($_POST['publication_place']);
    $editorial = htmlspecialchars($_POST['editorial']);
    $year = htmlspecialchars($_POST['year']);
    $pages = htmlspecialchars($_POST['pages']);
    $notes = htmlspecialchars($_POST['notes']);
    $isbn = htmlspecialchars($_POST['isbn']);

    // Crear un objeto libro
    $book = [
        'author' => $author,
        'title' => $title,
        'edition' => $edition,
        'publication_place' => $publication_place,
        'editorial' => $editorial,
        'year' => $year,
        'pages' => $pages,
        'notes' => $notes,
        'isbn' => $isbn
    ];

    // Verificar si estamos editando un libro existente
    if (isset($_SESSION['edit_index'])) {
        $index = $_SESSION['edit_index'];
        $_SESSION['books'][$index] = $book;
        unset($_SESSION['edit_index']);
        unset($_SESSION['edit_book']);
        header("Location: display.php?updated=1");
    } else {
        // Almacenar el libro en la sesión
        if (!isset($_SESSION['books'])) {
            $_SESSION['books'] = [];
        }
        $_SESSION['books'][] = $book;
        header("Location: display.php?added=1");
    }
    
    exit();
}
?>