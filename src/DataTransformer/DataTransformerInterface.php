<?php
namespace SafeCrow\DataTransformer;

/**
 * Interface DataTransformerInterface
 * @package SafeCrow\DataTransformer
 */
interface DataTransformerInterface
{
    /**
     * @param array $value
     * @return mixed
     */
    public function transform(array $value);
}
