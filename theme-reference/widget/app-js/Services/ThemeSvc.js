app.service('ThemeSvc',function($scope){
    class Theme {
        constructor(){
            this.themeName = 'light';
        }
        setThemeName(themeName){
            this.themeName = themeName;
        }
        importData(themeData){
            this.themeName = themeData.themeName;
        }
        saveTheme(){
            localStorage.setItem('tdotheme',JSON.stringify({
                themeName: this.themeName
            }));
        }
        applyTheme(){
            let classList = document.body.classList;
            for (var i = 0; i < classList.length; i++) {
                if (classList[i]==='Light') {
                    document.body.classList.remove('Light');
                }
                if (classList[i]==='Dark') {
                    document.body.classList.remove('Dark');
                }
            }
            let newThemeName = this.themeName.charAt(0).toUpperCase() + this.themeName.slice(1);
            document.body.classList.add(newThemeName);
        }
    }
    let themeData = localStorage.getItem('tdotheme');
    let theme = new Theme();
    if (null===themeData) {
        theme.saveTheme();
    } else {
        theme.importData(JSON.parse(themeData));
    }

    if (undefined===$scope.Theme) {
        $scope.Theme = {
            name: theme.themeName
        }
    }

    theme.applyTheme();

    return {
        switch:function(){
            theme.setThemeName($scope.Theme.name);
            theme.applyTheme();
            theme.saveTheme();
        }
    }
});
