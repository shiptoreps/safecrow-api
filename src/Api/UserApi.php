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

        $response = $this->post('/users/'.$id, $params);

        return $this->getResult($response, new UserDataTransformer());
    }

    /**
     * @param array $params
     * @return array
     */
    public function all(array $params = []): array
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefaults([
                'email' => null,
            ])
            ->setAllowedTypes('email', ['string', 'null']);

        $params = array_filter($resolver->resolve($params));

        $response = $this->get('/users', $params);

        return $this->getArrayResult($response, new UserDataTransformer());
    }

    /**
     * @param int $id
     * @return User
     */
    public function show(int $id): User
    {
        $response = $this->get('/users/'.$id);

        return $this->getResult($response, new UserDataTransformer());
    }

    /**
     * @param int $id
     * @return array
     */
    public function orders(int $id): array
    {
        $response = $this->get('/users/'.$id.'/orders');

        return $this->getArrayResult($response, new OrderDataTransformer());
    }

    /**
     * @param int   $id
     * @param array $params
     * @return string
     */
    public function bind(int $id, array $params): string
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'redirect_url',
            ])
            ->setAllowedTypes('redirect_url', 'string');

        $params = $resolver->resolve($params);

        $response = $this->post('/users/'.$id.'/bind_card', $params);

        return $this->getSingleResult($response, 'redirect_url');
    }

    /**
     * @param int   $id
     * @param array $params
     * @return array
     */
    public function cards(int $id, array $params = []): array
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setDefault('all', null)
            ->setAllowedTypes('all', ['bool', 'null']);

        $params = array_filter($resolver->resolve($params));

        $response = $this->get('/users/'.$id.'/cards', $params);

        return $this->getArrayResult($response, new CardDataTransformer());
    }
}
