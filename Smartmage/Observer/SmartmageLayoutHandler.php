<?php

namespace Smartmage\Smartmage\Observer;

class CustomLayoutHandler implements \Magento\Framework\Event\ObserverInterface
{
    public function __construct(
        \Magento\Framework\View\Result\Page $pageResult,
        \Magento\Cms\Model\Page $page
    ) {
        $this->_pageResult = $pageResult;
        $this->_page = $page;
    }

    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $layout = $observer->getData('layout');
        $currentPageLayout = $this->_pageResult->getConfig()->getPageLayout();
        //$currentPageLayout = $this->_page->getPageLayout();
        if ($currentPageLayout == "smartmage_page_index") {
            $layout->getUpdate()->addHandle('smartmage_page_index');
        }

    }
}