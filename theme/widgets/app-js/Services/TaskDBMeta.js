app.service('TaskDBMeta',()=>{
    class Metadata {
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
        export(){
            return {
                createdAt: this.createdAt,
                updatedAt: this.updatedAt
            }
        }
    }
    return {
        create:function(){
            return new Metadata;
        },
        import:function(rawData){
            let exportable = new TaskDBMeta;
            exportable.import(rawData);
            return exportable;
        }
    }
});
