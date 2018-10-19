<?php
use usni\UsniAdaptor;
use usni\library\utils\DateTimeUtil;
?>
<table id="discount-value-table" class="table table-striped table-bordered table-hover">
    <thead>
        <tr>
            <td class="text-left"><?php echo UsniAdaptor::t('customer', 'Grupo de clientes'); ?></td>
            <td class="text-right"><?php echo UsniAdaptor::t('products', 'Cantidad'); ?></td>
            <td class="text-left"><?php echo UsniAdaptor::t('products', 'Prioridad'); ?></td>
            <td class="text-right"><?php echo UsniAdaptor::t('products', 'Precio'); ?></td>
            <td class="text-left"><?php echo UsniAdaptor::t('products', 'Fecha de inicio'); ?></td>
            <td class="text-right"><?php echo UsniAdaptor::t('products', 'Fecha de fin'); ?></td>
            <td class="text-left"></td>
        </tr>
    </thead>
    <tbody>
        <?php 
        foreach($productDiscounts as $index => $productDiscount)
        {
            ?>
        <tr>
            <td class="text-left">
                <?php echo $productDiscount['groupName']; ?>
            </td>
            <td class="text-right">
                <?php echo $productDiscount['quantity']; ?>
            </td>
            <td class="text-left">
                <?php echo $productDiscount['priority']; ?>
            </td>
            <td class="text-right">
                <?php echo $productDiscount['price']; ?>
            </td>
            <td class="text-left">
                <?php echo DateTimeUtil::getFormattedDateTime($productDiscount['start_datetime']); ?>
            </td>
            <td class="text-right">
                <?php echo DateTimeUtil::getFormattedDateTime($productDiscount['end_datetime']); ?>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

