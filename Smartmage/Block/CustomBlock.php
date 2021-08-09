<?php

namespace Smartmage\Smartmage\Block;

use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
use Magento\Framework\View\Element\Template\Context;
use \Smartmage\Smartmage\Helper\Data;

class CustomBlock extends \Magento\Framework\View\Element\Template
{

    protected $helper;
    protected $collectionFactory;

    public function __construct(
        Context $context,
        Data $helper,
        CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
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
        $productData = array(
            "productCount" => $productCount, 
            "productPrice" => $productPrice, 
            "productImage" => $productImage, 
            "productAlt"   => $productImageAlt, 
            "productTitle" => $productImageTitle);
        return $productData;
    }
    

    public function getMyCollection()
    {
        $productCollection = $this->collectionFactory->create();
        $productCollection->addAttributeToSelect(['name', 'price', 'image', 'qty']);
        // $productCollection->addAttributeToFilter('name', array('like' => '%pack%'));
        $productCollection->addAttributeToFilter('name', array('like' => '%firm%'));

        // $productCollection->addAttributeToFilter('qty', array('gt' => '50'));
        // $productCollection->addAttributeToFilter('qty', array('lt' => '10'));


        
        foreach($productCollection as $product)
        {
            echo 'Name = '.$product->getName().'<br>';
            $images = $product->getMediaGalleryImages();
            foreach($images as $image){
                echo "<img src=\"".$image->getUrl()."\"/>";
            }
        }
    }
    
    public function getMyData()
    {
        return "Hello from custom block";
    }
}
