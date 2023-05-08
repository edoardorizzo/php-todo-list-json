<?php
// Verifica se il form è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Verifica se il campo task è stato compilato
    if (!empty($_POST['task'])) {
        // Apre il file JSON per la scrittura
        $file = 'tasks.json';
        $data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];
        
        // Aggiunge il task al file JSON
        $data[] = $_POST['task'];
        file_put_contents($file, json_encode($data));
    }
}

// Legge i task dal file JSON
$file = 'tasks.json';
$data = file_exists($file) ? json_decode(file_get_contents($file), true) : [];

// Stampa i task
echo '<ul>';
foreach ($data as $task) {
    echo '<li>' . htmlspecialchars($task) . '</li>';
}
echo '</ul>';
?>
