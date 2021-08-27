<?php
namespace Smartmage\Blog\Controller\Adminhtml\Blog;

use Exception;
use Magento\Framework\Exception\LocalizedException;
use Smartmage\Blog\Model\PostFactory;
use Smartmage\Blog\Model\ResourceModel\Post;
use Smartmage\Blog\Model\ResourceModel\PostCategories;
use Smartmage\Blog\Model\PostCategoriesFactory;
use Magento\Framework\Controller\ResultFactory;
use Psr\Log\LoggerAwareInterface;

class Tmpupload extends \Magento\Backend\App\Action
{

    protected $imageUploader;
    protected $logger;
    public function __construct(
        \Magento\Backend\App\Action\Context $context,
        \Smartmage\Blog\Model\ImageUploader $imageUploader,
        \Psr\Log\LoggerInterface $logger

    ) {
        $this->imageUploader = $imageUploader;
        $this->logger = $logger;
        parent::__construct($context);
    }

    public function execute()
    {
       $imageId = $this->_request->getParam('image', 'image');
        // $this->logger->log(100,$imageId);die("XD");
       try {
        //    $this->imageUploader->setBasePath("test");
        //    $this->imageUploader->setBaseTmpPath("test/tmp");
        //    $this->imageUploader->setAllowedExtensions(["jpg","jpeg", "png"]);
           $result = $this->imageUploader->saveFileToTmpDir($imageId);

       } catch (Exception $e) {
           $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
       }
       return $this->resultFactory->create(ResultFactory::TYPE_JSON)->setData($result);
    }
}

