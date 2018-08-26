<?php
/**
 * Testimonials data interface
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Api\Data
 * @licence OSL 3.0
 */
namespace Malithmcr\Testimonials\Api\Data;

/**
 * Interface TestimonialInterface
 */
interface TestimonialInterface
{
    /**
     * Constants for keys of data array.
     * Identical to the name of the getter in snake case
     */
    const TESTIMONIAL_ID = 'testimonial_id';
    const CREATION_TIME  = 'creation_time';
    const UPDATE_TIME    = 'update_time';
    const IS_ACTIVE      = 'is_active';
    const URL_KEY        = 'url_key';
    const CONTENT        = 'content';
    const TITLE          = 'title';
    const IMAGE          = 'image';
    const INFO           = 'info';

    /**
     * Get ID
     *
     * @return int|null
     */
    public function getId();

    /**
     * Get URL Key
     *
     * @return string
     */
    public function getUrlKey();

    /**
     * Get title
     *
     * @return string|null
     */
    public function getTitle();

    /**
     * Get content
     *
     * @return string|null
     */
    public function getContent();

    /**
     * Get image
     *
     * @return string|null
     */
    public function getImage();

    /**
     * Get Info
     *
     * @return string|null
     */
    public function getInfo();

    /**
     * Get creation time
     *
     * @return string|null
     */
    public function getCreationTime();

    /**
     * Get update time
     *
     * @return string|null
     */
    public function getUpdateTime();

    /**
     * Is active
     *
     * @return bool|null
     */
    public function isActive();

    /**
     * Set ID
     *
     * @param int $id
     *
     * @return TestimonialInterface
     */
    public function setId($id);

    /**
     * Set URL Key
     *
     * @param string $url_key
     *
     * @return TestimonialInterface
     */
    public function setUrlKey($url_key);

    /**
     * Return full URL including base url.
     *
     * @return string
     */
    public function getUrl();

    /**
     * Set title
     *
     * @param string $title
     *
     * @return TestimonialInterface
     */
    public function setTitle($title);

    /**
     * Set content
     *
     * @param string $content
     *
     * @return TestimonialInterface
     */
    public function setContent($content);

    /**
     * Set Image
     *
     * @param string $image
     *
     * @return TestimonialInterface
     */
    public function setImage($image);

    /**
     * Set Info
     *
     * @param string $info
     *
     * @return TestimonialInterface
     */
    public function setInfo($info);

    /**
     * Set creation time
     *
     * @param string $creationTime
     *
     * @return TestimonialInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     *
     * @return TestimonialInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     *
     * @return TestimonialInterface
     */
    public function setIsActive($isActive);
}