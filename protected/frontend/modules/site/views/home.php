<?php
use usni\UsniAdaptor;

/* @var $this \frontend\web\View */
/* @var $homePageDTO \frontend\dto\HomePageDTO */

$this->title = UsniAdaptor::t('application', 'SOLÁ TEXTIL');

echo $this->render('/_carousel');
echo "<br /><h3>" . UsniAdaptor::t('products', 'Categorías') . "</h3>";

echo $this->renderNavBar();
echo "<h3>" . UsniAdaptor::t('products', 'últimos productos') . "</h3>";
echo $this->render('/_latestproductslist', ['products' => $homePageDTO->getLatestProducts()]);

