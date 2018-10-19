<?php
/**
 * @copyright Copyright (C) 2016 Usha Singhai Neo Informatique Pvt. Ltd
 * @license https://www.gnu.org/licenses/gpl-3.0.html
 */
use usni\fontawesome\FA;
use usni\UsniAdaptor;
?>
<div class="header-search header-search-2 f-left">
    <div class="header-search-inner">
        <button class="search-toggle">
            <i class="zmdi zmdi-search"></i>
        </button>
        <form id="navbarsearchformview" class="navbar-search" action="<?php echo UsniAdaptor::createUrl('site/default/search');?>" method="get">
            <div class="top-search-box">
                <input type="text" id="navbarsearchform-keyword" placeholder="Buscar..." name="SearchForm[keyword]">
                <button type="submit" name="navsearch">
                    <i class="zmdi zmdi-search"></i>
                </button>
            </div>
        </form> 
    </div>
</div>

