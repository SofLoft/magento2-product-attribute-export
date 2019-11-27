<?php
/**
 * Copyright © 2019 Soft-Loft, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */
namespace Softloft\ProductAttributeExport\Model\Model\Export;

use Softloft\ProductAttributeExport\Service\Configuration;

use Magento\CatalogImportExport\Model\Export\RowCustomizerInterface;

/**
 * Class RowCustomizer
 * @package Softloft\ProductAttributeExport\Model\Model\Export
 */
class RowCustomizer implements RowCustomizerInterface
{
    /** @var Configuration */
    private $configuration;

    /** @var array */
    private $extraAttributes = [];

    /**
     * RowCustomizer constructor.
     * @param Configuration $configuration
     */
    public function __construct(Configuration $configuration)
    {
        $this->configuration = $configuration;
    }

    /**
     * Prepare data for export
     *
     * @param mixed $collection
     * @param int[] $productIds
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function prepareData($collection, $productIds)
    {
        if ($this->configuration->isEnabled() === true) {
            $this->extraAttributes = $this->configuration->getAdditionalAttributes();
        }

        return $this;
    }

    /**
     * Set headers columns
     *
     * @param array $columns
     * @return mixed
     */
    public function addHeaderColumns($columns)
    {
        $headerColumns = $columns;
        if (\is_array($this->extraAttributes) && !empty($this->extraAttributes)) {
            $headerColumns = array_merge($columns, $this->extraAttributes);
        }

        return $headerColumns;
    }

    /**
     * Add data for export
     *
     * @param array $dataRow
     * @param int $productId
     * @return mixed
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     */
    public function addData($dataRow, $productId)
    {
        return $dataRow;
    }

    /**
     * Calculate the largest links block
     *
     * @param array $additionalRowsCount
     * @param int $productId
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     * @return mixed
     */
    public function getAdditionalRowsCount($additionalRowsCount, $productId)
    {
        return $additionalRowsCount;
    }
}
