<?php

namespace Smartmage\Blog\Model\ResourceModel\Category;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'category_id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'md_customer_reviews_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'reviews_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Smartmage\Blog\Model\Category', 'Smartmage\Blog\Model\ResourceModel\Category');

    }
}