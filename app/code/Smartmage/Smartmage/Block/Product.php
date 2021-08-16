<?php

namespace Smartmage\Smartmage\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Page\Config;
use \Smartmage\Smartmage\Helper\Data;

class Product extends \Magento\Framework\View\Element\Template
{

    protected $helper;
    public function __construct(
        Context $context,
        Config $pageConfig,
        Data $helper
    )
    {
        $this->helper = $helper;
        $this->pageConfig = $pageConfig;
        $this->setTags();
        parent::__construct($context);
    }
    
}
