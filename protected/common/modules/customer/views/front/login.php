<?php
use usni\UsniAdaptor;

/* @var $this \frontend\web\View */
?>
<div class="row">
    <div class="col-sm-6">
        <div class="well">
            <h2><?php echo UsniAdaptor::t('customer', 'Nuevo Cliente');?></h2>
            <p><strong><?php echo UsniAdaptor::t('customer', 'Registrar cuenta');?></strong></p>
            <p><?php echo UsniAdaptor::t('customer', 'Crear una cuenta hará que tus compras sean una experiencia agradable. Haría la gestión de pedidos y seguimiento mucho más amigable.')?></p>
            <a href="<?php echo UsniAdaptor::createUrl('/customer/site/register');?>" class="btn btn-success"><?php echo UsniAdaptor::t('application', 'Continuar');?></a>
        </div>
    </div>	 
    <div class="col-sm-6">
        <div class="well">
            <?php echo $this->render('/front/_loginform', ['formDTO' => $formDTO]);?>
        </div>
    </div>
</div>
        
