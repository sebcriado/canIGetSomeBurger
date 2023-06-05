<?php

namespace App\Model;

//2. Import de classes
use App\Core\AbstractModel;
use App\Entity\Order;

class OrderModel extends AbstractModel{

    function getAllOrders()
    {
        $sql = 'SELECT * FROM order
        ORDER BY orderId';

        $results = $this->db->getAllResults($sql);

        $orders = [];
        foreach ($results as $result) {
            $orders[] = new Order($result);
        }

        return $orders;
    }


    function getOrderId(int $orderId)
    {
        $sql = 'SELECT * 
            FROM order
            WHERE orderId = ?';

        $result = $this->db->getOneResult($sql, [$orderId]);

        if (empty($result)) {
            return null;
        }

        return new Order($result);
    }
}