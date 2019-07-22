<?php
namespace demo\knockout\Block;

class knockout extends \Magento\Framework\View\Element\Template
{   

    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        array $layoutProcessors = [],
        array $data = []
    ) {       
        parent::__construct($context, $data);
        $this->layoutProcessors = $layoutProcessors;
    }
    
    public function pageTitle()
    {
        return 'Magento 2 Custom Module with knockout JS';
    }
    
    public function getJsLayout()
    {
        foreach ($this->layoutProcessors as $processor) {
            $this->jsLayout = $processor->process($this->jsLayout);
        }
        return parent::getJsLayout();
    }
}