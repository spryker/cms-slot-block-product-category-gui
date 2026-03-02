<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade;

use Generated\Shared\Transfer\PaginationTransfer;
use Generated\Shared\Transfer\ProductAbstractSuggestionCollectionTransfer;

class CmsSlotBlockProductCategoryGuiToProductFacadeBridge implements CmsSlotBlockProductCategoryGuiToProductFacadeInterface
{
    /**
     * @var \Spryker\Zed\Product\Business\ProductFacadeInterface
     */
    protected $productFacade;

    /**
     * @param \Spryker\Zed\Product\Business\ProductFacadeInterface $productFacade
     */
    public function __construct($productFacade)
    {
        $this->productFacade = $productFacade;
    }

    public function getPaginatedProductAbstractSuggestions(
        string $suggestion,
        PaginationTransfer $paginationTransfer
    ): ProductAbstractSuggestionCollectionTransfer {
        return $this->productFacade->getPaginatedProductAbstractSuggestions($suggestion, $paginationTransfer);
    }
}
