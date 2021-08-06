<?php

namespace Smartmage\Smartmage\Block;

class CustomBlock extends \Magento\Framework\View\Element\Template
{
    public function _prepareLayout()
    {
        parent::_prepareLayout();
        $this->pageConfig->getTitle()->set(__('First Hello World Module'));
        return $this;
    }
}
