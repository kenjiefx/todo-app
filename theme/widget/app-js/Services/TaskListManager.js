app.service('TaskListManager',function(){
    class TaskListManager {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.taskList = {};
        }
        setCreatedAt(date){
            this.createdAt = date;
        }
        import(rawData){
            this.createdAt = rawData.createdAt;
            this.updatedAt = rawData.updatedAt;
            this.taskList = rawData.taskList;
        }
        isEmpty(){
            console.log('asdads');
            return true;
        }
    }

    return {
        create:function(){
            return new TaskListManager;
        },
        import:function(rawData){
            let exportable = new TaskListManager;
            exportable.import(rawData);
            return exportable;
        }
    }

});
