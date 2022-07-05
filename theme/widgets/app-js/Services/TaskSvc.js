app.service('TaskSvc',($scope,TaskDBService,TaskModel,ToDoItem)=>{
    return {
        taskDB: {
            hasInstance:()=>{
                return TaskDBService.hasInstance();
            },
            create:()=>{
                return TaskDBService.create(()=>{});
            }
        },
        task: {
            factory:()=>{
                return new TaskModel;
            },
            save:(task)=>{
                if (task instanceof TaskModel) {
                    TaskDBService.tasks.add(task.export());
                }
            }
        },
        todo:{
            factory:()=>{
                return new ToDoItem;
            }
        }
    }
});
