<?php
namespace SafeCrow\DataTransformer;

use SafeCrow\Model\Setting;

/**
 * Class SettingDataTransformer
 * @package SafeCrow\DataTransformer
 */
class SettingDataTransformer implements DataTransformerInterface
{
    /**
     * @param array $value
     * @return Setting
     */
    public function transform(array $value) : Setting
    {
        $setting = new Setting();
        $setting
            ->setCallbackUrl($value['callback_url']);

        return $setting;
    }
}
