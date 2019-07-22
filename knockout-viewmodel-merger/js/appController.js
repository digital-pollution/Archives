requirejs.config({
    baseUrl: 'js/',
    paths: {
        app: '../'
    },
    waitSeconds : 0
});

require(['viewModels/viewModelOne', 'viewModels/viewModelTwo', 'viewModels/viewModelThree'],
    function(viewModelOne, viewModelTwo, viewModelThree) {
        var global = {
            init:function(){
                var self = this;
                var shouter = new ko.subscribable();
                
                viewModelOne.firstNameController(shouter);
                viewModelTwo.lastNameController(shouter);
                viewModelThree.fullNameController(shouter);
            
                self.masterVM = (function(){
                    this.firstNameViewModel = new viewModelOne.firstNameViewModel();
                    this.lastNameViewModel = new viewModelTwo.lastNameViewModel();
                    this.fullNameViewModel = new viewModelThree.fullNameViewModel(); 
                })();

                ko.applyBindings(self.masterVM);
            }
      };
        
      $(document).ready(function(){
          global.init();
      });
    });
