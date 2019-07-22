<?php
 
namespace demo\knockout\Controller\Category;
 
class Category extends \Magento\Framework\App\Action\Action
{
    protected $resultJsonFactory;
 
    public function __construct(
        \Magento\Framework\Controller\Result\JsonFactory $resultJsonFactory,
        \Magento\Catalog\Model\CategoryFactory $categoryFactory,
        \Magento\Catalog\Helper\Category $categoryHelper,
        \Magento\Catalog\Model\Indexer\Category\Flat\State $categoryFlatState,
        \Magento\Theme\Block\Html\Topmenu $topMenu,
        \Magento\Framework\App\Action\Context $context
    )
    {
        $this->_categoryFactory = $categoryFactory;
        $this->_categoryHelper = $categoryHelper;
        $this->resultJsonFactory = $resultJsonFactory;
        $this->categoryFlatConfig = $categoryFlatState;
        $this->topMenu = $topMenu;
        
        parent::__construct($context);
    }
 
    public function execute()
    {
               
        $categories = $this->getStoreCategories();
        $jsonCategories = [];
                
        foreach($categories as $item){
            if (!$item->getIsActive()) { continue; }
            
            
            $category = [];
            $category['name'] = $item->getName();        
            $jsonCategories[ $item->getId() ] = $category;
            
            
            if($childCategory = $this->getChildCategories($item)){
            
                foreach($childCategory as $i){
                    if (!$i->getIsActive()) { continue; } 

                    $child = [];
                    $child['name'] = $i->getName();        
                    $jsonCategories[ $i->getId() ] = $child;
                }
            }    
        }
           
        $result = $this->resultJsonFactory->create();
        return $result->setData($jsonCategories);
        
    }
    
    public function getCategoryHelper()
    {
        return $this->_categoryHelper;
    }
    
    /**
     * Retrieve current store categories
     *
     * @param bool|string $sorted
     * @param bool $asCollection
     * @param bool $toLoad
     * @return \Magento\Framework\Data\Tree\Node\Collection|\Magento\Catalog\Model\Resource\Category\Collection|array
     */    
    public function getStoreCategories($sorted = false, $asCollection = false, $toLoad = true)
    {
        return $this->_categoryHelper->getStoreCategories($sorted , $asCollection, $toLoad);
    }
    /**
     * Retrieve child store categories
     *
     */ 
    public function getChildCategories($category)
    {

           if ($this->categoryFlatConfig->isFlatEnabled() && $category->getUseFlatResource()) {
                $subcategories = (array)$category->getChildrenNodes();
            } else {
                $subcategories = $category->getChildren();
            }
     
                return $subcategories;
         
    }
}
 
