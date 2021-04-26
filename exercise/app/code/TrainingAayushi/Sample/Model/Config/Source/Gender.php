<?php
namespace TrainingAayushi\Sample\Model\Config\Source;

use Magento\Framework\Option\ArrayInterface;

class Gender implements ArrayInterface
{
    /**
     * @return array
     */
    public function toOptionArray()
    {
        $options = [
            0 => [
                'label' => 'Male',
                'value' => '0'
            ],
            1 => [
                'label' => 'Female',
                'value' => '1'
            ],
        ];

        return $options;
    }
}