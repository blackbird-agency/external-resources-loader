<?php
declare(strict_types = 1);

namespace Blackbird\ExternalResourcesLoader\ViewModel;

use Magento\Framework\App\ObjectManager;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\View\Element\Block\ArgumentInterface;

class NonceProvider implements ArgumentInterface
{
    /**
     * @param mixed|null $cspNonceProvider
     */
    public function __construct(
        protected mixed $cspNonceProvider = null
    ) {
        if(class_exists("\\Magento\\Csp\\Helper\\CspNonceProvider")){
            $this->cspNonceProvider =  $this->cspNonceProvider ??
                                       ObjectManager::getInstance()->get("\\Magento\\Csp\\Helper\\CspNonceProvider");
        }
    }

    /**
     * Get CSP Nonce
     *
     * @return String
     * @throws LocalizedException
     */
    public function renderNonceAttribute(): string
    {
        if(!isset($this->cspNonceProvider)){
            return '';
        }
        $nonce = $this->cspNonceProvider->generateNonce();
        return "nonce='$nonce'";
    }
}
