<?php
use usni\UsniAdaptor;
use frontend\widgets\MyAccount;
use backend\widgets\LanguageSelector;
use backend\widgets\StoreSelector;
use frontend\widgets\CurrencySelector;

/* @var $this \frontend\web\View */
?>

    
      <header class="header-area header-wrapper header-2">
            <!-- header-middle-area -->
            <div id="sticky-header" class="header-middle-area plr-185">
                <div class="container-fluid">
                    <div class="full-width-mega-dropdown">
                        <div class="row">
                            <!-- logo -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="logo">
                                    <a href="index.html">
                                        <?php echo $this->render("//common/_logo");?>
                                    </a>
                                </div>
                            </div>
                            <!-- primary-menu -->
                            <div class="col-md-8 hidden-sm hidden-xs">
                                <nav id="primary-menu">
                                     <?php echo $this->render("//common/_topnav"); ?>					
                                </nav>
                            </div>
                            <!-- header-search & total-cart -->
                            <div class="col-md-2 col-sm-6 col-xs-12">
                                <div class="search-top-cart  f-right">
                                    <!-- header-search -->
                                    <?php echo $this->render("//common/_navSearch");?>
                                    <?php echo MyAccount::widget();?>
                                    <!-- total-cart -->
                                    <?php  //echo $this->render("//cart/_minicart"); ?>
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </header>

    <!--div class="container">
        <div class="hidden-xs hidden-sm hidden-md pull-left" id="local-options">
            <ul class="list-inline">
                <?php
                /*echo LanguageSelector::widget([
                                                'selectedLanguage' => UsniAdaptor::app()->languageManager->selectedLanguage,
                                                'translatedLanguages' => UsniAdaptor::app()->languageManager->translatedLanguages,
                                                'languages'        => UsniAdaptor::app()->languageManager->languages,
                                                'actionUrl'        => '/customer/site/change-language',
                                                'headerLinkOptions' => ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle'],
                                                'view'             => $this
                                               ]);
                echo StoreSelector::widget([
                                                        'selectedStore' => UsniAdaptor::app()->storeManager->selectedStore,
                                                        'stores'        => UsniAdaptor::app()->storeManager->getAllowed(),
                                                        'headerLinkOptions' => ['data-toggle' => 'dropdown', 'class' => 'dropdown-toggle'],
                                                        'actionUrl'        => '/customer/site/set-store',
                                                        'view'             => $this
                                                    ]);
                echo CurrencySelector::widget([
                                                        'selectedCurrency' => UsniAdaptor::app()->currencyManager->selectedCurrency,
                                                        'currencies'       => UsniAdaptor::app()->currencyManager->currencyCodes,
                                                        'actionUrl'        => '/customer/site/set-currency',
                                                        'view'             => $this
                                                    ]);*/
                ?>
            </ul>
        </div>
        
        </div-->
    
<!--header>
    <div class="container header-row">
        <div class="row">
            <div class="col-sm-4">
                <div id="logo">
                    <?php //echo $this->render("//common/_logo");?>
                </div>
            </div>
            <div class="col-sm-5">
                <?php //echo $this->render("//common/_navSearch");?>
            </div>
            <div class="col-sm-3">
                <?php //echo $this->render("//cart/_minicart");?>
            </div>
        </div>
    </div>
</header-->