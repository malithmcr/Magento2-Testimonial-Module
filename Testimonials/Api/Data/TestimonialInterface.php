<?php
namespace Malithmcr\Testimonials\Api\Data;


interface TestimonialInterface
{
	 /**
     * Constants for keys of data array. Identical to the name of the getter in snake case
     */
    const TESTIMONIAL_ID = 'testimonial_id';
    const URL_KEY        = 'url_key';
    const TITLE          = 'title';
    const CONTENT        = 'content';
	const IMAGE          = 'image';
	const INFO           = 'info';
    const CREATION_TIME  = 'creation_time';
    const UPDATE_TIME    = 'update_time';
    const IS_ACTIVE      = 'is_active';

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
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setId($id);

    /**
     * Set URL Key
     *
     * @param string $url_key
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setUrlKey($url_key);

    /**
     * Return full URL including base url.
     *
     * @return mixed
     */
    public function getUrl();

    /**
     * Set title
     *
     * @param string $title
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setTitle($title);

    /**
     * Set content
     *
     * @param string $content
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setContent($content);

    /**
     * Set Image
     *
     * @param string $image
     * @return \Malithmcr\Testimonials\Api\Data\TestimonialInterface
     */
    public function setImage($image);

    /**
     * Set Info
     *
     * @param string $info
     * @return \Malithmcr\Testimonials\Api\Data\TestimonialInterface
     */
    public function setInfo($info);

    /**
     * Set creation time
     *
     * @param string $creationTime
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setCreationTime($creationTime);

    /**
     * Set update time
     *
     * @param string $updateTime
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setUpdateTime($updateTime);

    /**
     * Set is active
     *
     * @param int|bool $isActive
     * @return \Ashsmith\Blog\Api\Data\PostInterface
     */
    public function setIsActive($isActive);
}