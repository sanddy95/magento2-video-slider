<?php

/**
 * PHP version 7.1
 *
 * @category  Techeniac
 * @package   Techeniac\VideoSlider\Controller\Adminhtml\Slider
 * @author    Techeniac <buzz@techeniac.com>
 * @copyright 2019 This file was generated by Techeniac
 * @license   http://www.techeniac.com Open Software License (OSL 3.0)
 * @link      http://www.techeniac.com
 */
namespace Techeniac\VideoSlider\Controller\Adminhtml\Slider;

use Magento\Backend\App\Action\Context;
use Magento\Ui\Component\MassAction\Filter;
use Techeniac\VideoSlider\Model\ResourceModel\Slider\CollectionFactory;
use Magento\Framework\Controller\ResultFactory;

/**
 * PHP version 7.1
 *
 * @category  Techeniac
 * @package   Techeniac\VideoSlider\Controller\Adminhtml\Slider
 * @author    Techeniac <buzz@techeniac.com>
 * @copyright 2019 This file was generated by Techeniac
 * @license   http://www.techeniac.com Open Software License (OSL 3.0)
 * @link      http://www.techeniac.com
 */
class MassEnable extends \Magento\Backend\App\Action
{
    /**
     * Filter variable
     *
     * @var Filter
     */
    private $filter;

    /**
     * Collectionfactory variable
     *
     * @var CollectionFactory
     */
    private $collectionFactory;

    /**
     * Initialize
     *
     * @param Context           $context           Initialize context
     * @param Filter            $filter            Initialize filter
     * @param CollectionFactory $collectionFactory Initialize collectionfactory
     */
    public function __construct(
        Context $context,
        Filter $filter,
        CollectionFactory $collectionFactory
    ) {
        $this->filter = $filter;
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }
    /**
     * Execute action
     *
     * @return \Magento\Backend\Model\View\Result\Redirect
     * @throws \Magento\Framework\Exception\LocalizedException|\Exception
     */
    public function execute()
    {
        $collection = $this->filter
            ->getCollection($this->collectionFactory->create());

        foreach ($collection as $item) {
            $item->setIsActive(true);
            $item->save();
        }

        $this->messageManager->addSuccess(
            __(
                'A total of %1 record(s) have been enabled.',
                $collection->getSize()
            )
        );

        /**
         *  Redirect to page
         *
         * @var \Magento\Backend\Model\View\Result\Redirect $resultRedirect
         */
        $resultRedirect = $this->resultFactory->create(ResultFactory::TYPE_REDIRECT);
        return $resultRedirect->setPath('*/*/');
    }
}
