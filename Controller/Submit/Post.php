<?php
namespace Malithmcr\Testimonials\Controller\Submit;

use \Magento\Framework\App\Action\Action;
class Post extends Action
{
    /**
     * Blog Submit, shows a list of recent blog posts.
     *
     * @return \Magento\Framework\View\Result\PageFactory
     */
    public function execute()
    {
    	//die("try so hard!");
    	$_dataHelper = $this->_objectManager->get('Malithmcr\Testimonials\Helper\Data');
		
    	$post = $this->getRequest()->getPostValue();
        if (!$post) {
            $this->_redirect('*/*/');
            return;
        }

        
        try {
          	$data = $this->getRequest()->getPostValue();
			$resultRedirect = $this->resultRedirectFactory->create();
            $error = false;

            if (!\Zend_Validate::is(trim($post['title']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['testimonial-content']), 'NotEmpty')) {
                $error = true;
            }
			 if (!\Zend_Validate::is(trim($post['info']), 'NotEmpty')) {
                $error = true;
            }
            if (!\Zend_Validate::is(trim($post['email']), 'EmailAddress')) {
                $error = true;
            }
           
            if ($error) {
                throw new \Exception();
            }
			
            
			$testimonialModel = $this->_objectManager->create('Malithmcr\Testimonials\Model\Testimonial');
			$testimonialModel->setTitle(trim($post['title']));
			//$testimonialModel->setId('12');
			
			/*
			 * TODO Image Uploader
			 * */
			//$Image = $this->_dataHelper->uploadImage(); 
			
			$testimonialModel->setUrlKey(trim($post['title']));
			$testimonialModel->setImage('default.jpg');
			$testimonialModel->setInfo(trim($post['info']));
			$testimonialModel->setCreationTime('2016-02-25 09:51:19');
			$testimonialModel->setUpdateTime('2016-02-25 09:51:19');
			$testimonialModel->setIsActive('0');
			$testimonialModel->setContent(trim($post['testimonial-content']));
			$testimonialModel->save();

			$this->messageManager->addSuccess(
                __('Thanks For The Testimonial. Will be approved soon.')
            );
			$this->_redirect('testimonials');
			return;
				
				
        } catch (\Exception $e) {
            $this->messageManager->addError(
                __('We can\'t process your request right now. Sorry, that\'s all we know.')
            );
            $this->_redirect('testimonials/submit');
            return;
        }
		
    
    }
}
