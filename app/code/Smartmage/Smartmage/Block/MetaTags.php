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
        // $pageMainTitle = $this->getLayout()->getBlock('page.main.title');
        // $pageMainTitle->setPageTitle($this->getTitleTag());
        // $this->pageConfig->getTitle()->set(__($this->getTitleTag()));
        $this->pageConfig->setRobots(__($this->getRobots()));
        $this->pageConfig->setDescription(__($this->getDescription()));
    }
    public function getTitleTag()
    {
        return $this->helper->getConfig('Smartmage_meta_section/smartmage_meta_groups/meta_title_tag');
    }
    public function getDescription()
    {
        return $this->helper->getConfig('Smartmage_meta_section/smartmage_meta_groups/meta_description_tag');
    }
    public function getRobots()
    {
        return $this->helper->getConfig('Smartmage_meta_section/smartmage_meta_groups/meta_robots_tag');
    }
}
