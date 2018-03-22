<?php
namespace SafeCrow\Api;

use SafeCrow\DataTransformer\OrderDataTransformer;
use SafeCrow\Model\Order;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class OrderApi
 * @package SafeCrow\Api
 */
class OrderApi extends AbstractApi
{
    /**
     * @param array $params
     * @return Order
     */
    public function add(array $params) : Order
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'consumer_id',
                'supplier_id',
                'price',
                'description',
                'fee_payer',
                'extra',
            ])
            ->setAllowedTypes('consumer_id', 'int')
            ->setAllowedTypes('supplier_id', 'int')
            ->setAllowedTypes('price', 'int')
            ->setAllowedTypes('description', 'string')
            ->setAllowedTypes('fee_payer', 'string')
            ->setAllowedTypes('extra', 'array')
            ->setAllowedValues('fee_payer', [Order::PAYER_HALF, Order::PAYER_CONSUMER, Order::PAYER_SUPPLIER]);

        $params = $resolver->resolve($params);

        $response = $this->post('/orders', $params);

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $response = $this->get('/orders');

        return $this->getArrayResult($response, new OrderDataTransformer());
    }

    /**
     * @param int $id
     * @return Order
     */
    public function show(int $id) : Order
    {
        $response = $this->get('/orders/'.$id);

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @param int   $id
     * @param array $params
     * @return string
     */
    public function pay(int $id, array $params) : string
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'redirect_url',
            ])
            ->setAllowedTypes('redirect_url', 'string');

        $params = $resolver->resolve($params);

        $response = $this->post('/orders/'.$id.'/pay', $params);

        return $this->getSingleResult($response, 'redirect_url');
    }

    /**
     * @param int   $id
     * @param array $params
     * @return Order
     */
    public function annul(int $id, array $params) : Order
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'reason',
            ])
            ->setAllowedTypes('reason', 'string');

        $params = $resolver->resolve($params);

        $response = $this->post('/orders/'.$id.'/annul', $params);

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @param int   $id
     * @param array $params
     * @return Order
     */
    public function cancel(int $id, array $params): Order
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'reason',
            ])
            ->setAllowedTypes('reason', 'string');

        $params = $resolver->resolve($params);

        $response = $this->post('/orders/'.$id.'/cancel', $params);

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @param int $id
     * @return Order
     */
    public function close(int $id) : Order
    {
        $response = $this->get('/orders/'.$id.'/close');

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @param int   $id
     * @param array $params
     * @return Order
     */
    public function exception(int $id, array $params) : Order
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'reason',
            ])
            ->setAllowedTypes('reason', 'string');

        $params = $resolver->resolve($params);

        $response = $this->post('/orders/'.$id.'/exception', $params);

        return $this->getResult($response, new OrderDataTransformer());
    }

    /**
     * @param int   $userId
     * @param int   $orderId
     * @param array $params
     * @return Order
     */
    public function bind(int $userId, int $orderId, array $params) : Order
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'card_id',
            ])
            ->setAllowedTypes('card_id', 'int');

        $params = $resolver->resolve($params);

        $response = $this->post('/users/'.$userId.'/orders/'.$orderId.'/bind_card', $params);

        return $this->getResult($response, new OrderDataTransformer());
    }
}
