<?php

namespace Smartmage\Blog\Model;

class PostCategories extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'sm_blog_post_category';
    /**
     * @var string
     */
    protected $_cacheTag = 'sm_blog_post_category';
    /**
     * @var string
     */
    protected $_eventPrefix = 'sm_blog_post_category';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Smartmage\Blog\Model\ResourceModel\PostCategories');
    }

    /**
     * @return string[]
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * @return array
     */
    public function getDefaultValues()
    {
        $values = [];
        return $values;
    }
}