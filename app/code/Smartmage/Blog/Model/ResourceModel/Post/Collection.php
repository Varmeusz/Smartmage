<?php

namespace Smartmage\Blog\Model\ResourceModel\Post;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'post_id';
    /**
     * @var string
     */
    protected $_eventPrefix = 'sm_blog_post_collection';
    /**
     * @var string
     */
    protected $_eventObject = 'post_collection';

    /**
     * Define resource model
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Smartmage\Blog\Model\Post', 'Smartmage\Blog\Model\ResourceModel\Post');

    }
}