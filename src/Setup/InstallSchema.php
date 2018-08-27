<?php
/**
 * Testimonials Install
 *
 * @module Malithmcr_Testimonials
 * @author Malith Priyashan
 * @package Malithmcr\Testimonials\Setup
 * @licence OSL 3.0
 */

namespace Malithmcr\Testimonials\Setup;

use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\DB\Ddl\Table;
use Malithmcr\Testimonials\Api\Data\TestimonialInterface;

/**
 * Class InstallSchema
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * Installs DB schema for a module
     *
     * @param SchemaSetupInterface $setup
     * @param ModuleContextInterface $context
     *
     * @return void
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;

        $installer->startSetup();

        /**
         * @TODO Improve the naming for the table
         */
        $table = $installer->getConnection()
            ->newTable($installer->getTable('malithmcr_testimonials_testimonial'))
            ->addColumn(
                TestimonialInterface::TESTIMONIAL_ID,
                Table::TYPE_SMALLINT,
                null,
                ['identity' => true, 'nullable' => false, 'primary' => true],
                'Post ID'
            )
            ->addColumn(TestimonialInterface::URL_KEY, Table::TYPE_TEXT, 100, ['nullable' => true, 'default' => null])
            ->addColumn(TestimonialInterface::TITLE, Table::TYPE_TEXT, 255, ['nullable' => false], 'Testimonial Title')
            ->addColumn(TestimonialInterface::CONTENT, Table::TYPE_TEXT, '2M', [], 'Testimonial Content')
            ->addColumn(TestimonialInterface::IMAGE, Table::TYPE_TEXT, '2M', [], 'Clients Image')
            ->addColumn(TestimonialInterface::INFO, Table::TYPE_TEXT, '2M', [], 'Clients Info')
            ->addColumn(TestimonialInterface::IS_ACTIVE, Table::TYPE_SMALLINT, null, ['nullable' => false, 'default' => '1'], 'Is Testimonial Active?')
            ->addColumn(TestimonialInterface::CREATION_TIME, Table::TYPE_DATETIME, null, ['nullable' => false], 'Creation Time')
            ->addColumn(TestimonialInterface::UPDATE_TIME, Table::TYPE_DATETIME, null, ['nullable' => false], 'Update Time')
            ->addIndex($installer->getIdxName(TestimonialInterface::TESTIMONIAL_ID, [TestimonialInterface::URL_KEY]), [TestimonialInterface::URL_KEY])
            ->setComment('Malithmcr Testimonials');

        $installer->getConnection()->createTable($table);

        $installer->endSetup();
    }
}
