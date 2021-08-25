<?php
/**
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Smartmage\Blog\Model\Category\Form;

use Smartmage\Blog\Model\ResourceModel\Category\CollectionFactory;



class Options implements \Magento\Framework\Option\ArrayInterface
{
    protected $_collectionFactory;

    public function __construct(
        CollectionFactory $collectionFactory
    ){
        $this->_collectionFactory = $collectionFactory;
    }

    public function toOptionArray()
    {
        $collection = $this->_collectionFactory->create();

        $options = [['label' => '', 'value' => '']];

        foreach($collection as $category) {
            $options[] =[
                'label' => $collection->getTitile(),
                'value' => $collection->getId()
            ];
        }

        return $options;
    }
}