<?php
use usni\UsniAdaptor;
use usni\library\utils\Html;
    
$assetsUrl  = UsniAdaptor::app()->urlManager->baseUrl;
?>
<div class="slider-area slider-2">
    <div class="bend niceties preview-2">
        <div id="nivoslider-2" class="slides">
            <?php echo Html::img($assetsUrl . '/images/slider/slider-2/slider-4.jpg');?>
            <?php echo Html::img($assetsUrl . '/images/slider/slider-2/slider-3.jpg');?>
            <?php echo Html::img($assetsUrl . '/images/slider/slider-2/slider-5.jpg');?>
        
        </div>
        <!-- ===== direction 1 ===== -->
        <div id="slider-direction-1" class="slider-direction">
            <!-- layer 1 -->
            <div class="slider-content-1-image">

            </div>
        </div>
        <!-- ===== direction 2 ===== -->
        <div id="slider-direction-2" class="slider-direction">
            <div class="slider-content-2">

            </div>
            <!-- layer 1 -->

        </div>
        <!-- ===== si hay más sliders direction 3 ===== -->
        <div class="slider-content-3">

        </div>


    </div>
</div>