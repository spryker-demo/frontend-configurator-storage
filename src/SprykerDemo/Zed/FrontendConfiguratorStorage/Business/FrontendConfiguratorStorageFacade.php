<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @api
 *
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageBusinessFactory getFactory()
 */
class FrontendConfiguratorStorageFacade extends AbstractFacade implements FrontendConfiguratorStorageFacadeInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return void
     */
    public function publish(): void
    {
        $this->getFactory()
            ->createFrontendConfiguratorStorageWriter()
            ->publish();
    }
}
