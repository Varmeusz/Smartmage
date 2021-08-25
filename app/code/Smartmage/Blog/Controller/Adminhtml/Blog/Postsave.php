<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;
use Smartmage\Blog\Model\PostFactory;
use Smartmage\Blog\Model\ResourceModel\Post;

class CategorySave extends \Magento\Backend\App\Action
{

    protected $dataPersistor;
    protected $_postFactory;
    protected $post;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        PostFactory $postFactory,
        Post $post

    ) {
        $this->dataPersistor = $dataPersistor;
        $this->_categoryFactory = $categoryFactory;
        $this->category = $category;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $postId = $this->getRequest()->getParam('id');
        $data = (array)$this->getRequest()->getPostValue();
        $datenow = date('Y-m-d H:i:s');
        if($postId){
            $data['category_id'] = $categoryId;
            $data['updated_at'] = $datenow;

        }else{
            $data['created_at'] = $datenow;
            $data['updated_at'] = $datenow;
            $data['post_id']  = null;

        }
        try {
            $model = $this->_postFactory->create();
            $model->setData($data);
            $this->post->save($model);
            $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }
    
        return $resultRedirect->setPath('*/*/post');
    }
}

