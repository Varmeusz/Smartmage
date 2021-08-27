<?php


namespace Smartmage\Blog\Model;

use Magento\MediaStorage\Helper\File\Storage\Database;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use \Magento\Store\Model\StoreManagerInterface;

class ImageUploader extends \Magento\Catalog\Model\ImageUploader {

    public function __construct(
        Database $coreFileStorageDatabase,
        Filesystem $filesystem,
        UploaderFactory $uploaderFactory,
        StoreManagerInterface $storeManager,
        \Psr\Log\LoggerInterface $logger, $baseTmpPath,
        $basePath,
        $allowedExtensions,
        $allowedMimeTypes = [],
        \Magento\Catalog\Model\ImageUploader $fileNameLookup = null)
    {
    parent::__construct($coreFileStorageDatabase, $filesystem, $uploaderFactory, $storeManager, $logger, $baseTmpPath = "test/tmp", $basePath = "test", $allowedExtensions, $allowedMimeTypes, $fileNameLookup);
    }


}
