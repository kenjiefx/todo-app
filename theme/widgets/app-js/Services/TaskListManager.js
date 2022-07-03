app.service('TaskListManager',()=>{
    class TaskListManager {
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
            console.log(this.taskList);
            this.taskList.push(Task);
        }
    }

    return {
        create:()=>{
            return new TaskListManager;
        },
        import:(rawData)=>{
            let exportable = new TaskListManager;
            exportable.import(rawData);
            return exportable;
        }
    }
});
