<?php

namespace Smartmage\Blog\Block;

use Magento\CatalogInventory\Helper\Stock;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\Pricing\PriceCurrencyInterface;
use Smartmage\Blog\Model\ResourceModel\Post\CollectionFactory as PostFactory;
use Smartmage\Blog\Model\ResourceModel\Category\CollectionFactory as CategoryFactory;

class Post extends \Magento\Framework\View\Element\Template
{

    protected $postFactory;
    protected $logger;
    protected $category;
    public function __construct(
        Context $context,
        PostFactory $postFactory,
        \Psr\Log\LoggerInterface $logger,
        CategoryFactory $category

    )
    {
        $this->postFactory = $postFactory;
        $this->logger = $logger;
        $this->category = $category;
        parent::__construct($context);
    }

    public function getPostId(){
        $postId = $this->postFactory->create();
        $id = $postId->getItemByColumnValue('identifier', $this->getRequest()->getParam("identifier"));
        return $id['post_id'];
    }

    public function getPostContent()
    {
        // $this->logger->log(100,print_r($id->debug())); die("XD");
        // echo($id["category_id"]);

        $collection = $this->postFactory->create();

        $collection->getSelect()->join(
            ['sm_blog_post_category'=>$collection->getTable('sm_blog_post_category')],
            'main_table.post_id = sm_blog_post_category.post',
            ['category_ids' =>  new \Zend_Db_Expr('group_concat(`sm_blog_post_category`.category)')]//'sm_blog_post_category.post']
        )->group('post_id');
        // echo $collection->getSelect();
        $datenow = date('Y-m-d H:i:s');
        $collection->addFieldToFilter('is_active', true);
        $collection->addFieldToFilter('publish_time', ['lt' => $datenow]);
        $collection->addFieldToFilter('post_id', $this->getPostId());
        $collection->setOrder('created_at', 'DESC');

        $items = $collection->getItems();
        $data = [];
        foreach($items as $model){
            $data[] = $model->getData();
        }
        
        // print_r($data);
        return $data;
    }

    public function getPosts(){

    }
}
