<?php
namespace Smartmage\Blog\Model\ResourceModel;



class Category extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct() {
        $this->_init('sm_blog_category', 'category_id');
    }
}