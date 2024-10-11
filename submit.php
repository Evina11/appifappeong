<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Récupérer les données du formulaire
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $imagePath = '';

    // Gérer l'image si elle est téléchargée
    if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
        $uploadsDir = 'uploads/'; // Dossier pour enregistrer les images
        $imageName = basename($_FILES['image']['name']);
        $imagePath = $uploadsDir . $imageName;

        // Déplacer le fichier téléchargé vers le dossier
        move_uploaded_file($_FILES['image']['tmp_name'], $imagePath);
    }

    // Chemin vers publications.html
    $publicationsFilePath = 'path/to/index.html'; // Remplace par le chemin correct

    // Créer une nouvelle entrée de contenu
    $newContent = '<div class="post">';
    $newContent .= '<h3>' . $title . '</h3>';
    $newContent .= '<p>' . $content . '</p>';
    if ($imagePath) {
        $newContent .= '<img src="' . $imagePath . '" alt="' . $title . '" style="max-width: 100%;">';
    }
    $newContent .= '</div>';

    // Ajouter le nouveau contenu à publications.html
    file_put_contents($publicationsFilePath, $newContent, FILE_APPEND);

    // Rediriger vers admin.html ou afficher un message de succès
    header('Location: index.html');
    exit;
}
?>
