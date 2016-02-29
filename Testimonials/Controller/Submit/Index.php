<?php
namespace Malithmcr\Testimonials\Controller\Submit;

use \Magento\Framework\App\Action\Action;

class Index extends Action
{
    /**
     * Blog Submit, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
    	$objectManager = \Magento\Framework\App\ObjectManager::getInstance();
    	$customerSession = $objectManager->get('Magento\Customer\Model\Session');
		if($customerSession->isLoggedIn()) {
		  $this->_view->loadLayout();
        	$this->_view->renderLayout();   
		}else{
			$this->_redirect('customer/account/login/');
			return;
		}
		
    
    }
}
