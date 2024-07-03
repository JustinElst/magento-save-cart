<?php

namespace Maisondunet\SaveQuote\Model\Button;

use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url;
use Maisondunet\SaveQuote\Api\Data\QuoteDescriptionInterface;

class ButtonActionView implements \Maisondunet\SaveQuote\Api\Button\ButtonActionInterface
{
    public function __construct(
        protected PostHelper $postHelper,
        protected Url $url
    ){}

    public function createAction(QuoteDescriptionInterface $quoteDescription): string
    {
        return $this->url->getUrl('mdnsavecart/customer/view', [ "id" => $quoteDescription->getQuoteDescriptionId()]);
    }

    public function isPost(): bool
    {
        return false;
    }
}
