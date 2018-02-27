<?php
namespace SafeCrow\DataTransformer;

use SafeCrow\Model\Order;

/**
 * Class OrderDataTransformer
 * @package SafeCrow\DataTransformer
 */
class OrderDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Order
     */
    public function transform(array $value) : Order
    {
        $order = new Order();
        $order
            ->setId($value['id'])
            ->setConsumerId($value['consumer_id'])
            ->setSupplierId($value['supplier_id'])
            ->setPrice($value['price'])
            ->setFee($value['fee'])
            ->setFeePayer($value['fee_payer'])
            ->setStatus($value['status'])
            ->setDescription($value['description'])
            ->setSupplierPayoutMethodId($value['supplier_payout_method_id'])
            ->setConsumerPayoutMethodId($value['consumer_payout_method_id'])
            ->setSupplierPayoutMethodType($value['supplier_payout_method_type'])
            ->setConsumerPayoutMethodType($value['consumer_payout_method_type'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']))
            ->setExtra($value['extra']);

        return $order;
    }
}
