<?php

namespace Smartmage\Blog\Controller;

use Magento\Framework\App\Action\Forward;
use Magento\Framework\App\ActionFactory;
use Magento\Framework\App\ActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\App\RouterInterface;

/**
 * Class Router
 */
class Router implements RouterInterface
{
    /**
     * @var ActionFactory
     */
    private $actionFactory;

    /**
     * @var ResponseInterface
     */
    private $response;

    private $helper;

    private $logger;

    /**
     * Router constructor.
     *
     * @param ActionFactory $actionFactory
     * @param ResponseInterface $response
     */
    public function __construct(
        ActionFactory $actionFactory,
        ResponseInterface $response,
        \Psr\Log\LoggerInterface $logger
    ) {
        $this->actionFactory = $actionFactory;
        $this->response = $response;
        $this->logger = $logger;
    }

    /**
     * @param RequestInterface $request
     * @return ActionInterface|null
     */
    public function match(RequestInterface $request): ?ActionInterface
    {
        $identifier = trim($request->getPathInfo(), '/');
        $identifierParts = explode("/", $identifier);
        if(count($identifierParts) == 3 & $identifierParts[0] == "blog" && $identifierParts[1] == "category" && $identifierParts[2] != "index"){

            $request->setModuleName('blog');
            $request->setControllerName('category');
            $request->setActionName('index');
            $request->setParams([
                'identifier' => $identifierParts[2]
            ]);
            return $this->actionFactory->create(Forward::class, ['request' => $request]);

        }
        if(count($identifierParts) == 3 & $identifierParts[0] == "blog" && $identifierParts[1] == "post" && $identifierParts[2] != "index"){

            $request->setModuleName('blog');
            $request->setControllerName('post');
            $request->setActionName('index');
            $request->setParams([
                'identifier' => $identifierParts[2]
            ]);
            return $this->actionFactory->create(Forward::class, ['request' => $request]);

        }
        
        return null;
    }
}
