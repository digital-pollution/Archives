define(function(require) {
    
    var viewModelThree = {
        fullNameController: function(shouter){
            
            ko.extenders.required = function(target, overrideMessage) {
                //add some sub-observables to our observable
                target.hasError = ko.observable();
                target.validationMessage = ko.observable();

                //define a function to do validation
                function validate(newValue) {
                   target.hasError(newValue ? false : true);
                   target.validationMessage(newValue ? "" : overrideMessage || "Oops you've missed something");
                }

                //initial validation
                validate(target());

                //validate whenever the value changes
                target.subscribe(validate);

                //return the original observable
                return target;
            };
            
            
            
            this.fullNameViewModel = function(){
                this.firstName = ko.observable('').extend({ required: "Please enter a first name" });
                this.lastName = ko.observable('').extend({ required: "Please enter a last name" });
                
                this.fullName = ko.computed(function() {
                                    return this.firstName() + " " + this.lastName();
                                }, this);
                                
                shouter.subscribe(function(newValue) {
                    this.firstName(newValue);
                }, this, 'publishFirstName');

                shouter.subscribe(function(newValue) {
                    this.lastName(newValue);
                }, this, 'publishLastName');                  
            };
        }
    };
    return viewModelThree;
});







