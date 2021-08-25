<?php

namespace Smartmage\Blog\Model\ResourceModel\PostCategories;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'sm_blog_post_category_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'postcategories_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Smartmage\Blog\Model\PostCategories', 'Smartmage\Blog\Model\ResourceModel\PostCategories');

    }
}