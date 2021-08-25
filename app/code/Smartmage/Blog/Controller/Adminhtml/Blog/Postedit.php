<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Smartmage\Blog\Model\PostFactory;
use Magento\Framework\App\Request\DataPersistorInterface;

/**
 * Class Post
 */
class Postedit extends Action implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    protected $_postFactory;

    private $coreRegistry;

    private $dataPersistorInterface;
    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory,
        PostFactory $postFactory,
        DataPersistorInterface $dataPersistorInterface

    ) {
        parent::__construct($context);
        $this->_postFactory = $postFactory;
        $this->resultPageFactory = $resultPageFactory;
        $this->dataPersistorInterface = $dataPersistorInterface;
    }

    /**
     * Load the page defined in view/adminhtml/layout/exampleadminnewpage_helloworld_index.xml
     *
     * @return Page
     */
    public function execute()
    {

        $resultPage = $this->resultPageFactory->create();
        // $resultPage->setActiveMenu("Smartmage_Blog::menu");

        $rowId = (int)$this->getRequest()->getParam('id');

        if ($rowId) {
            $rowData = $this->_postFactory->create();
            $rowData->load($rowId);
            // echo "<pre>"; print_r($rowData->debug()); die("dead");

            if (!$rowData->getId()) {
                $this->messageManager->addError(__('row data no longer exist.'));
                $this->_redirect('adminblog/blog/post');
            }
            // $this->_coreRegistry->register('smartmage_blog_sm_blog_post', $rowData);
            // print_r($rowData->toArray());
            $this->dataPersistorInterface->set("mypost", $rowData->toArray());
        }
        $title = $rowId ? __('Edit Post ') : __('Add Post');
        $resultPage->getConfig()->getTitle()->prepend($title);
        return $resultPage;
    }
    
    public function _isAllowed()
    {
        return true;//$this->_authorization->isAllowed('Smartmage_Blog::menu');
    }
}
