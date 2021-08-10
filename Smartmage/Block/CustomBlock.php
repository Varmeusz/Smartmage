<?php

namespace Smartmage\Smartmage\Block;

use Magento\CatalogInventory\Helper\Stock;
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
        // $this->stockFilter = $stockFilter;
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
        $productCollection = $this->collectionFactory->create()
        ->addAttributeToSelect('*')
        ->joinField('qty',
        'cataloginventory_stock_item',
        'qty',
        'product_id=entity_id',
        '{{table}}.stock_id=1',
        'left');

        // $productCollection->getSelect()->joinLeft()
        // $productCollection->addAttributeToFilter('name', array('like' => '%pack%'));
        $productQtyLimit = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_count');
        $productPriceLimit = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_price');
        // $productCollection->addAttributeToFilter('name', array('like' => '%firm%'));
        $productCollection->addAttributeToFilter('price', array('lt' => $productPriceLimit));
        $productCollection->addAttributeToFilter('qty', array('gt' => $productQtyLimit));
        $productCollection->addAttributeToFilter('status', array('eq' => 1));
        $productCollection->addAttributeToFilter('visibility', array('eq' => 4));

        echo "<br>".$productCollection->getSelect()."<br>";
        // $productCollection->addAttributeToFilter('qty', array('gt' => '50'));
        // $productCollection->addAttributeToFilter('qty', array('lt' => '10'));


        
        foreach($productCollection as $product)
        {
            // print_r($product->getData());
            echo 'Name = '.$product->getName().'<br>';
            // $images = $product->getMediaGalleryImages();
            // foreach($images as $image){
            //     echo $image->getUrl();
            //     echo "<img src=\"".$image->getUrl()."\"/>";
            // }
        }
    }
    
    public function getMyData()
    {
        return "Hello from custom block";
    }
}
