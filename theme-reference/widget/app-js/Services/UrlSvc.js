app.service('UrlSvc',function(){
    return {
        getParam:function(urlKey){
            var sPageURL = window.location.search.substring(1),
            sURLVariables = sPageURL.split('&'), urlKeyName, i;
            for (i = 0; i < sURLVariables.length; i++) {
                urlKeyName = sURLVariables[i].split('=');
                if (urlKeyName[0] === urlKey) {
                    return typeof urlKeyName[1] === undefined ? true : decodeURIComponent(urlKeyName[1]);
                }
            }
            return false;
        }
    }
});
