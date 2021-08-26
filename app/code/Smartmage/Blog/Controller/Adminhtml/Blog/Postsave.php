<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;

use Magento\Framework\Exception\LocalizedException;
use Smartmage\Blog\Model\PostFactory;
use Smartmage\Blog\Model\ResourceModel\Post;
use Smartmage\Blog\Model\ResourceModel\PostCategories;
use Smartmage\Blog\Model\PostCategoriesFactory;

class PostSave extends \Magento\Backend\App\Action
{

    protected $dataPersistor;
    protected $_postFactory;
    protected $_postCategoriesFactory;
    protected $_postCategories;
    protected $post;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Magento\Framework\App\Request\DataPersistorInterface $dataPersistor,
        PostFactory $postFactory,
        Post $post,
        PostCategories $postCategories,
        PostCategoriesFactory $postCategoriesFactory

    ) {
        $this->dataPersistor = $dataPersistor;
        $this->_postFactory = $postFactory;
        $this->post = $post;
        $this->_postCategoriesFactory = $postCategoriesFactory;
        $this->_postCategories = $postCategories;
        parent::__construct($context);
    }

    public function execute()
    {
        $resultRedirect = $this->resultRedirectFactory->create();
        $postId = $this->getRequest()->getParam('id');
        $data = (array)$this->getRequest()->getPostValue();
        // print_r($data); die("XD");
        $datenow = date('Y-m-d H:i:s');
        if($postId){
            $data['post_id'] = $postId;
            $data['updated_at'] = $datenow;
            $data['publish_at'] = $datenow;

        }else{
            $data['created_at'] = $datenow;
            $data['updated_at'] = $datenow;
            $data['post_id']  = null;
            $data['publish_at'] = $datenow;
        }
        try {
            $model = $this->_postFactory->create();
            $model->setData($data);
            $this->post->save($model);
            $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));

        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
        }

        $categories = $data["categories"];
        if($categories){
            foreach($categories as $category){
                try {
                    $data = [
                        "id" => null,
                        "category" => $category,
                        "post" => $model["post_id"]
                    ];
                    $postcategoriesmodel = $this->_postCategoriesFactory->create();
                    $postcategoriesmodel->setData($data);
                    $this->_postCategories->save($postcategoriesmodel);
                    $this->messageManager->addSuccessMessage(__("Data Saved Successfully."));
        
                } catch (\Exception $e) {
                    $this->messageManager->addErrorMessage($e, __("We can\'t submit your request, Please try again."));
                }
            }

        }
    
        return $resultRedirect->setPath('*/*/post');
    }
}

