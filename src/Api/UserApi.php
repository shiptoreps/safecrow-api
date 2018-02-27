<?php

namespace SafeCrow\Api;

use SafeCrow\DataTransformer\CardDataTransformer;
use SafeCrow\DataTransformer\OrderDataTransformer;
use SafeCrow\DataTransformer\UserDataTransformer;
use SafeCrow\Model\User;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class User
 * @package SafeCrow\Api
 */
class UserApi extends AbstractApi
{
    /**
     * @param array $params
     * @return User
     */
    public function add(array $params): User
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'name',
                'phone',
                'email',
            ])
            ->setDefault('accepts_conditions', true)
            ->setAllowedTypes('name', 'string')
            ->setAllowedTypes('phone', 'string')
            ->setAllowedTypes('email', 'string')
            ->setAllowedTypes('accepts_conditions', 'bool');

        $params = $resolver->resolve($params);

        $response = $this->post('/users', $params);

        return $this->getResult($response, new UserDataTransformer());
    }

    /**
     * @param int   $id
     * @param array $params
     * @return User
     */
    public function edit(int $id, array $params): User
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefaults([
                'name' => null,
                'phone' => null,
                'email' => null,
                'accepts_conditions' => null,
            ])
            ->setAllowedTypes('name', ['string', 'null'])
            ->setAllowedTypes('phone', ['string', 'null'])
            ->setAllowedTypes('email', ['string', 'null'])
            ->setAllowedTypes('accepts_conditions', ['bool', 'null']);

        $params = array_filter($resolver->resolve($params));

        $response = $this->post('/user/'.$id, $params);

        return $this->getResult($response, new UserDataTransformer());
    }

    /**
     * @return array
     */
    public function all(): array
    {
        $response = $this->get('/users');

        return $this->getArrayResult($response, new UserDataTransformer());
    }

    /**
     * @param int $id
     * @return User
     */
    public function show(int $id): User
    {
        $response = $this->get('/user/'.$id);

        return $this->getResult($response, new UserDataTransformer());
    }

    /**
     * @param int $id
     * @return array
     */
    public function orders(int $id): array
    {
        $response = $this->get('/user/'.$id.'/orders');

        return $this->getArrayResult($response, new OrderDataTransformer());
    }

    /**
     * @param int $id
     * @return string
     */
    public function bind(int $id): string
    {
        $response = $this->post('/user/'.$id.'/bind_card');

        return $this->getSingleResult($response, 'card_binding_url');
    }

    /**
     * @param int $id
     * @return array
     */
    public function cards(int $id): array
    {
        $response = $this->get('/user/'.$id.'/cards');

        return $this->getArrayResult($response, new CardDataTransformer());
    }

    /**
     * @param int $id
     * @return array
     */
    public function cardsConfirmed(int $id): array
    {
        $response = $this->get('/user/'.$id.'/cards/confirmed');

        return $this->getArrayResult($response, new CardDataTransformer());
    }
}
