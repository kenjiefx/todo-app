app.service('CalendarSvc',function($scope,$patch,TaskDB,$block,$hide){

    class TaskDueList {
        constructor(){
            this.about = '';
            this.dueAt = '';
            this.index = '';
            this.status = '';
            this.createdAt = '';
            this.hasPastDue = false;
        }
    }


    let day = 24*60*60*1000;
    let date = Date.now();
    let currentViewedDate = date;

    let updateCalendarViewDate = function(currentViewedDate){
        let dateText = moment(currentViewedDate).format('MMMM DD YYYY');
        $scope.CalendarView = {
            month: dateText.split(' ')[0].trim(),
            day: dateText.split(' ')[1].trim(),
            year: dateText.split(' ')[2].trim(),
            taskList: [],
            isEmptyTaskList: true
        }
    }

    let updateCalendarViewList = function(viewDate){
        let dateText = moment(viewDate).format('MMMM DD YYYY');
        let allTasks = TaskDB.getAllTasks();
        for (var i = 0; i < allTasks.length; i++) {
            let singleTask = allTasks[i];
            if (singleTask.status!=='completed') {
                let comparableDate = singleTask.createdAt;
                if (undefined!==singleTask.dueAt) {
                    comparableDate = singleTask.dueAt;
                }
                let comparableDateText = moment(comparableDate).format('MMMM DD YYYY');
                if (comparableDateText===dateText) {
                    let calTask = new TaskDueList();
                    calTask.about = singleTask.about;
                    calTask.dueAt = comparableDate;
                    calTask.index = i;
                    calTask.status = singleTask.status;
                    calTask.createdAt = singleTask.createdAt;
                    calTask.updatedAt = singleTask.updatedAt;
                    if (Date.now()>comparableDate) {
                        calTask.hasPastDue = true;
                    }
                    $scope.CalendarView.taskList.push(calTask);
                    $scope.CalendarView.isEmptyTaskList = false;
                }
            }

        }
    }

    if (undefined===$scope.CalendarView) {
        updateCalendarViewDate(currentViewedDate);
        updateCalendarViewList(date);
    }
    return {
        forward:function(){
            currentViewedDate = currentViewedDate + day;
            updateCalendarViewDate(currentViewedDate);
            updateCalendarViewList(currentViewedDate);
            $patch('CalendarViewDashboard');
            $('.calendar-view-slider-inner').hide();
            $block('CalendarViewSlider',function(element){
                element.$element.setAttribute('style','margin-right: -1000px;');
                setTimeout(function(){
                    element.$element.setAttribute('style','margin-right: 0px;');
                    $('.calendar-view-slider-inner').show();
                },100);
            });

        },
        backward:function(){
            currentViewedDate = currentViewedDate - day;
            updateCalendarViewDate(currentViewedDate);
            updateCalendarViewList(currentViewedDate);
            $patch('CalendarViewDashboard');
            $block('CalendarViewSlider',function(element){
                element.$element.setAttribute('style','margin-left: -1000px;');
                setTimeout(function(){
                    element.$element.setAttribute('style','margin-left: 0px;');
                    $('.calendar-view-slider-inner').show();
                },100);
            });
        }
    }
});
