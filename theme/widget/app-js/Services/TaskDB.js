app.service('TaskDB',function($scope){
    class TaskDB {
        constructor(){
            $scope.Task = {
                list: [],
                isEmpty: true
            };
            this.hasTasks = false;
            let rawDB = localStorage.getItem('tskdb');
            if (null===rawDB) {
                this.initialize();
                rawDB = localStorage.getItem('tskdb');
            }
            this.database = JSON.parse(rawDB);
            this.meta = this.database.meta;
            this.tasks = this.database.tasks;
            this.user = this.database.user;
            this.prepareTasks();
        }
        prepareTasks(){
            $scope.Task.list = this.database.tasks;
            $scope.Task.isEmpty = Object.keys(this.database.tasks).length === 0;
            if ($scope.Task.isEmpty) {
                $scope.Task.list = [];
            }
        }
        addTask(Task){
            $scope.Task.list.push(Task);
            $scope.Task.isEmpty = false;
            this.save();
            location.reload();
        }
        initialize(){
            $scope.PageSvc.setStatus('initializing');
            this.meta = {
                createdAt: Date.now()
            }
            this.user = {
                name: null
            };
            this.save();
            setTimeout(function(){
                $scope.PageSvc.setStatus('live');
            },5000);
        }
        export(){
            return {
                meta: this.meta,
                user: this.user,
                tasks: $scope.Task.list,
                updatedAt: Date.now()
            }
        }
        save(){
            localStorage.setItem('tskdb',JSON.stringify(this.export()));
        }
        reset(){
            localStorage.removeItem('tskdb');
            location.reload();
        }
    }
    return TaskDB;
});
