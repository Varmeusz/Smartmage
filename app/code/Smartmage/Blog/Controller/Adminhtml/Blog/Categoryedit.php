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
        CategoryFactory $categoryFactory

    ) {
        parent::__construct($context);
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
        $resultPage->setActiveMenu("Smartmage_Blog::menu");

        $rowId = (int)$this->getRequest()->getParam('id');

        $rowData = '';
        if ($rowId) {
            $rowData = $this->_categoryFactory->create()->load($rowId);
            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('adminblog/blog/category');
            }
        }
        // echo "<pre>"; print_r($rowData->debug()); die("dead");
        $title = $rowId ? __('Edit Review ') : __('Add Review');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
    
    public function _isAllowed()
    {
        return true;//$this->_authorization->isAllowed('Smartmage_Blog::menu');
    }
}
