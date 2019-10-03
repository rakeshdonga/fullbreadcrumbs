<?php
namespace Rakesh\FixProductBreadcrumbs\Observer\Catalog\Product;

class FullPathBreadcrumbs implements \Magento\Framework\Event\ObserverInterface
{

    protected $_registry;

    protected $_categoryRepository;

    public function __construct(
        \Magento\Framework\Registry $registry,
        \Magento\Catalog\Api\CategoryRepositoryInterface $categoryRepository
    )
    {
        $this->_registry=$registry;
        $this->_categoryRepository = $categoryRepository;
    }


    /**
     * Execute observer
     *
     * @param \Magento\Framework\Event\Observer $observer
     * @return void
     */
    public function execute(
        \Magento\Framework\Event\Observer $observer
    )
    {
        $product = $observer->getEvent()->getProduct();
        if ($product != null && !$this->_registry->registry('current_category')) {
            $cats = $product->getAvailableInCategories();

            if(sizeof($cats)===1){
                $last = $cats[0];
            }else{
                end($cats);
                $last = prev($cats);
            }


            if($last) {
                $category = $this->_categoryRepository->get($last);
                $this->_registry->register('current_category', $category, true);
            }
        }
    }
}