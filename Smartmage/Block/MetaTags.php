<?php

namespace Smartmage\Smartmage\Block;

use \Magento\Framework\View\Element\Template\Context;
use \Magento\Framework\View\Page\Config;
use \Smartmage\Smartmage\Helper\Data;

class MetaTags extends \Magento\Framework\View\Element\Template
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
    
    public function setTags()
    {
        $this->pageConfig->getTitle()->set(__($this->getTitleTag()));
        $this->pageConfig->setRobots(__($this->getRobots()));
        $this->pageConfig->setDescription(__($this->getDescription()));
    }
    public function getTitleTag()
    {
        return $this->helper->getConfig('Smartmage-meta-section/smartmage-meta-groups/meta-title-tag');
    }
    public function getDescription()
    {
        return $this->helper->getConfig('Smartmage-meta-section/smartmage-meta-groups/meta-description-tag');
    }
    public function getRobots()
    {
        return $this->helper->getConfig('Smartmage-meta-section/smartmage-meta-groups/meta-robots-tag');
    }
}
