app.factory('ToDoItem',function(){
    class ToDoItem {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.description = '';
            this.status = 'new';
        }
        setDescription(description){
            this.description = description;
            this.updatedAt = Date.now();
            this.status = 'pending';
        }
    }
    return ToDoItem;
});
