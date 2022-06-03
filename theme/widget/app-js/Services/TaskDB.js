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
            }
            this.database = JSON.parse(rawDB);
            this.prepareTasks();
        }
        prepareTasks(){
            $scope.Task = this.database.tasks;
            $scope.Task.isEmpty = Object.keys(this.database.tasks).length === 0;
        }
        initialize(){
            $scope.PageSvc.setStatus('initializing');
            this.created = Date.now();
            this.tasks = {};
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
                meta: {
                    created: this.created
                },
                user: this.user,
                tasks: this.tasks
            }
        }
        save(){
            localStorage.setItem('tskdb',JSON.stringify(this.export()));
        }
    }
    return TaskDB;
});
