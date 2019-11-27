<?php
/**
 * Copyright © 2019 Soft-Loft, LLC. All rights reserved.
 * See LICENSE.txt for license details.
 */

namespace Softloft\ProductAttributeExport\Service;

use Magento\Framework\App\Config\ScopeConfigInterface;

/**
 * Class Configuration
 * @package Softloft\ProductAttributeExport\Service
 */
class Configuration
{
    /** @var string */
    const XML_PATH_ENABLE = 'roductattributeexport/configuration/enable';

    /** @var string */
    const XML_PATH_ALLOWED_ATTRIBUTE = 'roductattributeexport/configuration/allowedattribute';

    /** @var ScopeConfigInterface */
    private $scopeConfig;

    /**
     * Configuration constructor.
     * @param ScopeConfigInterface $scopeConfig
     */
    public function __construct(ScopeConfigInterface $scopeConfig)
    {
        $this->scopeConfig = $scopeConfig;
    }

    /**
     * Is enabled
     * @return bool
     */
    public function isEnabled() : bool
    {
        return $this->scopeConfig->isSetFlag(self::XML_PATH_ENABLE);
    }

    /**
     * Return list of attribute which can be exported
     * @return array
     */
    public function getAdditionalAttributes() : array
    {
        return explode(',', $this->scopeConfig->getValue(self::XML_PATH_ALLOWED_ATTRIBUTE));
    }
}
