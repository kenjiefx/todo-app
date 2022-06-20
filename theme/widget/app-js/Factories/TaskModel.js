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
    }
    return TaskModel;
});
