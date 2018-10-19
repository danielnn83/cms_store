<?php
use cart\widgets\HeaderCartSubView;

/* @var $this \frontend\web\View */

?>

<?php echo HeaderCartSubView::widget();?>

<?php
$script = "$('body').on('click', '#cart > .heading a', function() {
                    $('#cart').addClass('active');

                    $('body').on('mouseleave', '#cart', function() {
                        $(this).removeClass('active');
                    });
                });";
$this->registerJs($script);