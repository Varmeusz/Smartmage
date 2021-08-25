<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;
use Smartmage\Blog\Model\CategoryFactory;
use Smartmage\Blog\Model\ResourceModel\Category;

class CategorySave extends \Magento\Backend\App\Action
{

    protected $dataPersistor;
    protected $_categoryFactory;
    protected $category;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        CategoryFactory $categoryFactory,
        Category $category

    ) {
        $this->dataPersistor = $dataPersistor;
        $this->_categoryFactory = $categoryFactory;
        $this->category = $category;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $categoryId = $this->getRequest()->getParam('id');
        // echo $categoryId; die("XD");
        $data = (array)$this->getRequest()->getPostValue();
        
        $datenow = date('Y-m-d H:i:s');
        if($categoryId){
            $data['category_id'] = $categoryId;
            $data['updated_at'] = $datenow;

        }else{
            $data['created_at'] = $datenow;
            $data['updated_at'] = $datenow;
            $data['category_id']  = null;

        }
        try {
            $model = $this->_categoryFactory->create();
            $model->setData($data);
            $this->category->save($model);
            $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
    
        return $resultRedirect->setPath('*/*/category');
    }
}

