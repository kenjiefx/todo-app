strawberry.create('app',()=>{
    setTimeout(()=>{
        $("#Loader").fadeOut();
        $("#Loader").html("");
        $("#main").fadeIn();
    },1500);
});
