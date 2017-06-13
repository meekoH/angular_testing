// Let's set up a directive for this app.
productApp.directive("productList", function(){
    return {
        restrict: 'EA',
        templateUrl: './components/views/productList.html'
    };
});