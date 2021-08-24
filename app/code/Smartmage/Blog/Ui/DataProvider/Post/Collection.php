<?php

namespace Smartmage\Blog\Ui\DataProvider\Post;

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
        // $this->addFilterToMap('category_id', 'main_table.category_id');
        $this->addFilterToMap('created_at', 'main_table.created_at');
        parent::_initSelect();
    }
}