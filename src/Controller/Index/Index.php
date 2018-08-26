<?php
/**
 * Index action of Frontend Testimonials module
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Controller\Index
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Controller\Index;

use Magento\Framework\View\Result\Page;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
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
     * @param Context $context
     * @param PageFactory $resultPageFactory
     */
    public function __construct(
        PageFactory $resultPageFactory,
        Context $context
    ) {
        $this->resultPageFactory = $resultPageFactory;

        parent::__construct($context);
    }

    /**
     * Testimonials index page /testimonials
     *
     * @return Page
     */
    public function execute()
    {
        return $this->resultPageFactory->create();
    }
}
