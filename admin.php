<?php
session_start();

// Initialiser les publications
if (!isset($_SESSION['publications'])) {
    $_SESSION['publications'] = [];
}

// Vérifiez si le formulaire a été soumis
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'] ?? '';
    $content = $_POST['content'] ?? '';
    $image = $_FILES['image'] ?? null;
    $video = $_FILES['video'] ?? null;

    // Validation simple des champs
    $errors = [];
    if (empty($title)) {
        $errors[] = 'Le titre est requis.';
    }
    if (empty($content)) {
        $errors[] = 'Le texte est requis.';
    }
    if (empty($image['name'])) {
        $errors[] = 'Veuillez choisir une image.';
    } else {
        $allowedImageTypes = ['image/jpeg', 'image/png', 'image/gif'];
        if (!in_array($image['type'], $allowedImageTypes)) {
            $errors[] = 'Le fichier image doit être au format JPEG, PNG ou GIF.';
        }
    }

    // Ne pas valider la vidéo si elle n'est pas fournie
    if (!empty($video['name'])) {
        $allowedVideoTypes = ['video/mp4', 'video/avi', 'video/mov'];
        if (!in_array($video['type'], $allowedVideoTypes)) {
            $errors[] = 'Le fichier vidéo doit être au format MP4, AVI ou MOV.';
        }
    }

    // Si pas d'erreurs, téléchargez les fichiers et ajoutez la publication
    if (empty($errors)) {
        // Chemins de sauvegarde
        $uploadDir = 'uploads/';
        $imageFilePath = $uploadDir . basename($image['name']);
        $videoFilePath = !empty($video['name']) ? $uploadDir . basename($video['name']) : null;

        // Déplacez les fichiers téléchargés
        if (move_uploaded_file($image['tmp_name'], $imageFilePath)) {
            // Si une vidéo est fournie, déplacez-la aussi
            if (!empty($video['name'])) {
                move_uploaded_file($video['tmp_name'], $videoFilePath);
            }

            // Ajoutez la publication à la session
            $_SESSION['publications'][] = [
                'title' => htmlspecialchars($title),
                'content' => nl2br(htmlspecialchars($content)),
                'image' => htmlspecialchars($imageFilePath),
                'video' => $videoFilePath ? htmlspecialchars($videoFilePath) : null, // Stockez null si pas de vidéo
            ];
            $successMessage = 'Publication réussie !';
        } else {
            $errorMessage = 'Erreur lors du téléchargement de l\'image.';
        }
    } else {
        // Affichez les erreurs
        $errorMessage = implode('<br>', array_map('htmlspecialchars', $errors));
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administration - Publication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }
        button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 4px;
            color: #fff;
            cursor: pointer;
        }
        button:hover {
            background-color: #0056b3;
        }
        .logout-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px;
            background-color: #dc3545;
            color: white;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        .logout-button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Publier une Photo et une Vidéo</h2>
    <form id="publishForm" enctype="multipart/form-data" action="admin.php" method="post">
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" id="title" name="title" required>
        </div>
        <div class="form-group">
            <label for="image">Choisir une photo</label>
            <input type="file" id="image" name="image" accept="image/*" required>
        </div>
        <div class="form-group">
            <label for="video">Choisir une vidéo (optionnel)</label>
            <input type="file" id="video" name="video" accept="video/*">
        </div>
        <div class="form-group">
            <label for="content">Texte</label>
            <textarea id="content" name="content" rows="4" required></textarea>
        </div>
        <button type="submit">Publier</button>
        <p><a href="index.php"> Retour à l'accueil</a></p>
    </form>

    <!-- Affichage des messages après publication -->
    <?php if (isset($successMessage)): ?>
        <div style="color: green;"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <?php if (isset($errorMessage)): ?>
        <div style="color: red;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>

    <!-- Bouton de déconnexion -->
    <a href="logout.php" class="logout-button">Déconnexion</a>
</div>

</body>
</html>