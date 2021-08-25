<?php
namespace Smartmage\Blog\Model\ResourceModel;



class PostCategories extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct() {
        $this->_init('sm_blog_post_category', 'id');
    }
}