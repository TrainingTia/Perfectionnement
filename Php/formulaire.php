<!DOCTYPE html>
<html>
<head>
  <title>Formulaire de contact</title>
</head>
<body>

  <?php
    if (isset($_POST['submit'])) {
      $to = "your_email@example.com";
      $subject = $_POST['subject'];
      $message = $_POST['message'];
      $from = $_POST['email'];
      $headers = "From: $from";
      mail($to, $subject, $message, $headers);
      echo "Votre message a été envoyé avec succès";
    }
  ?>

  <form action="" method="post">
    <p>Adresse email: <input type="text" name="email" required /></p>
    <p>Sujet: <input type="text" name="subject" required /></p>
    <p>Message: <textarea name="message" rows="5" cols="40" required></textarea></p>
    <p><input type="submit" name="submit" value="Envoyer"></p>
  </form>

</body>
</html>
