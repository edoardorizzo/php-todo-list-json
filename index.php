<!DOCTYPE html>
<html>

<head>
    <title>Todo List</title>
</head>

<body>
    <h1>Todo List</h1>
    <form method="post">
        <label for="task">Task:</label>
        <input type="text" name="task" id="task">
        <button type="submit">Aggiungi</button>
    </form>

    <?php
    // Verificare se il form è stato inviato
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Verificare se il campo task è stato compilato
        if (!empty($_POST['task'])) {
            // Aprire il file JSON per la scrittura
            $file = 'tasks.json';
            $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

            // Aggiungere il task al file JSON
            $data[] = $_POST['task'];
            file_put_contents($file, json_encode($data));
        }
    }

    // Leggere i task dal file JSON
    $file = 'tasks.json';
    $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

    // Stampare i task
    if (!empty($data)) {
        echo '<h2>Task:</h2>';
        echo '<ul>';
        foreach ($data as $task) {
            echo '<li>' . htmlspecialchars($task) . '</li>';
        }
        echo '</ul>';
    } else {
        echo '<p>Non ci sono task da mostrare.</p>';
    }
    ?>
</body>

</html>