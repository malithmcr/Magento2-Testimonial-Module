<?php namespace Malithmcr\Testimonials\Model\ResourceModel\Testimonial;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
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
