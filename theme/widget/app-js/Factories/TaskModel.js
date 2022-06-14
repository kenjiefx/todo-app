app.factory('TaskModel',function(){
    class TaskModel {
        constructor(description){
            this.ticketId = null;
            this.id = Math.floor(Date.now()*Math.random());
            this.description = description;
            this.createdAt = Date.now();
            this.status = 'new';
            this.updatedAt = null;
            this.todos = [];
        }
        setTicketId(ticketId){
            this.ticketId = ticketId;
        }
        setDate(){
            
        }
        setDescription(description){
            this.description = description;
        }
    }
    return TaskModel;
});
