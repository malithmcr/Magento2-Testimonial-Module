<?php
/**
 * Testimonials data interface
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Block\Adminhtml
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Block\Adminhtml;

/**
 * @TODO Remove usage of deprecated class
 */
use \Magento\Backend\Block\Widget\Grid\Container as GridContainer;

/**
 * Class TestimonialsAdmin
 */
class TestimonialsAdmin extends GridContainer
{
    /**
     * TestimonialsAdmin Constructor
     */
    protected function _construct()
    {
        $this->_controller = 'adminhtml_index';
        $this->_blockGroup = 'Malithmcr_Testimonials';
        $this->_headerText = __('Manage Blog Posts');

        if ($this->_isAllowedAction('Malithmcr_Testimonials::save')) {
            $this->buttonList->update('add', 'label', __('Add New Testimonial'));
        } else {
            $this->buttonList->remove('add');
        }

        parent::_construct();
    }

    /**
     * @param $resourceId
     *
     * @return bool
     */
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}