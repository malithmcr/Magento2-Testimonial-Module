<?php
namespace Malithmcr\Testimonials\Block\Adminhtml;
class TestimonialsAdmin extends \Magento\Backend\Block\Widget\Grid\Container
{
    protected function _construct()
    {
        $this->_controller = 'adminhtml_index';
        $this->_blockGroup = 'Malithmcr_Testimonials';
        $this->_headerText = __('Manage Blog Posts');
        parent::_construct();
        if ($this->_isAllowedAction('Malithmcr_Testimonials::save')) {
            $this->buttonList->update('add', 'label', __('Add New Testimonial'));
        } else {
            $this->buttonList->remove('add');
        }
    }
    protected function _isAllowedAction($resourceId)
    {
        return $this->_authorization->isAllowed($resourceId);
    }
}