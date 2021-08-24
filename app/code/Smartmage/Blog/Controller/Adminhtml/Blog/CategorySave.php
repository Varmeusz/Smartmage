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
        // $data = $this->getRequest()->getPostValue();
        $model = $this->_categoryFactory->create();
        
            
        $data = [];
        $datenow = date('Y-m-d H:i:s');
        $data['category_id']  = 55;
        $data['identifier'] = "XD";
        $data['title'] = "XD2";
        $data['is_active'] = true;
        $data['created_at'] = $datenow;
        $data['updated_at'] = $datenow;
        $model->setData($data);//->save();
        $this->category->save($model);

        // try {
           
        //     $model->save();
            
        //     $this->messageManager->addSuccessMessage(__('You saved the Category.'));
        //     $this->dataPersistor->clear('sm_blog_category');
            
        //     if ($this->getRequest()->getParam('back')) {
        //         return $resultRedirect->setPath('*/*/categoryedit', ['category_id' => $model->getId()]);
        //     }
        //     return $resultRedirect->setPath('*/*/');
        // } catch (LocalizedException $e) {
        //     $this->messageManager->addErrorMessage($e->getMessage());
        // } catch (\Exception $e) {
        //     $this->messageManager->addExceptionMessage($e, __('Something went wrong while saving the Sm Blog Post.'));
        // }
    
        return $resultRedirect->setPath('*/*/category', ['id' => $this->getRequest()->getParam('id')]);
        if ($data) {
            $id = $this->getRequest()->getParam('id');
           
        }
    }
}

