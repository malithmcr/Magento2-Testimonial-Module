<?php
/**
 * Post action of Submit Controller Testimonials module
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Controller\Submit
 * @licence OSL 3.0
 *
 * @TODO The feature is under construction!
 */

namespace Malithmcr\Testimonials\Controller\Submit;

use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\View\Result\PageFactory;
use Malithmcr\Testimonials\Helper\Data as TestimonialsHelper;

/**
 * Class Post
 */
class Post extends Action
{
    /**
     * @var TestimonialsHelper
     */
    protected $testimonialsHelper;

    /**
     * Post constructor.
     *
     * @param TestimonialsHelper $testimonialsHelper
     * @param Context $context
     */
    public function __construct(
        TestimonialsHelper $testimonialsHelper,
        Context $context
    ) {
        $this->testimonialsHelper = $testimonialsHelper;

        parent::__construct($context);
    }

    /**
     * Testimonial submit action.
     *
     * @TODO Not implemented yet, need to finish
     *
     * @return PageFactory
     */
    public function execute()
    {
        $post = $this->getRequest()->getPostValue();

        if (!$post) {
            $this->_redirect('*/*/');
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
        } catch (\Exception $e) {
            $this->messageManager->addError(
                __('We can\'t process your request right now. Sorry, that\'s all we know.')
            );

            $this->_redirect('testimonials/submit');
        }
    }
}
