app.factory('TaskModel',()=>{
    class TaskModel {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.about = '';
            this.SalesforceTicketId = null;
            this.status = 'pending';
            this.todos = [];
            this.metrics = {
                completed: 0
            }
        }
        import(task){
            this.createdAt = task.createdAt;
            this.updatedAt = task.updatedAt
            this.about = task.about;
            this.SalesforceTicketId = task.SalesforceTicketId;
            this.status = task.status;
            this.todos = task.todos;
            this.metrics = task.metrics;
        }
        addTodo(todoItem){
            this.todos.push(todoItem.export());
        }
        export(){
            return {
                createdAt: this.createdAt,
                updatedAt: this.updatedAt,
                about: this.about,
                SalesforceTicketId: this.SalesforceTicketId,
                status: this.status,
                todos: this.todos,
                metrics: this.metrics
            }
        }
    }
    return TaskModel;
});
