<?php
namespace TrainingAayushi\Sample\Api\Data;

use Magento\Framework\Api\SearchResultsInterface;

interface DataSearchResultsInterface extends SearchResultsInterface
{
    /**
     * Get data list.
     *
     * @return \TrainingAayushi\Sample\Api\Data\DataInterface[]
     */
    public function getItems();

    /**
     * Set data list.
     *
     * @param \TrainingAayushi\Sample\Api\Data\DataInterface[] $items
     * @return $this
     */
    public function setItems(array $items);
}
