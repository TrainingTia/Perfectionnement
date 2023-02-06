<?php

// Déclaration des variables pour stocker les opérandes et l'opération
$operand1 = 0;
$operand2 = 0;
$operation = '';

// Vérifie si l'utilisateur a soumis le formulaire
if (isset($_POST['submit'])) {
    // Récupère les opérandes et l'opération depuis le formulaire
    $operand1 = $_POST['operand1'];
    $operand2 = $_POST['operand2'];
    $operation = $_POST['operation'];

    // Effectue l'opération en fonction de la valeur de $operation
    switch ($operation) {
        case 'add':
            $result = $operand1 + $operand2;
            break;
        case 'subtract':
            $result = $operand1 - $operand2;
            break;
        case 'multiply':
            $result = $operand1 * $operand2;
            break;
        case 'divide':
            $result = $operand1 / $operand2;
            break;
    }
}

?>

<!-- Formulaire HTML pour saisir les opérandes et l'opération -->
<form action="" method="post">
    <input type="text" name="operand1" value="<?php echo $operand1; ?>">
    <select name="operation">
        <option value="add" <?php if ($operation == 'add') echo 'selected'; ?>>+</option>
        <option value="subtract" <?php if ($operation == 'subtract') echo 'selected'; ?>>-</option>
        <option value="multiply" <?php if ($operation == 'multiply') echo 'selected'; ?>>*</option>
        <option value="divide" <?php if ($operation == 'divide') echo 'selected'; ?>>/</option>
    </select>
    <input type="text" name="operand2" value="<?php echo $operand2; ?>">
    <input type="submit" name="submit" value="Calculer">
</form>

<!-- Affiche le résultat de l'opération -->
<?php if (isset($result)) echo 'Résultat : ' . $result; ?>
