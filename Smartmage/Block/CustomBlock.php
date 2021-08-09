<?php

namespace Smartmage\Smartmage\Block;

use Magento\Framework\View\Element\Template\Context;
use \Smartmage\Smartmage\Helper\Data;
class CustomBlock extends \Magento\Framework\View\Element\Template
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

    public function getSmartmageProductData()
    {
        $productCount = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_count');
        $productPrice = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_price');
        $productImage = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_image');
        $productImageAlt = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_image_alt');
        $productImageTitle = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_image_title');
        // $productData = "<p>".$productImageTitle."</p>".
        // "<p>Product count: " . $productCount . "</p>" .
        // "<p>Product price: " . $productPrice . "</p>" .
        // "<img src=".$productImage." alt=\"".strval($productImageAlt)."\" />";
        $productData = array($productCount, $productPrice, $productImage, $productImageAlt, $productImageTitle);
        return $productData;
    }
    public function getMyData()
    {
        return "Hello from custom block";
    }
}
