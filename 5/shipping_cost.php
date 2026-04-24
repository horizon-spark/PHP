<?php 
    $orderAmount = 4000;
    $deliveryType = "standard";
    $shippingCost;

    if ($orderAmount > 5000) {
        $shippingCost = 0;
    } else {
        if ($deliveryType == "express") {
            $shippingCost = 500;
        } else {
            $shippingCost = 200;
        }
    }

    echo "Стоимость доставки: $shippingCost";
?>