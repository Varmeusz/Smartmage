<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;


use Magento\Backend\App\Action;
use Magento\Backend\App\Action\Context;
use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;
use Smartmage\Blog\Model\Category;

/**
 * Class Post
 */
class Categoryadd extends Action implements HttpGetActionInterface
{

    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Index constructor.
     *
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        Context $context,
        PageFactory $resultPageFactory
    ) {
        parent::__construct($context);

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
        // $resultPage->setActiveMenu("Smartmage_Blog::menu");
        return $resultPage;
    }
    
    public function _isAllowed()
    {
        return true;//$this->_authorization->isAllowed('Smartmage_Blog::menu');
    }
}
