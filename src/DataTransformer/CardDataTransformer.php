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
        list($month, $year) = explode('/', $value['expires']);

        $card = new Card();
        $card
            ->setId($value['id'])
            ->setHolder($value['card_holder'])
            ->setNumber($value['card_number'])
            ->setExpireAt(new \DateTime(sprintf('%d-%d-01 00:00:00', $year, $month)))
            ->setCreatedAt(new \DateTime($value['bound_at']));

        return $card;
    }
}
