<?php

namespace Smartmage\Blog\Block;

use Magento\CatalogInventory\Helper\Stock;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Smartmage\Blog\Model\ResourceModel\Category\CollectionFactory;

class Blog extends \Magento\Framework\View\Element\Template
{

    protected $collectionFactory;
    protected $logger;

    public function __construct(
        Context $context,
        CollectionFactory $collectionFactory,
        \Psr\Log\LoggerInterface $logger
    )
    {
        $this->collectionFactory = $collectionFactory;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function getCategories()
    {
        $collection = $this->collectionFactory->create();
        $collection->setOrder('created_at', 'DESC');

        $items = $collection->getItems();
        $data = [];
        foreach($items as $model){
            $data[] = $model->getData();
        }
        
        // print_r($data);
        return $data;
    }
}
