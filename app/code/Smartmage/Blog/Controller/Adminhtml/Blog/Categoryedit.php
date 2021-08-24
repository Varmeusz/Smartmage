<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Smartmage\Blog\Model\CategoryFactory;

/**
 * Class Post
 */
class Categoryedit extends Action implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    protected $_categoryFactory;

    private $coreRegistry;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        CategoryFactory $categoryFactory,
        \Magento\Framework\Registry $coreRegistry
    ) {
        parent::__construct($context);
        $this->coreRegistry = $coreRegistry;
        $this->_categoryFactory = $categoryFactory;
        
        $this->resultPageFactory = $resultPageFactory;
    }

    /**
     * Load the page defined in view/adminhtml/layout/exampleadminnewpage_helloworld_index.xml
     *
     * @return Page
     */
    public function execute()
    {
        $resultPage = $this->resultPageFactory->create();
        $rowId = (int)$this->getRequest()->getParam('id');
        $rowData = '';
        if ($rowId) {
            $rowData = $this->_categoryFactory->create()->load($rowId);
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('adminblog/blog/category');
            }
        }
        $this->coreRegistry->register('row_data', $rowData);
        // echo "<pre>"; print_r($rowData->debug()); die("dead");
        $title = $rowId ? __('Edit Review ') : __('Add Review');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
        // $resultPage->setActiveMenu("Smartmage_Blog::menu");
    }
    
    public function _isAllowed()
    {
        return true;//$this->_authorization->isAllowed('Smartmage_Blog::menu');
    }
}
