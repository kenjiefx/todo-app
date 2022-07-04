app.service('ActivityTracker',function($scope,$patch){

    class EventItem {
        constructor(){
            this.createdAt = Date.now();
            this.description = null;
            this.tag = null;
        }
    }

    class ActivityData {
        constructor(){
            this.tracker = {};
        }
    }
    let activityDataRaw = localStorage.getItem('actrk');
    if (null===activityDataRaw) {
        localStorage.setItem('actrk',JSON.stringify(new ActivityData));
    }

    activityData = JSON.parse(activityDataRaw);

    let saveActivityData = function(){
        localStorage.setItem('actrk',JSON.stringify(activityData));
    }



    let day = 24*60*60*1000;

    console.log((new Date('2022-07-05')).getTime());

    let renderDashboard = function(){
        let dashboard = $('#app-activity-dashboard');

        let currentDate = Date.now();

        for (var i = 0; i < 10; i++) {
            let row = document.createElement('div');
            row.dataset.rowId = i;
            row.classList.add('app-activity-row');
            for (var k = 0; k < 19; k++) {
                let cellDate = moment(currentDate).format('YYYY-MM-DD');
                let cell = document.createElement('div');
                cell.dataset.cellId = k;
                cell.setAttribute('xclick','ActivityTracker.select(\''+cellDate+'\')');
                let cellOpacity = 0;
                if (undefined!==activityData.tracker[cellDate]) {
                    cellOpacity = Math.round((activityData.tracker[cellDate].length / 20)*100);
                }
                cell.setAttribute('style','background-color: rgb(0 150 136 / '+cellOpacity+'%);');
                cell.classList.add('app-activity-cell');
                row.appendChild(cell);
                currentDate=currentDate-day;
            }
            dashboard.append(row);
        }

        //console.log(dashboard.html());
        return dashboard.html();

    }



    $(document).ready(function(){
        if (undefined==$scope.ActivityTracker) {
            let dashboardHTML = renderDashboard();
            $scope.ActivityTracker = {
                select:function(dd){
                    console.log(dd);
                }
            }
            $scope.$patchables['@ActivityTrackerDashboard'] = dashboardHTML;
            //console.log(dashboardHTML);
            $patch('ActivityTrackerDashboard');
        }
    });

    return {
        newEvent:function(){
            return new EventItem();
        },
        track:function(EventItem){
            let date = moment().format('YYYY-MM-DD');
            if (undefined===activityData.tracker[date]) {
                activityData.tracker[date] = [];
            }
            activityData.tracker[date].push(EventItem);
            saveActivityData();
        }
    }
});
