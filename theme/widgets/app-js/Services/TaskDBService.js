app.service('TaskDBService',($scope,TaskDBUser)=>{

    let taskRemoteDB = {
        root: 'http://localhost:5702/'
    }

    return {
        start:(success,error)=>{
            $.ajax({
                method:'GET',
                url: taskRemoteDB.root+'api/tasks/get/all.json',
                contentType:'application/json',
                success:(response)=>success(response),
                error:()=>error()
            });
        }
    };
});
