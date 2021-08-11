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

        $productQtyLimit = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_count');
        $productPriceLimit = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_price');
        $productLimit = $this->helper->getConfig('Smartmage-section/Smartmage_product_group/product_limit');

        $productCollection->addAttributeToFilter('price', array('lt' => $productPriceLimit));
        $productCollection->addAttributeToFilter('qty', array('gt' => $productQtyLimit));
        $productCollection->addAttributeToFilter('status', array('eq' => 1));
        $productCollection->addAttributeToFilter('visibility', array('neq' => 1));
        $productCollection->setOrder('created_at', 'DESC');
        $productCollection->setPageSize($productLimit);
        echo "<br>".$productCollection->getSelect()."<br>";


        $count = 0;
        $productData=array();
        foreach($productCollection as $product)
        {
            $imgurl = $this->getUrl();
            $imgPath = $imgurl."media/catalog/product".$product->getData("image");
            echo "<div class='product'>";
            echo "<h1>".$product->getName()."</h1>";
            echo "<h2>".$product->getData()["price"]."</h2>";
            echo "<img class=\"myimg\" src=\"".$imgPath."\"/>";
            echo "</div>";
        }
    }
    
    public function getMyData()
    {
        return "Hello from custom block";
    }
}
