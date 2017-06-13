// Let's define our AngularJS application. Why not?!
var productApp = angular.module("productApp", []);

// Let's set up a controller for this app.
productApp.controller("productCtrl", function($scope, $http) {
    // Run the getProducts function in order to display a list of all available products.
    getProducts();

    // getProducts initializes the data and displays the contents to the user.
    function getProducts() {
        // Go fetch the data from displayProducts.php.
        $http.post('./displayProducts.php')
        .success(function(data) {
            $scope.products = data;
        });
    }

    // displayAddProductControls  
    $scope.displayAddProductControls = function() {
        // Clear the input fields.
        angular.element(document.getElementsByClassName('product-form-ctrl-text-input')).val("");

        // Slide toggle the add-products-section for adding a new product.
        $('.add-products-section').slideToggle(function() {
            // If it hasn't been opened, add the class and open it.
            if(!$('.add-products-section').hasClass('add-products-opened')) {
                // Add the sectional class.
                $('.add-products-section').addClass('add-products-opened');
                // Remove the button class.
                $('.add-product-ctrl').addClass('section-active');
                // Update the wording of the Add Product button.
                $('.add-product-ctrl').html('Don\'t add this product <i class="fa fa-times-circle" aria-hidden="true"></i>');
            // Otherwise it has already been opened so remove the class and close it.
            } else {
                // Remove the sectional class.
                $('.add-products-section').removeClass('add-products-opened');
                // Remove the button class.
                $('.add-product-ctrl').removeClass('section-active');
                // Update the wording of the Add Product button.
                $('.add-product-ctrl').html('Add a product <i class="fa fa-plus-circle" aria-hidden="true"></i>');
            }
        });
    }

    // insertProduct creates a new (prod).
    $scope.insertProduct = function(prod) {
        // Using the insertProducts.php to post data.
        $http.post('./insertProducts.php', {
            "prodName" : prod.prodName,
            "prodDescrip" : prod.prodDescrip,
            "prodPrice" : prod.prodPrice,
            "prodStock" : prod.prodStock,
            "prodImg" : prod.prodImg
        })
        // If we successfully add the product, let's log it, clear the input fields and refresh the product list.
        .success(function(data) {
            if (data == true) {
                console.log("Successfully inserted a product");
                // As it turns out, unless you have jQuery, you have to rely on the jQlite built into angular.
                // That's where this angular.element comes from; mimics regular js & jQuery in a sense.
                // https://docs.angularjs.org/api/ng/function/angular.element

                // Clear the input fields.
                angular.element(document.getElementsByClassName('product-form-ctrl-text-input')).val("");
                getProducts();
            }
        })
        // Otherwise we failed, so let's log it.
        .error(function(data) {
            // SHIT!
            console.log("Failed at inserting product");
        });
    }

    // deleteProduct deletes the given (prod).
    $scope.deleteProduct = function(prod) {
        // Using the deleteProducts.php to delete data.
        $http.post('./deleteProducts.php', {
            "prodID" : prod.productID
        })
        // If we successfully delete the product, let's log it and refresh the product list.
        .success(function(data) {
            if (data == true) {
                console.log("Successfully deleted product #");
                getProducts();
            }
        })
        // Otherwise we failed, so let's log it.
        .error(function(data) {
            console.log("Failed at deleting product");
        });
    }
});