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

use Magento\Backend\App\Action;

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

class Edit extends Action
{
    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    private $coreRegistry = null;

    /**
     * Resultfactory
     *
     * @var \Magento\Framework\View\Result\PageFactory
     */
    private $resultPageFactory;

    private $sliderLoader;

    private $sessionModel;

    /**
     * Initialize
     *
     * @param Action\Context $context           Initialize Context
     * @param PageFactory    $resultPageFactory Initialize resultfactory
     * @param Registry       $registry          Initialize registry
     * @param SliderLoader   $sliderLoader      Initialize Slider model
     * @param SessionModel   $sessionModel      Initialize Backend Session Model
     */
    public function __construct(
        Action\Context $context,
        \Magento\Framework\View\Result\PageFactory $resultPageFactory,
        \Magento\Framework\Registry $registry,
        \Techeniac\VideoSlider\Model\Slider $sliderLoader,
        \Magento\Backend\Model\Session $sessionModel
    ) {
        $this->resultPageFactory = $resultPageFactory;
        $this->coreRegistry = $registry;
        $this->sliderLoader = $sliderLoader;
        $this->sessionModel = $sessionModel;
        parent::__construct($context);
    }

    /**
     * {@inheritdoc}
     *
     * @return NUll
     */
    public function _isAllowed()
    {
        return $this->_authorization->isAllowed('Techeniac_VideoSlider::save');
    }

    /**
     * Init actions
     *
     * @return \Magento\Backend\Model\View\Result\Page
     */
    public function _initAction()
    {
        /**
         * Load layout, set active menu and breadcrumbs
         *
         * @var \Magento\Backend\Model\View\Result\Page $resultPage
         */
        $resultPage = $this->resultPageFactory->create();
        $resultPage->setActiveMenu('Techeniac_VideoSlider::Slider')
            ->addBreadcrumb(__('Video Slider'), __('Video Slider'))
            ->addBreadcrumb(__('Manage Slider Details'), __('Manage Slider Details'));
        return $resultPage;
    }

    /**
     * Edit Video post
     *
     * @return \Magento\Backend\Model\View\Result\Page|\Magento\Backend\Model\View\Result\Redirect
     */
    public function execute()
    {
        $id = $this->getRequest()->getParam('id');
        $model = $this->sliderLoader;

        if ($id) {
            $model->load($id);
            if (!$model->getId()) {
                $this->messageManager->addError(__('This post no longer exists.'));
                /**
                 * \Magento\Backend\Model\View\Result\Redirect $resultRedirect
                 */
                $resultRedirect = $this->resultRedirectFactory->create();

                return $resultRedirect->setPath('*/*/');
            }
        }

        $data = $this->sessionModel->getFormData(true);

        if (!empty($data)) {
            $model->setData($data);
        }

        $this->coreRegistry->register('videoslider_slider', $model);

        $resultPage = $this->_initAction();
        $resultPage->addBreadcrumb(
            $id ? __('Edit Slider Detail') : __('New Slider Detail'),
            $id ? __('Edit Slider Detail') : __('New Slider Detail')
        );
        $resultPage->getConfig()->getTitle()->prepend(__('Sliders'));
        $resultPage->getConfig()->getTitle()
            ->prepend($model->getId() ? $model->getTitle() : __('New Slider Detail'));

        return $resultPage;
    }
}
