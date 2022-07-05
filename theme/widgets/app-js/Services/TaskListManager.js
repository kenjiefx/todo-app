app.service('TaskListManager',()=>{
    class TaskList {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.list = [];
        }
        setCreatedAt(date){
            this.createdAt = date;
        }
        import(rawData){
            this.createdAt = rawData.createdAt;
            this.updatedAt = rawData.updatedAt;
            this.list = rawData.list;
        }
        export(){
            return {
                createdAt: this.createdAt,
                updatedAt: this.updatedAt,
                list: this.list
            }
        }
        isEmpty(){
            return (this.list.length===0);
        }
        pushTask(task){
            this.list.push(task);
        }
    }

    return {
        create:()=>{
            return new TaskList;
        },
        import:(rawData)=>{
            let exportable = new TaskListManager;
            exportable.import(rawData);
            return exportable;
        }
    }
});
