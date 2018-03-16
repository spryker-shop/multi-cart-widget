<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MultiCartWidget\Dependency\Client;

use Generated\Shared\Transfer\QuoteTransfer;

interface MultiCartWidgetToMultiCartClientInterface
{
    /**
     * @return \Generated\Shared\Transfer\QuoteCollectionTransfer
     */
    public function getQuoteCollection();

    /**
     * @return bool
     */
    public function isMultiCartAllowed();

    /**
     * @return \Generated\Shared\Transfer\QuoteTransfer
     */
    public function getActiveCart(): QuoteTransfer;
}
