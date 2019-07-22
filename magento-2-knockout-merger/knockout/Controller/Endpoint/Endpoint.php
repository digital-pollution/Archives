<?php
 
namespace demo\knockout\Controller\Endpoint;
 
class Endpoint extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
 
    public function __construct(
        \Magento\Framework\App\Action\Context $context, 
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $productCollectionFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory
    )
    {
        $this->_categoryFactory = $categoryFactory;
        $this->_productCollectionFactory = $productCollectionFactory;
        $this->resultJsonFactory = $resultJsonFactory;
        parent::__construct($context);
    }
 
    public function execute()
    {
        $categoryId = $this->getRequest()->getPostValue('categoryId');
        $category = $this->_categoryFactory->create()->load($categoryId);
        $collection = $this->_productCollectionFactory->create();
        $collection->addAttributeToSelect('*');
        $collection->addCategoryFilter($category);
        $collection->addAttributeToFilter('visibility', \Magento\Catalog\Model\Product\Visibility::VISIBILITY_BOTH);
        $collection->addAttributeToFilter('status',\Magento\Catalog\Model\Product\Attribute\Source\Status::STATUS_ENABLED);
        
        $jsonProducts = [];
                
        foreach($collection->getItems() as $item){
            $product = [];
            $product['price'] = $item->getPrice();
            $product['name'] = $item->getName();
        
            $jsonProducts[ $item->getSku() ] = $product;
        }
           
        $result = $this->resultJsonFactory->create();
        return $result->setData($jsonProducts);
    }
}
 