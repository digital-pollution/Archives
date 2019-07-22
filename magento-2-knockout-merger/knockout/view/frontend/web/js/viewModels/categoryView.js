define([
    'jquery',
    'knockout'
], function($, ko) {
    
    var categoryView = {
        categoryViewController: function(shouter){
                   
            this.categoryViewModel = function(){
                var self = this;
                
                this.categories = ko.observableArray([]);
                this.category = ko.observable();
                
                this.category.subscribe(function(category) {
                   shouter.notifySubscribers(category, 'publishCategory');
                });
                
                $.ajax({
                    url: '/category/category/category',
                    method: 'POST',
                    data: { 
                        'form_key': $.cookie('form_key')
                    },
                    success: function(result){
                        self.categories.push({
                            name: 'Select ...',
                            id: ''
                        }); 
                        
                        for(key in result) {
                            self.categories.push({
                                name: ko.observable( result[key].name ),
                                id: ko.observable( key )
                            });
                        }
                    }
                });
            };    
        }
    };
    return categoryView;
});









