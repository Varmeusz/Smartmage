<?php
namespace Smartmage\Blog\Model\ResourceModel;



class Post extends \Magento\Framework\Model\ResourceModel\Db\AbstractDb
{
    protected function _construct() {
        $this->_init('sm_blog_post', 'post_id');
    }
}