<?php
namespace SafeCrow\DataTransformer;

use SafeCrow\Model\User;

/**
 * Class UserDataTransformer
 * @package SafeCrow\DataTransformer\Model
 */
class UserDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return User
     */
    public function transform(array $value) : User
    {
        $user = new User();
        $user
            ->setId($value['id'])
            ->setName($value['name'])
            ->setEmail($value['email'])
            ->setPhone($value['phone'])
            ->setRegisteredAt(new \DateTime($value['registered_at']));

        return $user;
    }
}
