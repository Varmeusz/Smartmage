<?php
namespace Smartmage\Smartmage\Model\Config;

class Custom implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionsArray()
    {
        return array(
            array('value' => 0, 'label' => __('INDEX,FOLLOW'))
        );
    }
}