<?php
use yii\widgets\Breadcrumbs;
use usni\UsniAdaptor;
use yii\helpers\Url;
if(!empty($this->params['breadcrumbs']))
{
?>
<div class="container">
    <br/><br/><br/><br/><br/>
    <?php
        echo Breadcrumbs::widget(
                                [
                                    'links'                => $this->params['breadcrumbs'],
                                    'homeLink'             => [
                                                                'label' => UsniAdaptor::t('application', 'SOLÁ TEXTIL'),
                                                                'url'   => Url::home()
                                                              ],
                                ]
                            )
    ?>
</div>
<?php
}

