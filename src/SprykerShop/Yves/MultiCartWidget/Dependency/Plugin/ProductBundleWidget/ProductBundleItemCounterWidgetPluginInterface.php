<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MultiCartWidget\Dependency\Plugin\ProductBundleWidget;

use Generated\Shared\Transfer\QuoteTransfer;

interface ProductBundleItemCounterWidgetPluginInterface
{
    /**
     * @var string
     */
    public const NAME = 'ProductBundleItemCounterWidgetPlugin';

    /**
     * Specification:
     *  - Represents correct calculation count of items in quote
     *
     * @api
     *
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     *
     * @return void
     */
    public function initialize(QuoteTransfer $quoteTransfer): void;
}
