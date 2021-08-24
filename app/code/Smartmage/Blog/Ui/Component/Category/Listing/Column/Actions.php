<?php
namespace Smartmage\Blog\Ui\Component\Category\Listing\Column;

use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\Url;
use Magento\Ui\Component\Listing\Columns\Column;

class Actions extends Column
{
    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * @var string
     */
    protected $_editUrl;
    /**
     *
     * @var DeleteUrl
     */
    protected $_deleteUrl;

    protected $_context;

    /**
     * construct
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param Url $urlBuilder
     * @param string $viewUrl
     * @param string $deleteUrl
     * @param array $components
     * @param array $data
     */
    public function __construct(
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        Url $urlBuilder,
        $editUrl = '',
        $deleteUrl = '',
        array $components = [],
        array $data = []
    ) {
        $this->_context = $context;
        $this->_urlBuilder = $urlBuilder;
        $this->_editUrl    = $editUrl;
        $this->_deleteUrl  = $deleteUrl;
        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as &$item) {
                $name = $this->getData('name');
                if (isset($item['category_id'])) {
                    $item[$this->getData('name')]   = [
                        'edit' => [
                            'href'  => $this->_context->getUrl($this->_editUrl, ['id' => $item['category_id']]),
                            'target' => '_blank',
                            'label' => __('Edit')
                        ],
                        'remove' => [
                            'href'  => $this->_context->getUrl($this->_deleteUrl, ['id' => $item['category_id']]),
                            'target' => '_blank',
                            'label' => __('Delete')
                        ]

                    ];
                }
            }
        }
        return $dataSource;
    }
}
