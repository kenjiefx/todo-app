app.service('TaskDBService',($scope,TaskDBUser,TaskDBMeta,TaskListManager)=>{
    class TaskDB {
        constructor(){
            this.createdAt = Date.now();
            this.updatedAt = Date.now();
            this.user = TaskDBUser.create();
            this.tasks = TaskListManager.create();
            this.meta = TaskDBMeta.create();
        }
        setCreatedAt(date){
            this.createdAt = date;
        }
        export(){
            return {
                createdAt: this.createdAt,
                updatedAt: this.updatedAt,
                user: this.user.export(),
                tasks: this.tasks.export(),
                meta: this.meta.export()
            }
        }
        import(rawDB){
            this.createdAt = rawDB.createdAt;
            this.updatedAt = rawDB.updatedAt;
            this.user = TaskDBUser.import(rawDB.user);
            this.tasks = TaskListManager.import(rawDB.tasks);
            this.meta = TaskDBMeta.import(rawDB.meta);
        }
        saveSnapshot(){
            console.log(this.export());
            //localStorage.setItem('tskdb',JSON.stringify(this.export()));
        }
    }

    // Retrieving any saved data in the local storage
    let rawDB = localStorage.getItem('tskdb');
    // Creates a new instance of TaskDB
    let taskDB = new TaskDB();
    // Imports raw saved data from the local storage to our TaskDB Object
    if (null!==rawDB) taskDB.import(JSON.parse(rawDB));
    // Checks whether the we have previously saved Task DB data in the local storage
    let hasInstance = () => (null!==rawDB) ? true : false;

    console.log(taskDB);

    return {
        hasInstance:() => hasInstance(),
        isTaskEmpty:() => taskDB.tasks.isEmpty(),
        create:()=>{
            if (!hasInstance()) {
                let taskDB = new TaskDB();
                taskDB.saveSnapshot();
            }
        },
        tasks:{
            add:(task)=>{
                taskDB.tasks.pushTask(task);
                taskDB.saveSnapshot();
            }
        },
        getAllTasks:function(){
            return taskDB.tasks.taskList;
        }
    };
});
