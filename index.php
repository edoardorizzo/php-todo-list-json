<!DOCTYPE html>
<html lang="en">
  
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="./assets/style/app.css">
    
    <title>To-Do List</title>
  </head>
  
  <body>
    
    <div id="app">
      
      <div class="container">
        <div class="w-50 mx-auto py-5">
          <h1 class="mb-5">Full-Stack Web Development To-Do List</h1>
          <ul class="list-unstyled text-dark rounded-3 bg-light mb-4">
            <li v-for="(task, index) in tasks" :class="task.completed === 'true' ? 'completed' : ''" class="d-flex align-items-center justify-content-between p-3">
              <h5 @click="updateTasksLocally(index, 'completionToggle')" class="mb-0">{{ task.task }}</h5>
              <button @click="updateTasksLocally(index, 'removeTask')" class="btn">
                <i class="fa-solid fa-trash"></i>
              </button>
            </li>
          </ul>
          <div class="input-group">
            <input @keyup.enter="insertTask()" v-model.trim="newTask" type="text" class="form-control" placeholder="Insert a new task..." aria-label="Insert a new task..." aria-describedby="submit-button">
            <button @click="insertTask()" type="button" id="submit-button">Add Task</button>
          </div>
        </div>
      </div>
      
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.global.min.js"></script>
    <script src="./assets/js/app.js"></script>
    
  </body>
  
</html>