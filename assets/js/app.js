const { createApp } = Vue
  
createApp({
  data() {
    return {
      tasks: [],
      newTask: "",
      getTasksListUrl: "app/Http/Controllers/TasksController/index.php",
      updateTasksUrl: "app/Http/Controllers/TasksController/store.php"
    }
  },
  methods: {
    insertTask() {
      if(this.newTask === "") {
        return;
      }
      const newTaskObject = {
        task: this.newTask,
        completed: "false"
      }
      this.tasks.push(newTaskObject);
      this.newTask = "";
      this.updateTasks();
    },

    updateTasks() {
      axios.post(
        this.updateTasksUrl,
        this.tasks,
        {
          headers: { 'Content-Type': 'multipart/form-data' }
        })
      .then(() => {
        console.info("API call successfull");
      })
      .catch(error => {
        console.error(error.message);
      })
    },

    updateTasksLocally(index, operation) {
      if (operation === "completionToggle"){
        if (this.tasks[index].completed === "true") {
          this.tasks[index].completed = "false";
        } else {
          this.tasks[index].completed = "true";
        }
      } else {
        this.tasks.splice(index, 1);
      }
      this.updateTasks();
    }
  },
  mounted() {

    axios.get(this.getTasksListUrl)
    .then(response => {
      this.tasks = response.data;
    })
    .catch(error => {
      console.error(error.message);
    })
  },
}).mount('#app')