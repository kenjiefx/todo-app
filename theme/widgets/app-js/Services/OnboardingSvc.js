app.service('OnboardingSvc',($scope,TaskSvc)=>{

    return {
        addDefaultTask:()=>{
            let task = TaskSvc.task.factory();
            task.about = 'Welcome! This is your first, default task.';
            let todos = [
                'Create a new task',
                'Set your theme to dark mode',
                'Rate my app'
            ];
            for (var i = 0; i < todos.length; i++) {
                let todo = todos[i];
                let todoItem = TaskSvc.todo.factory();
                todoItem.setDescription(todo);
                task.addTodo(todoItem);
            }
            TaskSvc.task.save(task);
        }
    }
});
