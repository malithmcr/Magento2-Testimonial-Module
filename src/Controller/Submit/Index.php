<?php
/**
 * Index action of Submit Controller Testimonials module
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Controller\Submit
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Controller\Submit;

use Magento\Framework\App\Action\Action;
use Magento\Customer\Model\Session as CustomerSession;

/**
 * Class Index
 */
class Index extends Action
{
    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * Submit action
     * Checks if the customer is logged in and redirects to login.
     * Renders the form to submit new testimonial
     */
    public function execute()
    {
        if(!$this->customerSession->isLoggedIn()) {
            $this->_redirect('customer/account/login/');
        }

        $this->_view->loadLayout();
        $this->_view->renderLayout();
    }
}
