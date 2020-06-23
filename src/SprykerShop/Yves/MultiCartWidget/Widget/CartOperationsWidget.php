<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerShop\Yves\MultiCartWidget\Widget;

use Generated\Shared\Transfer\QuoteTransfer;
use Spryker\Yves\Kernel\Widget\AbstractWidget;
use Symfony\Component\Form\FormView;

/**
 * @method \SprykerShop\Yves\MultiCartWidget\MultiCartWidgetFactory getFactory()
 */
class CartOperationsWidget extends AbstractWidget
{
    /**
     * @param \Generated\Shared\Transfer\QuoteTransfer $quoteTransfer
     */
    public function __construct(QuoteTransfer $quoteTransfer)
    {
        $this->addParameter('cart', $quoteTransfer)
            ->addParameter('isMultiCartAllowed', $this->isMultiCartAllowed())
            ->addParameter('isDeleteCartAllowed', $this->isDeleteCartAllowed())
            ->addParameter('multiCartClearForm', $this->getMultiCartClearFormView())
            ->addParameter('multiCartDuplicateForm', $this->getMultiCartDuplicateFormView())
            ->addParameter('multiCartSetDefaultForm', $this->getMultiCartSetDefaultFormView());

        /** @deprecated Use global widgets instead. */
        $this->addWidgets($this->getFactory()->getViewExtendWidgetPlugins());
    }

    /**
     * @return string
     */
    public static function getName(): string
    {
        return 'CartOperationsWidget';
    }

    /**
     * @return string
     */
    public static function getTemplate(): string
    {
        return '@MultiCartWidget/views/cart-operations/cart-operations.twig';
    }

    /**
     * @return bool
     */
    protected function isMultiCartAllowed(): bool
    {
        return $this->getFactory()
            ->getMultiCartClient()
            ->isMultiCartAllowed();
    }

    /**
     * @return bool
     */
    protected function isDeleteCartAllowed(): bool
    {
        $numberOfQuotes = count($this->getFactory()
            ->getMultiCartClient()
            ->getQuoteCollection()
            ->getQuotes());

        return $numberOfQuotes > 1;
    }

    /**
     * @return \Symfony\Component\Form\FormView
     */
    protected function getMultiCartClearFormView(): FormView
    {
        return $this->getFactory()->getMultiCartClearForm()->createView();
    }

    /**
     * @return \Symfony\Component\Form\FormView
     */
    protected function getMultiCartDuplicateFormView(): FormView
    {
        return $this->getFactory()->getMultiCartDuplicateForm()->createView();
    }

    /**
     * @return \Symfony\Component\Form\FormView
     */
    protected function getMultiCartSetDefaultFormView(): FormView
    {
        return $this->getFactory()->getMultiCartSetDefaultForm()->createView();
    }
}
