<?php

namespace SafeCrow\Api;

use SafeCrow\DataTransformer\CalculateDataTransformer;
use SafeCrow\Model\Calculate;
use SafeCrow\Model\Order;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class CalculateApi
 * @package SafeCrow\Api
 */
class CalculateApi extends AbstractApi
{
    /**
     * @param array $params
     * @return Calculate
     */
    public function calculate(array $params): Calculate
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'price',
                'service_cost_payer',
                'consumer_cancellation_cost',
            ])
            ->setDefaults([
                'consumer_cancellation_cost' => null,
            ])
            ->setAllowedTypes('price', 'int')
            ->setAllowedTypes('service_cost_payer', 'string')
            ->setAllowedTypes('consumer_cancellation_cost', ['int', 'null'])
            ->setAllowedValues('service_cost_payer', [Order::PAYER_HALF, Order::PAYER_CONSUMER, Order::PAYER_SUPPLIER]);

        $params = $resolver->resolve($params);

        $response = $this->post('/calculate', $params);

        return $this->getResult($response, new CalculateDataTransformer());
    }
}
