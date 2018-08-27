<?php
/**
 * Testimonials data interface
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Block
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Block;

use Magento\Framework\View\Element\Template;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\View\Element\Template\Context;
use Magento\Customer\Model\Session as CustomerSession;
use Malithmcr\Testimonials\Model\Testimonial;
use Malithmcr\Testimonials\Api\Data\TestimonialInterface;
use Malithmcr\Testimonials\Model\ResourceModel\Testimonial\Collection as TestimonialCollection;
use Malithmcr\Testimonials\Model\ResourceModel\Testimonial\CollectionFactory as TestimonialsCollectionFactory;

/**
 * Class TestimonialsList
 */
class TestimonialsList extends Template implements IdentityInterface
{
    /**
     * @var TestimonialsCollectionFactory
     */
    protected $testimonialCollectionFactory;

    /**
     * @var CustomerSession
     */
    protected $customerSession;

    /**
     * Construct
     *
     * @param TestimonialsCollectionFactory $testimonialCollectionFactory ,
     * @param CustomerSession $session
     * @param Context $context
     * @param array $data
     */
    public function __construct(
        TestimonialsCollectionFactory $testimonialCollectionFactory,
        CustomerSession $session,
        Context $context,
        array $data = []
    ) {
        $this->testimonialCollectionFactory = $testimonialCollectionFactory;
        $this->customerSession = $session;

        parent::__construct($context, $data);
    }

    /**
     * Gets the testimonials from database saves in local variable for caching
     *
     * @return TestimonialCollection
     */
    public function getTestimonials()
    {
        // Check if Testimonials has already been defined
        if (!$this->hasData('testimonials')) {
            $testimonialsCollection = $this->testimonialCollectionFactory
                ->create()
                ->addFilter('is_active', 1)
                ->addOrder(
                    TestimonialInterface::CREATION_TIME,
                    TestimonialCollection::SORT_ORDER_DESC
                );

            $this->setData('testimonials', $testimonialsCollection);
        }

        return $this->getData('testimonials');
    }

    /**
     * Return identifiers for produced content
     *
     * @return array
     */
    public function getIdentities()
    {
        return [Testimonial::CACHE_TAG . '_' . 'list'];
    }

    /**
     * Check if customer is logged in
     *
     * @return bool
     */
    public function getCustomerStatus()
    {
        return $this->customerSession->isLoggedIn();
    }
}
