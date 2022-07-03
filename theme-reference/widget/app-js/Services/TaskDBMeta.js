app.service('TaskDBMeta',function(){
    class TaskDBMeta {
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
            return new TaskDBMeta();
        },
        import:function(rawData){
            let exportable = new TaskDBMeta;
            exportable.import(rawData);
            return exportable;
        }
    }
});
