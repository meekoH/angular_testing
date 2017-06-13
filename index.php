<!DOCTYPE HTML>

<html>
    <head>
        <?php require_once('components/site_components/head.html'); ?>
        <title>Angular Test Site</title>
    </head>

    <body>
    	<div class="wrapper">

            <?php require_once('components/site_components/header.html'); ?>

    		<div class="content-wrapper">
                <div class="content">

                    <div ng-app="productApp">
                        <div ng-controller="productCtrl" class="product-list ta-center">
                            <!-- Product Controls -->
                            <div class="product-controls-section">
                                <div class="product-control">
                                    <button ng-click="displayAddProductControls()" class="product-control-btn add-product-ctrl" title="Add a product">Add a Product <i class="fa fa-plus-circle" aria-hidden="true"></i></button>
                                </div>
                            </div>

                            <!-- Product altering section -->
                            <div class="add-products-section">
                                <div ng-include="'components/views/insertProducts.html'"></div>
                            </div>

                            <!-- List the Products -->
                            <product-list></product-list>
                        </div>
                    </div>

                </div>
            </div>

            <?php require_once('components/site_components/footer.html'); ?>

    	</div>
    </body>

    <?php require_once('components/site_components/scripts.html'); ?>

</html>