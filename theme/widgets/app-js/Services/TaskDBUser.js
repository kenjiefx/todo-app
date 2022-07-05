app.service('TaskDBUser',($scope)=>{
    class User {
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
            return new User;
        },
        import:function(rawData){
            let exportable = new TaskDBUser;
            exportable.import(rawData);
            return exportable;
        }
    }
});
