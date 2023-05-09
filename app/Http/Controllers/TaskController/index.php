<?php
  $tasksJsonString = file_get_contents("../../../../assets/data/tasks.json");
  header('Content-Type: application/json');
  echo $tasksJsonString;