<?php

namespace Smartmage\Blog\Model;

class Category extends \Magento\Framework\Model\AbstractModel implements \Magento\Framework\DataObject\IdentityInterface
{
    /**
     *
     */
    const CACHE_TAG = 'sm_blog_category';
    /**
     * @var string
     */
    protected $_cacheTag = 'sm_blog_category';
    /**
     * @var string
     */
    protected $_eventPrefix = 'sm_blog_category';

    /**
     *
     */
    protected function _construct()
    {
        $this->_init('Smartmage\Blog\Model\ResourceModel\Category');
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