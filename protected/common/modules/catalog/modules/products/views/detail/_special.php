<?php
use usni\UsniAdaptor;
use usni\library\utils\DateTimeUtil;
?>
<table id="special-value-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td class="text-left"><?php echo UsniAdaptor::t('customer', 'Grupo de clientes');?></td>
            <td class="text-right"><?php echo UsniAdaptor::t('products', 'Prioridad');?></td>
            <td class="text-left"><?php echo UsniAdaptor::t('products', 'Precio');?></td>
            <td class="text-right"><?php echo UsniAdaptor::t('products', 'Fecha de inicio');?></td>
            <td class="text-left"><?php echo UsniAdaptor::t('products', 'Fecha de fin');?></td>
            <td class="text-right"></td>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($productSpecials as $index => $productSpecial)
        {
            ?>
        <tr>
            <td class="text-left">
                <?php echo $productSpecial['groupName']; ?>
            </td>
            <td class="text-right">
                <?php echo $productSpecial['priority']; ?>
            </td>
            <td class="text-left">
                <?php echo $productSpecial['price']; ?>
            </td>
            <td class="text-right">
                <?php echo DateTimeUtil::getFormattedDateTime($productSpecial['start_datetime']); ?>
            </td>
            <td class="text-left">
                <?php echo DateTimeUtil::getFormattedDateTime($productSpecial['end_datetime']); ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

