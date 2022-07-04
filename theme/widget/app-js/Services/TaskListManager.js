app.service('TaskListManager',function(TaskModel){
    class TaskListManagerApp {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.taskList = [];
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
            return (this.taskList.length===0);
        }
        pushTask(Task){
            this.taskList.push(Task);
        }
        updateTask(index,Task){
            // console.log('----tasklist Manager side---');
            // console.log('Task Index to update: '+index);
            // console.log('Task Object: ');
            // console.log(Task);
            let task = new TaskModel();
            task.import(Task);
            task.updatedAt = Date.now();
            this.taskList[index] = task;
        }
    }

    return {
        create:function(){
            return new TaskListManagerApp;
        },
        import:function(rawData){
            let exportable = new TaskListManagerApp;
            exportable.import(rawData);
            return exportable;
        }
    }

});
