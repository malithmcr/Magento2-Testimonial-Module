<?php
/**
 * Testimonials UI
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Ui\Component\Listing\Column
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Ui\Component\Listing\Column;

use Magento\Framework\View\Element\UiComponent\ContextInterface;
use Magento\Framework\View\Element\UiComponentFactory;
use Magento\Ui\Component\Listing\Columns\Column;
use Magento\Framework\UrlInterface;
use Malithmcr\Testimonials\Api\Data\TestimonialInterface;

/**
 * Class TestimonialActions
 */
class TestimonialActions extends Column
{
    /** Url path */
    const TESTIMONIALS_URL_PATH_EDIT = 'testimonials/testimonial/edit';
    const TESTIMONIALS_URL_PATH_DELETE = 'testimonials/testimonial/delete';

    /** @var UrlInterface */
    protected $urlBuilder;

    /**
     * @var string
     */
    private $editUrl;

    /**
     * TestimonialActions constructor.
     *
     * @param ContextInterface $context
     * @param UiComponentFactory $uiComponentFactory
     * @param UrlInterface $urlBuilder
     * @param array $components
     * @param array $data
     */
    public function __construct(
        UrlInterface $urlBuilder,
        ContextInterface $context,
        UiComponentFactory $uiComponentFactory,
        array $components = [],
        array $data = []
    ) {
        $this->urlBuilder = $urlBuilder;
        $this->editUrl = self::TESTIMONIALS_URL_PATH_EDIT;

        parent::__construct($context, $uiComponentFactory, $components, $data);
    }

    /**
     * Prepare Data Source
     *
     * @param array $dataSource
     *
     * @return array
     */
    public function prepareDataSource(array $dataSource)
    {
        if (isset($dataSource['data']['items'])) {
            foreach ($dataSource['data']['items'] as & $item) {
                $name = $this->getData('name');
                if (isset($item[TestimonialInterface::TESTIMONIAL_ID])) {
                    $item[$name]['edit'] = [
                        'href' => $this->urlBuilder->getUrl($this->editUrl, [TestimonialInterface::TESTIMONIAL_ID => $item[TestimonialInterface::TESTIMONIAL_ID]]),
                        'label' => __('Edit')
                    ];
                    $item[$name]['delete'] = [
                        'href' => $this->urlBuilder->getUrl(self::TESTIMONIALS_URL_PATH_DELETE, [TestimonialInterface::TESTIMONIAL_ID => $item[TestimonialInterface::TESTIMONIAL_ID]]),
                        'label' => __('Delete'),
                        'confirm' => [
                            'title' => __('Delete "${ $.$data.title }"'),
                            'message' => __('Are you sure you wan\'t to delete a "${ $.$data.title }" record?')
                        ]
                    ];
                }
            }
        }

        return $dataSource;
    }
}
