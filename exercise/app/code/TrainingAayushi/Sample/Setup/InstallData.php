<?php
namespace TrainingAayushi\Sample\Setup;

use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

class InstallData implements InstallDataInterface
{

    /**
     * Install data
     *
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        if (version_compare($context->getVersion(), '1.0.0', '<')) {
            $data = [
                [
                    'data_title' => 'Hello World!',
                    'data_description' => 'This is the first description.',
                    'is_active' => 1,
                    'gender' => 1
                ],
                [
                    'data_title' => 'Hello Again!',
                    'data_description' => 'This is the second description.',
                    'is_active' => 1,
                    'gender' => 1
                ],
                [
                    'data_title' => 'Welcome To The Third Title',
                    'data_description' => 'Here we have a slightly longer description.',
                    'is_active' => 0,
                    'gender' => 0
                ],
                [
                    'data_title' => 'Fourth Coming',
                    'data_description' => 'This is the fourth description.',
                    'is_active' => 1,
                    'gender' => 0
                ],
                [
                    'data_title' => 'TQBFJOTLD',
                    'data_description' => 'The quick brown fox jumped over the lazy dog.',
                    'is_active' => 0,
                    'gender' => 1,
                    'useful' => 1,
                    'color' => 'rgb(0, 0, 254)',
                    'category_data' => 2,
                    'customer_group_ids' => '1,2'
                ]
            ];

            foreach ($data as $datum) {
                $setup->getConnection()
                    ->insertForce($setup->getTable('trainingaayushi_sample_data'), $datum);
            }
        }
    }
}
