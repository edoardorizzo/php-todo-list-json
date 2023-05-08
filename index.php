<?php
$todos = [
    'Dormire',
    'Fare la spesa',
];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $new_todo = $_POST['todo'];
  if ($new_todo) {
    array_push($todos, $new_todo); // aggiungi il nuovo todo all'inizio dell'array
  }
}

?>

<!DOCTYPE html>
<html>
<head>
  <title>Todo List</title>
</head>
<body>
  <h1>Todo List</h1>
  <form method="post">
    <label for="todo">Nuovo Todo:</label>
    <input type="text" name="todo" id="todo">
    <button type="submit">Aggiungi</button>
  </form>
  <ul>
    <?php foreach ($todos as $todo) { ?>
      <li><?= $todo ?></li>
    <?php } ?>
  </ul>
</body>
</html>
