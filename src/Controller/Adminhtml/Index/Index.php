<?php
/**
 * Index action of the Testimonials controller
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Controller\Adminhtml\Index
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Controller\Adminhtml\Index;

use Magento\Backend\App\Action;
use Magento\Backend\Model\View\Result\Page;
use Magento\Framework\View\Result\PageFactory;

/**
 * Class Index
 */
class Index extends Action
{
    /**
     * @var PageFactory
     */
    protected $resultPageFactory;

    /**
     * Constructor
     *
     * @param Action\Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Action\Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;

        parent::__construct($context);
    }

    /**
     * Index action
     *
     * @return Page
     */
    public function execute()
    {
        /** @var Page $resultPage */
        $resultPage = $this->resultPageFactory->create();

        $resultPage->setActiveMenu('Malithmcr_Testimonials::testimonial')
            ->addBreadcrumb(__('Testimonials'), __('Testimonials'))
            ->addBreadcrumb(__('Manage testimonial'), __('Manage Testimonials'))
            ->getConfig()->getTitle()->prepend(__('Testimonials'));

        return $resultPage;
    }

    /**
     * Is the user allowed to view the blog post grid.
     *
     * @return bool
     */
    protected function _isAllowed()
    {
        return $this->_authorization->isAllowed('Malithmcr_Testimonials::testimonial');
    }
}
