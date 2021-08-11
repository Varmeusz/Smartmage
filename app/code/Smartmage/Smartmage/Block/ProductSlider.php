<?php

namespace Smartmage\Smartmage\Block;

use Magento\Framework\View\Element\Template\Context;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory;
class ProductSlider extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory
    )
    {
        $this->collectionFactory = $collectionFactory;
        parent::__construct($context);
    }

    public function getMyCollection()
    {
        $productCollection = $this->collectionFactory->create();
        $productCollection->addAttributeToSelect('*');
        foreach($productCollection as $product)
        {
            echo 'Name = '.$product->getName().'<br>';
        }
    }
}
