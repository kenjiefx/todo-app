app.service('TaskDBUser',function(){
    class TaskDBUser {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
        }
        setCreatedAt(date){
            this.createdAt = date;
        }
        import(rawData){
            this.createdAt = rawData.createdAt;
            this.updatedAt = rawData.updatedAt;
        }
    }

    return {
        create:function(){
            return new TaskDBUser;
        },
        import:function(rawData){
            let exportable = new TaskDBUser;
            exportable.import(rawData);
            return exportable;
        }
    }
});
