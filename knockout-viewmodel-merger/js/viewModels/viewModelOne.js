define(function(require) {
    
    var viewModelOne = {
        firstNameController: function(shouter){
            //var self = this;
            
            this.firstNameViewModel = function(){
                this.firstName = ko.observable();
                this.bound = ko.observable(true);
                                
                this.firstName.subscribe(function(firstName) {
                   shouter.notifySubscribers(firstName, 'publishFirstName');
                });
                
                this.unbind = function() { 
                    ko.cleanNode($("#fname")[0]);
                    ko.cleanNode($("#fnameOutput")[0]);
                    this.bound(false);
                };
                
                this.rebind = function(){
                    ko.applyBindings(self.firstNameViewModel, $("#fname")[0]);
                    ko.applyBindings(self.firstNameViewModel, $("#fnameOutput")[0]);
                    this.bound(true);
                };
            };    
        }
    };
    return viewModelOne;
});







