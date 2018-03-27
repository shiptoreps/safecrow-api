<?php
namespace SafeCrow\DataTransformer;

use SafeCrow\Model\Calculate;

/**
 * Class CalculateDataTransformer
 * @package SafeCrow\DataTransformer
 */
class CalculateDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Calculate
     */
    public function transform(array $value) : Calculate
    {
        $card = new Calculate();
        $card
            ->setPrice($value['price'])
            ->setSupplierServiceCost($value['supplier_service_cost'])
            ->setConsumerServiceCost($value['consumer_service_cost'])
            ->setConsumerCancellationCost($value['consumer_cancellation_cost'] ?? null);

        return $card;
    }
}
