<?php

namespace Maisondunet\SaveQuote\Model\Button;

use Magento\Framework\Data\Helper\PostHelper;
use Magento\Framework\Url;
use Maisondunet\SaveQuote\Api\Button\ButtonActionInterface;
use Maisondunet\SaveQuote\Api\Data\QuoteDescriptionInterface;

class ButtonActionRestore implements ButtonActionInterface
{
    public function __construct(
        protected PostHelper $postHelper,
        protected Url $url
    ){}

    public function createAction(QuoteDescriptionInterface $quoteDescription): string
    {
        return $this->postHelper->getPostData(
            $this->url->getUrl('mdnsavecart/customer/switchcart'),
            ["id" => $quoteDescription->getQuoteDescriptionId()]
        );
    }

    public function isPost(): bool
    {
        return true;
    }
}
