<?php 
require 'init.php';

if(!isset($_SESSION['admin'])){
	go('login.php');
}

require 'inc/header.php';
?>

    <!-- home image -->
    <div class="row">
        <div class="col-md-12">
            <div class="home_image">
                <img src="images/vegetables3.jpg" alt="home_fruit">
                <p>A crop is a plant or plant product that can be grown and harvested for profit or subsistence.
                    A plant which is cultivated in a large amount is called a crop. These are grown on a large scale and
                    are sold commercially.
                </p>
            </div>    
        </div>
    </div>
    <!-- home end -->

    <!-- crops start -->
    <div class="row">
        <div class="col-md-1"></div>
            <div class="col-md-5 crops">
                <div class="crop_text">
                    <h3>Food Crops</h3>
                    <p> The term food crops refers to the world’s major food supply derived from plants;
                         a crop assumes human intervention through agriculture. In the main, food crops consist
                        of grains, legumes (including dried beans), seeds and nuts, vegetables, fruit, herbs and 
                        spices, beverage plants such as tea and coffee and so forth.</p>
                </div>
                <div class="crop_img">
                    <img src="images/fruit23.png" alt="">
                </div>
            </div>
            <div class="col-md-5 crops">
            <div class="crop_text">
                    <h3>Oil Crops</h3>
                    <p>Oil crops are those types of plants which are grown mainly for the oil they produce.Oil crops
                        have been increasingly used as raw materials for food, livestock feed and non-food 
                        industrial applications.Soybeans, peanuts, sunflowers, and canola are mainly used to produce edible oils.</p>
                </div>
                <div class="crop_img">
                    <img src="images/oil2.png" alt="">
                </div>
            </div>
        <div class="col-md-1"></div>
    </div>
    <!-- crops end -->

    <!-- farmer start -->
    <div class="row">
            <div class="col-md-4">
                <div class="farmer_img">
                    <img src="images/farmer5.png" alt="">
                </div>
            </div>
            <div class="col-md-8">
                <div class="farmer_text">
                    <h2>How do farmer to grow crop?</h2>
                    <p>Farmers living in different areas have different climates, landscapes, microorganisms, 
                        plants and animals so they must adapt their growing practices to local conditions.
                        However, all farmers rely on ecosystem services.To grow crops, it helps if farmers understand
                        local growing conditions (such as knowing when the rainy season starts, which crops grow well
                        together, what nutrients the crop needs and are these nutrients present in the soil).After deciding
                        what to grow, farmers often till the land by loosening the soil and mixing in fertilizers,
                        which are nutrient rich. Then, they sow seeds or plant seedlings. When the crops are growing,
                        farmers must water (or rely on rainfall), weed and kill crop pests. Once the crops are mature,
                        the farmer will harvest them.Farmers need resources to grow food. They need many different types of resources.
                        Farmers need natural resources, such as land, air, nutrients, water and sunlight.</p>
                    
                    <p></p>

                </div>
            </div>
    
    </div>
    <!-- farmer end -->

    <!-- soil type start -->
    <div class="soil">
        <h1>Soil Types</h1>
            <div class="soil_area">
                <div class="soil_name">
                    <div class="each_soil_name">
                        <h4>Paddy Land</h4>
                        <p>Paddy Land means land on which paddy is mainly cultivated and carried out so as to
                            retain water after obtaining the water for cultivation by natural or artificial means.</p>
                    </div>
                </div>
                                <div class="soil_name">
                    <div class="each_soil_name">
                        <h4>Garden Land </h4>
                        <p>A garden land, also called a micro-farm, is a small plot of land, a very small farm,
                             where fruits, vegetables and flowers are grown and sold to the public.Most gardens grow and supply fresh produce through the local 
                             growing season.</p>
                    </div>
                </div>
                <div class="soil_name">
                    <div class="each_soil_name">
                        <h4>Alluvial Land </h4>
                        <p>Alluvial Land means unstable land submerged under water and altered soil texture and 
                            structure by yearly water current.Crops like wheat, rice, maize,
                            pea, pigeon pea, chickpea, black gram, green gram, soybean, etc... are grown in alluvial soils</p>
                    </div>
                </div>
                <div class="soil_name">
                    <div class="each_soil_name">
                        <h4>Perennial Crop Land</h4>
                        <p>Perennial Crop Land is the cultivation of crop species that live longer than two years
                            without the need for replanting each year. Perennial agriculture involves relatively less tilling and in some cases
                            requires less labour and fewer pesticides, helping to maintain or even improve soil
                            health. </p>
                    </div>
                </div>

            </div>
    </div>
    <!-- soil type end -->


<?php require 'inc/footer.php';?>