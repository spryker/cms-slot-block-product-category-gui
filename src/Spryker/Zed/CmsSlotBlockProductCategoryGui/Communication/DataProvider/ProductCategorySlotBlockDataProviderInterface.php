<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\DataProvider;

interface ProductCategorySlotBlockDataProviderInterface
{
    /**
     * @param array<int>|null $productAbstractIds
     *
     * @return array<string, mixed>
     */
    public function getOptions(?array $productAbstractIds = []): array;
}
