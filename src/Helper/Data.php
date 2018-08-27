<?php
/**
 * Testimonials helper
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Helper
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Helper;

use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Customer\Api\Data\CustomerInterface;
use Magento\Customer\Model\Session as CustomerSession;
use Magento\Customer\Helper\View as CustomerViewHelper;

/**
 * Contact base helper
 */

/**
 * Class Data
 */
class Data extends AbstractHelper
{
    /**
     * @TODO The naming seems wrong, needs to be checked and fixed
     */
    const XML_PATH_ENABLED = 'contact/contact/enabled';

    /**
     * Customer session
     *
     * @var CustomerSession
     */
    protected $_customerSession;

    /**
     * @var CustomerViewHelper
     */
    protected $_customerViewHelper;

    /**
     * @param CustomerViewHelper $customerViewHelper
     * @param CustomerSession $customerSession
     * @param Context $context
     */
    public function __construct(
        CustomerViewHelper $customerViewHelper,
        CustomerSession $customerSession,
        Context $context
    ) {
        $this->_customerViewHelper = $customerViewHelper;
        $this->_customerSession = $customerSession;

        parent::__construct($context);
    }

    /**
     * Check if enabled
     *
     * @return string|null
     */
    public function isEnabled()
    {
        return $this->scopeConfig->getValue(
            self::XML_PATH_ENABLED,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Get user name
     *
     * @return string|boolean
     */
    public function getUserName()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return false;
        }

        /** @var CustomerInterface $customer */
        $customer = $this->_customerSession->getCustomerDataObject();

        return trim($this->_customerViewHelper->getCustomerName($customer));
    }

    /**
     * Get user email
     *
     * @return string|boolean
     */
    public function getUserEmail()
    {
        if (!$this->_customerSession->isLoggedIn()) {
            return false;
        }
        /** @var CustomerInterface $customer */
        $customer = $this->_customerSession->getCustomerDataObject();

        return $customer->getEmail();
    }

    /**
     * Upload an image from the request,
     * @TODO To be implemented.
     */
    public function uploadImage(){
//		try {
//            $uploader = $this->_objectManager->create(
//                'Magento\MediaStorage\Model\File\Uploader',
//                ['fileId' => 'image']
//            );
//            $uploader->setAllowedExtensions(['jpg', 'jpeg', 'gif', 'png']);
//            /** @var \Magento\Framework\Image\Adapter\AdapterInterface $imageAdapter */
//            $imageAdapter = $this->_objectManager->get('Magento\Framework\Image\AdapterFactory')->create();
//            $uploader->addValidateCallback('catalog_product_image', $imageAdapter, 'validateUploadFile');
//            $uploader->setAllowRenameFiles(true);
//            $uploader->setFilesDispersion(true);
//            /** @var \Magento\Framework\Filesystem\Directory\Read $mediaDirectory */
//            $mediaDirectory = $this->_objectManager->get('Magento\Framework\Filesystem')
//                ->getDirectoryRead(DirectoryList::MEDIA);
//            $result = $uploader->save($mediaDirectory->getAbsolutePath('testimonials'));
//
//
//            unset($result['tmp_name']);
//            unset($result['path']);
//
//        } catch (\Exception $e) {
//            $result = ['error' => $e->getMessage(), 'errorcode' => $e->getCode()];
//        }
    }
}
