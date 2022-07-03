app.factory('TaskModel',function(){
    class TaskModel {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.id = Math.floor(Date.now()*Math.random());
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
            this.id = task.id;
            this.about = task.about;
            this.SalesforceTicketId = task.SalesforceTicketId;
            this.status = task.status;
            this.todos = task.todos;
            this.metrics = task.metrics;
        }
    }
    return TaskModel;
});
