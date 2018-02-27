<?php
namespace SafeCrow\DataTransformer;

use SafeCrow\Model\Card;

/**
 * Class CardDataTransformer
 * @package SafeCrow\DataTransformer
 */
class CardDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Card
     */
    public function transform(array $value) : Card
    {
        $card = new Card();
        $card
            ->setId($value['id'])
            ->setBinding($value['card_binding'])
            ->setHolder($value['card_holder'])
            ->setNumber($value['card_number'])
            ->setExpirationAt(new \DateTime(sprintf('%d-%d-01 00:00:00', $value['card_expiration_year'], $value['card_expiration_month'])))
            ->setStatus($value['status'])
            ->setCreatedAt(new \DateTime($value['created_at']))
            ->setUpdatedAt(new \DateTime($value['updated_at']))
            ->setUserId($value['user_id']);

        return $card;
    }
}
