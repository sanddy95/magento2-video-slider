<?php

namespace Techeniac\VideoSlider\Helper;

class Data extends \Magento\Framework\App\Helper\AbstractHelper
{
    const VIDEO_MUTE = 'slider/general/mute_video';

    public function __construct(
        \Magento\Framework\App\Helper\Context $context
    ) {
        parent::__construct($context);
    }
    public function getMuteValue()
    {
        return $this->scopeConfig->getValue(
            self::VIDEO_MUTE,
            \Magento\Store\Model\ScopeInterface::SCOPE_STORE
        );
    }
}
