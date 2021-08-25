<?php

namespace Smartmage\Blog\Block\Adminhtml\Blog\Post\Form\Edit;

use Magento\Framework\View\Element\UiComponent\Control\ButtonProviderInterface;

class SaveButton extends GenericButton implements ButtonProviderInterface
{

    /**
     * @return array
     */
    public function getButtonData()
    {
        return [
            'label' => __('Save Post'),
            'class' => 'save primary',
            'data_attribute' => [
                'mage-init' => [
                    'button' => ['event' => 'save'],
                    'buttonAdapter' => [
                        'actions' => [
                            [
                                'targetName' => 'adminblog_blog_postedit.adminblog_blog_postedit',
                                'actionName' => 'save',
                                'params' => [
                                    true,
                                    [
                                        "id" => $this->context->getRequest()->getParam('id')
                                    ]
                                ]
                            ]
                        ]
                    ]
                ],
                'form-role' => 'save'
            ],
            'sort_order' => 90
            // 'options' => $this->getOptions()
        ];
    }
    public function getSaveUrl() { 
        return $this->getUrl('*/*/categorysave', ["id" => $this->context->getRequest()->getParam('id')]) ; 
    } 
    private function getOptions()
    {
        $options = [
            [
                'label' => __('Save'),
                'id_hard' => 'save',
                'data_attribute' => [
                    'mage-init' => [
                        'buttonAdapter' => [
                            'actions' => [
                                [
                                    'targetName' => 'adminblog_blog_postedit.adminblog_blog_postedit',
                                    'actionName' => 'save',
                                    'params' => [
                                        true,
                                        [
                                            "id" => $this->context->getRequest()->getParam('id')
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ]
                ]
            ]
        ];

        return $options;
    }
}

