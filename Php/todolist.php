<!DOCTYPE html>
<html>
  <head>
    <title>To-Do List</title>
  </head>
  <body>
    <!-- Affichage du titre de l'application -->
    <h1>To-Do List</h1>
    
    <!-- Formulaire pour ajouter une tâche -->
    <form action="" method="post">
      <!-- Champ de saisie pour la tâche -->
      <input type="text" name="task">
      <!-- Bouton pour soumettre la tâche -->
      <input type="submit" value="Add Task">
    </form>
    
    <!-- Affichage de la liste des tâches -->
    <ul>
      <?php 
        // Vérification de l'existence de la tâche dans les données postées
        if (isset($_POST['task'])) {
          // Stockage de la tâche dans une variable
          $task = $_POST['task'];
          // Affichage de la tâche
          echo "<li>$task</li>";
        }
      ?>
    </ul>
  </body>
</html>
