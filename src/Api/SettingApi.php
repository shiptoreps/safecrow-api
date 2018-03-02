<?php
namespace SafeCrow\Api;

use SafeCrow\DataTransformer\SettingDataTransformer;
use SafeCrow\Model\Setting;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Class SettingApi
 * @package SafeCrow\Api
 */
class SettingApi extends AbstractApi
{
    /**
     * @return Setting
     */
    public function show(): Setting
    {
        $response = $this->get('/settings');

        return $this->getResult($response, new SettingDataTransformer());
    }

    /**
     * @param array $params
     * @return Setting
     */
    public function edit(array $params): Setting
    {
        $resolver = new OptionsResolver();
        $resolver
            ->setRequired([
                'callback_url',
            ])
            ->setAllowedTypes('callback_url', ['string', 'null']);

        $params = array_filter($resolver->resolve($params));

        $response = $this->post('/settings', $params);

        return $this->getResult($response, new SettingDataTransformer());
    }
}
