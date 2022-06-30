app.service('TaskDB',function($scope,TaskDBUser,TaskDBMeta,TaskListManager){

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
        exportDB(){
            return {
                createdAt: this.createdAt,
                updatedAt: this.updatedAt,
                user: this.user,
                tasks: this.tasks,
                meta: this.meta
            }
        }
        importDB(rawDB){
            this.createdAt = rawDB.createdAt;
            this.updatedAt = rawDB.updatedAt;
            this.user = TaskDBUser.import(rawDB.user);
            this.tasks = TaskListManager.import(rawDB.tasks);
            this.meta = TaskDBMeta.import(rawDB.meta);
        }
        saveSnapshot(){
            localStorage.setItem('tskdb',JSON.stringify(this.exportDB()));
        }
    }

    let rawDB = localStorage.getItem('tskdb');
    let hasInstance = function(){
        return (null!==rawDB) ? true : false;
    }
    let taskDB = new TaskDB();
    if (null!==rawDB) {
        taskDB.importDB(JSON.parse(rawDB));
    }

    return {
        hasInstance: hasInstance(),
        isTaskEmpty:function(){
            return taskDB.tasks.isEmpty();
        },
        create:function(callback){
            if (!hasInstance()) {
                let taskDB = new TaskDB();
                taskDB.saveSnapshot();
            }
            callback();
        },
        addTask:function(Task){
            taskDB.tasks.pushTask(Task);
            taskDB.saveSnapshot();
        },
        getAllTasks:function(){
            return taskDB.tasks.taskList;
        },
        updateTask:function(index,Task){
            
        }
    };
});
