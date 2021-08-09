<?php

namespace Smartmage\Smartmage\Block;

use Magento\Framework\View\Element\Template\Context;
use \Smartmage\Smartmage\Helper\Data;
class MetaTags extends \Magento\Framework\View\Element\Template
{

    protected $helper;
    public function __construct(
        Context $context,
        Data $helper
    )
    {
        $this->helper = $helper;
        parent::__construct($context);
    }

    public function getTitle()
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
