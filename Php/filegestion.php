<?php
// classe pour gérer les fichiers
class FileManager {
    // chemin vers le répertoire où les fichiers seront stockés
    private $directory;

    // constructor pour initialiser le chemin de répertoire
    public function __construct($dir) {
        $this->directory = $dir;
    }

    // méthode pour uploader un fichier
    public function upload($file) {
        // vérifier si le fichier existe
        if (!isset($file) || $file['error'] == UPLOAD_ERR_NO_FILE) {
            throw new Exception("Aucun fichier n'a été trouvé.");
        }

        // déplacer le fichier uploadé vers le répertoire cible
        if (!move_uploaded_file($file['tmp_name'], $this->directory . '/' . $file['name'])) {
            throw new Exception("Impossible de déplacer le fichier vers le répertoire cible.");
        }
    }

    // méthode pour afficher la liste des fichiers dans le répertoire
    public function listFiles() {
        // vérifier si le répertoire existe
        if (!is_dir($this->directory)) {
            throw new Exception("Le répertoire n'existe pas.");
        }

        // ouvrir le répertoire et lister les fichiers
        $files = [];
        if ($handle = opendir($this->directory)) {
            while (false !== ($entry = readdir($handle))) {
                if ($entry != "." && $entry != "..") {
                    $files[] = $entry;
                }
            }
            closedir($handle);
        }
        return $files;
    }

    // méthode pour télécharger un fichier
    public function download($fileName) {
        // vérifier si le fichier existe
        if (!file_exists($this->directory . '/' . $fileName)) {
            throw new Exception("Le fichier n'existe pas.");
        }

        // configurer les entêtes pour le téléchargement
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="' . $fileName . '"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($this->directory . '/' . $fileName));

        // lire le fichier et l'envoyer au client
        readfile($this->directory . '/' . $fileName);
        exit;
    }

    // méthode pour supprimer un fichier
    // public function delete($fileName) {
    //     // vérifier si le fichier existe
    //     if (!file_ex)
    
};
