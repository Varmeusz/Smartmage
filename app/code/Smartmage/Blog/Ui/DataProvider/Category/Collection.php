<?php

namespace Smartmage\Blog\Ui\DataProvider\Category;

use Magento\Framework\View\Element\UiComponent\DataProvider\SearchResult;


class Collection extends SearchResult
{
    /**
     * Override _initSelect to add custom columns
     *
     * @return void
     */
    protected function _initSelect()
    {
        $this->addFilterToMap('category_id', 'main_table.category_id');
        $this->addFilterToMap('title', 'sm_blog_category.title');
        parent::_initSelect();
    }
}