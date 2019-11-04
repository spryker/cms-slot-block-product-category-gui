<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace Spryker\Zed\CmsSlotBlockProductCategoryGui\Communication\Form\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class ProductCategoryConditionConstraint extends Constraint
{
    /**
     * @var string
     */
    protected const ERROR_MESSAGE = 'At least one product or category should be specified.';

    /**
     * @return string
     */
    public function getTargets(): string
    {
        return static::CLASS_CONSTRAINT;
    }

    /**
     * @return string
     */
    public function getMessage(): string
    {
        return static::ERROR_MESSAGE;
    }
}
