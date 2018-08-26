<?php
/**
 * Testimonials Model
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Model
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Model;

use Magento\Framework\Model\ResourceModel\AbstractResource;
use Magento\Framework\DataObject\IdentityInterface;
use Magento\Framework\Data\Collection\AbstractDb;
use Magento\Framework\Model\AbstractModel;
use Magento\Framework\Model\Context;
use Magento\Framework\UrlInterface;
use Magento\Framework\Registry;
use Malithmcr\Testimonials\Api\Data\TestimonialInterface;

/**
 * Class Testimonial
 */
class Testimonial  extends AbstractModel implements TestimonialInterface, IdentityInterface
{
    /**
     * Testimonial's Statuses
     */
    const STATUS_ENABLED = 1;
    const STATUS_DISABLED = 0;

    /**
     * CMS page cache tag
     */
    const CACHE_TAG = 'Testimonials_Testimonial';

    /**
     * @var string
     */
    protected $_cacheTag = 'Testimonials_Testimonial';

    /**
     * Prefix of model events names
     *
     * @var string
     */
    protected $_eventPrefix = 'Testimonials_Testimonial';

    /**
     * @var UrlInterface
     */
    protected $_urlBuilder;

    /**
     * Testimonial Constructor.
     *
     * @param Context $context
     * @param Registry $registry
     * @param AbstractResource|null $resource
     * @param AbstractDb|null $resourceCollection
     * @param UrlInterface $urlBuilder
     * @param array $data
     */
    function __construct(
        UrlInterface $urlBuilder,
        Context $context,
        Registry $registry,
        AbstractResource $resource = null,
        AbstractDb $resourceCollection = null,
        array $data = []
    ) {
        $this->_urlBuilder = $urlBuilder;

        parent::__construct(
            $context,
            $registry,
            $resource,
            $resourceCollection,
            $data
        );
    }

    /**
     * Initialize resource model
     *
     * @return void
     */
    protected function _construct()
    {
        $this->_init('Malithmcr\Testimonials\Model\ResourceModel\Testimonial');
    }

    /**
     * Check if Testimonial url key exists
     * return Testimonial id if Testimonial exists
     *
     * @param string $url_key
     *
     * @return int
     *
     * @TODO Avoid using deprecated class
     */
    public function checkUrlKey($url_key)
    {
        return $this->_getResource()->checkUrlKey($url_key);
    }

    /**
     * Prepare Testimonial's statuses.
     * Available event Testimonials_Testimonial_get_available_statuses to customize statuses.
     *
     * @return array
     */
    public function getAvailableStatuses()
    {
        return [self::STATUS_ENABLED => __('Enabled'), self::STATUS_DISABLED => __('Disabled')];
    }

    /**
     * Return unique ID(s) for each object in system
     *
     * @return array
     */
    public function getIdentities()
    {
        return [self::CACHE_TAG . '_' . $this->getId()];
    }

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId()
    {
        return $this->getData(self::TESTIMONIAL_ID);
    }

    /**
     * Get URL Key
     *
     * @return string
     */
    public function getUrlKey()
    {
        return $this->getData(self::URL_KEY);
    }

    /**
     * Return the desired URL of a Testimonial
     *  eg: /testimonials/view/index/id/1/
     * @TODO Move to a TestimonialUrl model, and make use of the
     * @TODO rewrite system, using url_key to build url.
     * @TODO desired url: /testimonials/my-test-testimonials-testimonial-title
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->_urlBuilder->getUrl('testimonials/' . $this->getUrlKey());
    }

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle()
    {
        return $this->getData(self::TITLE);
    }

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent()
    {
        return $this->getData(self::CONTENT);
    }

    /**
     * Get image
     *
     * @return string|null
     */
    public function getImage()
    {
        return $this->getData(self::IMAGE);
    }

    /**
     * Get info
     *
     * @return string|null
     */
    public function getInfo()
    {
        return $this->getData(self::INFO);
    }

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime()
    {
        return $this->getData(self::CREATION_TIME);
    }

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime()
    {
        return $this->getData(self::UPDATE_TIME);
    }

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive()
    {
        return (bool) $this->getData(self::IS_ACTIVE);
    }

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return TestimonialInterface
     */
    public function setId($id)
    {
        return $this->setData(self::TESTIMONIAL_ID, $id);
    }

    /**
     * Set URL Key
     *
     * @param string $url_key
     *
     * @return TestimonialInterface
     */
    public function setUrlKey($url_key)
    {
        return $this->setData(self::URL_KEY, $url_key);
    }

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TestimonialInterface
     */
    public function setTitle($title)
    {
        return $this->setData(self::TITLE, $title);
    }

    /**
     * Set content
     *
     * @param string $content
     *
     * @return TestimonialInterface
     */
    public function setContent($content)
    {
        return $this->setData(self::CONTENT, $content);
    }

    /**
     * Set image
     *
     * @param string $image
     *
     * @return TestimonialInterface
     */
    public function setImage($image)
    {
        return $this->setData(self::IMAGE, $image);
    }

    /**
     * Set info
     *
     * @param string $info
     *
     * @return TestimonialInterface
     */
    public function setInfo($info)
    {
        return $this->setData(self::INFO, $info);
    }

    /**
     * Set creation time
     *
     * @param string $creation_time
     *
     * @return TestimonialInterface
     */
    public function setCreationTime($creation_time)
    {
        return $this->setData(self::CREATION_TIME, $creation_time);
    }

    /**
     * Set update time
     *
     * @param string $update_time
     *
     * @return TestimonialInterface
     */
    public function setUpdateTime($update_time)
    {
        return $this->setData(self::UPDATE_TIME, $update_time);
    }

    /**
     * Set is active
     *
     * @param int|bool $is_active
     *
     * @return TestimonialInterface
     */
    public function setIsActive($is_active)
    {
        return $this->setData(self::IS_ACTIVE, $is_active);
    }
}
