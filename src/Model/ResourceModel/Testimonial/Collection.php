<?php
/**
 * Testimonials collection
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Model\ResourceModel\Testimonial
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Model\ResourceModel\Testimonial;

use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;

/**
 * Class Collection
 */
class Collection extends AbstractCollection
{
    /**
     * @var string
     */
    protected $_idFieldName = 'testimonial_id';

    /**
     * Define resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Malithmcr\Testimonials\Model\Testimonial', 'Malithmcr\Testimonials\Model\ResourceModel\Testimonial');
    }
}
