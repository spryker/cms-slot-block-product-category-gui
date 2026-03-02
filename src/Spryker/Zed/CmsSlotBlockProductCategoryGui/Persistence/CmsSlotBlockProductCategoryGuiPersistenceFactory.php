<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsSlotBlockProductCategoryGui\Persistence;

use Spryker\Zed\CmsSlotBlockProductCategoryGui\CmsSlotBlockProductCategoryGuiDependencyProvider;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade\CmsSlotBlockProductCategoryGuiToLocaleFacadeInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\QueryContainer\CmsSlotBlockProductCategoryGuiToProductQueryContainerInterface;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \Spryker\Zed\CmsSlotBlockProductCategoryGui\Persistence\CmsSlotBlockProductCategoryGuiRepositoryInterface getRepository()
 */
class CmsSlotBlockProductCategoryGuiPersistenceFactory extends AbstractPersistenceFactory
{
    public function createCmsSlotBlockProductCategoryGuiMapper(): CmsSlotBlockProductCategoryGuiMapper
    {
        return new CmsSlotBlockProductCategoryGuiMapper();
    }

    public function getProductQueryContainer(): CmsSlotBlockProductCategoryGuiToProductQueryContainerInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::QUERY_CONTAINER_PRODUCT);
    }

    public function getLocaleFacade(): CmsSlotBlockProductCategoryGuiToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::FACADE_LOCALE);
    }
}
