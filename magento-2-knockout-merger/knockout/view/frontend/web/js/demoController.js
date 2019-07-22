define(
    [
        'jquery',
        'ko',
        'uiComponent',
        'category',
        'product',
    ],
    function ($,ko, Component, categoryView, productView) {
        //"use strict";

        var self = this;
        var shouter = new ko.subscribable();

        categoryView.categoryViewController(shouter);
        productView.productViewController(shouter);
        
        self.masterVM = (function(){                      
           this.categoryViewModel = new categoryView.categoryViewModel();
           this.productViewModel = new productView.productViewModel();
        })();
       
        return Component.extend({
            getCategories : function(){    
                return self.masterVM;
            }
        });
    }
);
