<?php

namespace Techeniac\VideoSlider\Setup;

use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\InstallSchemaInterface;
use Magento\Framework\Setup\SchemaSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
 * @codeCoverageIgnore
 */
class InstallSchema implements InstallSchemaInterface
{
    /**
     * {@inheritdoc}
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     */
    public function install(SchemaSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        if (!$installer->tableExists('techeniac_video_slider')) {
            $table = $setup->getConnection()->newTable(
                $setup->getTable('techeniac_video_slider')
            )->addColumn(
                'id',
                Table::TYPE_INTEGER,
                null,
                ['identity' => true,'nullable' => false,'primary'=>true],
                'Slider ID'
            )->addColumn(
                'title',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>true],
                'Title'
            )->addColumn(
                'file',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>false],
                'File'
            )->addColumn(
                'video_upload_method',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>false],
                'Video Method'
            )->addColumn(
                'content_on_slider',
                Table::TYPE_TEXT,
                255,
                ['nullable'=>true],
                'Slider Content'
            )->addColumn(
                'position',
                Table::TYPE_INTEGER,
                null,
                ['unsigned' => true,'nullable'=>false,'default'=>'0'],
                'Position'
            )->addColumn(
                'is_active',
                Table::TYPE_SMALLINT,
                null,
                ['unsigned' => true,'nullable'=>false,'default'=>'0'],
                'Enable / Disable'
            )->addColumn(
                'created_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT],
                'Created At'
            )->addColumn(
                'updated_at',
                Table::TYPE_TIMESTAMP,
                null,
                ['nullable' => false, 'default' => Table::TIMESTAMP_INIT_UPDATE],
                'Updated At'
            )->addIndex(
                $setup->getIdxName(
                    'videoslider',
                    ['file','title'],
                    \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT
                ),
                ['file','title'],
                ['type' => \Magento\Framework\DB\Adapter\AdapterInterface::INDEX_TYPE_FULLTEXT]
            )->setComment(
                'Techeniac Video Slider Table'
            );
            $installer->getConnection()->createTable($table);
        }
        $installer->endSetup();
    }
}
