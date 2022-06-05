app.service('TaskSvc',function($scope){
    class TaskSvc {
        constructor(){
            this.backtoStatus = null;
        }
        create(backtoStatus){
            this.backtoStatus = backtoStatus;
            $scope.PageSvc.setStatus('create-task');
        }
        cancel(){
            if (null===this.backtoStatus) {
                $scope.PageSvc.setStatus('live');
                return;
            }
            $scope.PageSvc.setStatus(this.backtoStatus);
            return;
        }
    }
    return TaskSvc;
});
