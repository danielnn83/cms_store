<?php
use usni\UsniAdaptor;
use yii\helpers\Url;

/* @var $this \frontend\web\View */
$loggedInUser = UsniAdaptor::app()->user->getId();
$this->title = $this->params['breadcrumbs'][] = UsniAdaptor::t('order', 'Pedido completo');
?>
<div class="well">
    <p><?php echo UsniAdaptor::t('cart', "Gracias por hacer un pedido con nosotros. En caso de cualquier consulta, contáctenos de nuevo");?> 
        <?php
        if($loggedInUser != null)
        {
            $myOrdersUrl = UsniAdaptor::createUrl('customer/site/order-history');
            echo "Por favor, revisa tus pedidos abajo <a href='" . $myOrdersUrl . "'>" . UsniAdaptor::t('order', 'Mis pedidos') . "</a> sección.";
        }
        ?>
    </p>
    <p>En caso de que tu tengas una pregunta, Por favor <a href="mailto:preguntas@correopreguntas.com?Subject=Pregunta" target="_top">enviar email</a>.</p>
    <div class="buttons text-right">
        <a href="<?php echo Url::home()?>" class="btn btn-success"><?php echo UsniAdaptor::t('application', 'Continuar');?></a>
    </div>
</div>
