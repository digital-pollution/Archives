define(function(require) {
    
    var viewModelTwo = {
        lastNameController: function(shouter){
            //var self = this;
            
            this.lastNameViewModel = function(){
                this.lastName = ko.observable();
                this.bound = ko.observable(true);
                
                this.lastName.subscribe(function(lastName) {
                   shouter.notifySubscribers(lastName, 'publishLastName');
                });
                
                this.unbind = function() { 
                    ko.cleanNode($("#lname")[0]);
                    ko.cleanNode($("#lnameOutput")[0]);
                    this.bound(false);
                };
                
                this.rebind = function(){
                    ko.applyBindings(self.lastNameViewModel, $("#lname")[0]);
                    ko.applyBindings(self.lastNameViewModel, $("#lnameOutput")[0]);
                    this.bound(true);
                };
            };         
        }
    };
    return viewModelTwo;
});







