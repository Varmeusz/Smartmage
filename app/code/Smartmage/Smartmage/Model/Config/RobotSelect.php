<?php
namespace Smartmage\Smartmage\Model\Config;

class RobotSelect implements \Magento\Framework\Option\ArrayInterface
{
    public function toOptionArray()
    {
        return [
            ['value' => 'INDEX,FOLLOW', 'label' => __('INDEX,FOLLOW')],
            ['value' => 'NOINDEX,FOLLOW', 'label' => __('NOINDEX,FOLLOW')],
            ['value' => 'INDEX,NOFOLLOW', 'label' => __('INDEX,NOFOLLOW')],
            ['value' => 'NOINDEX,NOFOLLOW', 'label' => __('NOINDEX,NOFOLLOW')]
        ];
    }
}