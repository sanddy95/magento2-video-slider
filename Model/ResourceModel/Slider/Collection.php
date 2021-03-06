<?php

/**
 * PHP version 7.1
 *
 * @category  Techeniac
 * @package   Techeniac\VideoSlider\Model\ResourceModel\Slider
 * @author    Techeniac <support@techeniac.com>
 * @copyright 2019 This file was generated by Techeniac
 * @license   http://www.techeniac.com Open Software License (OSL 3.0)
 * @link      http://www.techeniac.com
 */

namespace Techeniac\VideoSlider\Model\ResourceModel\Slider;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * PHP version 7.1
 *
 * @category  Techeniac
 * @package   Techeniac\VideoSlider\Model\ResourceModel\Slider
 * @author    Techeniac <support@techeniac.com>
 * @copyright 2019 This file was generated by Techeniac
 * @license   http://www.techeniac.com Open Software License (OSL 3.0)
 * @link      http://www.techeniac.com
 */

class Collection extends AbstractCollection
{

    /**
     * Id Initialize
     *
     * @var string
     */
    protected $idFieldName = 'id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Techeniac\VideoSlider\Model\Slider', 'Techeniac\VideoSlider\Model\ResourceModel\Slider');
    }
}
