<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication;

use Spryker\Zed\CmsSlotBlockProductCategoryGui\CmsSlotBlockProductCategoryGuiDependencyProvider;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\DataProvider\ProductCategorySlotBlockDataProvider;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\DataProvider\ProductCategorySlotBlockDataProviderInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Form\ProductCategorySlotBlockConditionForm;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Form\Validator\Constraints\ProductCategoryConditionConstraint;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Formatter\ProductLabelFormatter;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Formatter\ProductLabelFormatterInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Reader\Category\CategoryReader;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Reader\Category\CategoryReaderInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Reader\Product\ProductReader;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Reader\Product\ProductReaderInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade\CmsSlotBlockProductCategoryGuiToCategoryFacadeInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade\CmsSlotBlockProductCategoryGuiToLocaleFacadeInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade\CmsSlotBlockProductCategoryGuiToProductFacadeInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Facade\CmsSlotBlockProductCategoryGuiToTranslatorFacadeInterface;
use Spryker\Zed\CmsSlotBlockProductCategoryGui\Dependency\Service\CmsSlotBlockProductCategoryGuiToUtilEncodingInterface;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;

/**
 * @method \Spryker\Zed\CmsSlotBlockProductCategoryGui\Persistence\CmsSlotBlockProductCategoryGuiRepositoryInterface getRepository()
 */
class CmsSlotBlockProductCategoryGuiCommunicationFactory extends AbstractCommunicationFactory
{
    public function createProductCategorySlotBlockConditionForm(): ProductCategorySlotBlockConditionForm
    {
        return new ProductCategorySlotBlockConditionForm();
    }

    public function createProductLabelFormatter(): ProductLabelFormatterInterface
    {
        return new ProductLabelFormatter();
    }

    public function createProductCategorySlotBlockDataProvider(): ProductCategorySlotBlockDataProviderInterface
    {
        return new ProductCategorySlotBlockDataProvider(
            $this->createCmsSlotBlockProductCategoryGuiProductReader(),
            $this->createCmsSlotBlockProductCategoryGuiCategoryReader(),
            $this->getTranslatorFacade(),
        );
    }

    public function createCmsSlotBlockProductCategoryGuiProductReader(): ProductReaderInterface
    {
        return new ProductReader(
            $this->getRepository(),
            $this->getProductFacade(),
            $this->createProductLabelFormatter(),
        );
    }

    public function createCmsSlotBlockProductCategoryGuiCategoryReader(): CategoryReaderInterface
    {
        return new CategoryReader(
            $this->getCategoryFacade(),
            $this->getLocaleFacade(),
        );
    }

    public function createProductCategoryConditionsConstraint(): ProductCategoryConditionConstraint
    {
        return new ProductCategoryConditionConstraint();
    }

    public function getProductFacade(): CmsSlotBlockProductCategoryGuiToProductFacadeInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::FACADE_PRODUCT);
    }

    public function getCategoryFacade(): CmsSlotBlockProductCategoryGuiToCategoryFacadeInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::FACADE_CATEGORY);
    }

    public function getLocaleFacade(): CmsSlotBlockProductCategoryGuiToLocaleFacadeInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::FACADE_LOCALE);
    }

    public function getTranslatorFacade(): CmsSlotBlockProductCategoryGuiToTranslatorFacadeInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::FACADE_TRANSLATOR);
    }

    public function getUtilEncoding(): CmsSlotBlockProductCategoryGuiToUtilEncodingInterface
    {
        return $this->getProvidedDependency(CmsSlotBlockProductCategoryGuiDependencyProvider::SERVICE_UTIL_ENCODING);
    }
}
