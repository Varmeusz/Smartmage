<?php
namespace Smartmage\Smartmage\Controller\Adminhtml\Page;

use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

class Index extends Action implements HttpGetActionInterface
{
        const MENU_ID = 'Smartmage_Smartmage::menu';
        protected $resultPageFactory = false;      

        public function __construct(
                Context $context,
                PageFactory $resultPageFactory
        ) {
                parent::__construct($context);
                $this->resultPageFactory = $resultPageFactory;
        } 
        public function execute()
        {
                $resultPage = $this->resultPageFactory->create();
                $resultPage->setActiveMenu(static::MENU_ID);
                $resultPage->getConfig()->getTitle()->prepend(__('Smartmage Page route'));
                return $resultPage;
        }
        protected function _isAllowed()
        {
                return $this->_authorization->isAllowed('Smartmage_Smartmage::menu');
        }
}
