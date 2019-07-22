define([
    'jquery',
    'knockout'
], function($, ko) {
    
    var productView = {
        productViewController: function(shouter){
            
            this.productViewModel = function(){  
                var self = this;
                
                this.selectedCategory = ko.observable();
                this.productList = ko.observableArray([]);
                
                shouter.subscribe(function(newValue) {
                    this.selectedCategory(newValue);
                    console.log( 'newValue', this.selectedCategory() );
                    
                    $.ajax({
                        url: '/json/endpoint/endpoint',
                        method: 'POST',
                        data: { 
                            'form_key': $.cookie('form_key'),
                            'categoryId': self.selectedCategory() 
                        },
                        success: function(result){
                            self.productList.removeAll();
                            
                            for(key in result) {
                                self.productList.push({
                                    name: ko.observable( result[key].name ),
                                    price: ko.observable( result[key].price ),
                                    id: ko.observable( key )
                                });
                            }
                            
                        }
                    });
                    
                }, this, 'publishCategory');
            };    
        }
    };
    return productView;
});