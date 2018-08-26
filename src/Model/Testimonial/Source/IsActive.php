<?php
/**
 * Testimonials Source
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Model\Testimonial\Source
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Model\Testimonial\Source;

use Magento\Framework\Data\OptionSourceInterface;
use Malithmcr\Testimonials\Model\Testimonial;

/**
 * Class IsActive
 */
class IsActive implements OptionSourceInterface
{
    /**
     * @var Testimonial
     */
    protected $testimonial;

    /**
     * Constructor
     *
     * @param Testimonial $testimonial
     */
    public function __construct(Testimonial $testimonial)
    {
        $this->testimonial = $testimonial;
    }

    /**
     * Get options
     *
     * @return array
     */
    public function toOptionArray()
    {
        $options[] = ['label' => '', 'value' => ''];
        $availableOptions = $this->testimonial->getAvailableStatuses();

        foreach ($availableOptions as $key => $value) {
            $options[] = [
                'label' => $value,
                'value' => $key,
            ];
        }

        return $options;
    }
}
