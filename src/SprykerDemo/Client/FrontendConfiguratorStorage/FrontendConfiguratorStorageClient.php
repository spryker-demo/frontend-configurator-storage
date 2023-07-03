<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\FrontendConfiguratorStorage;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;
use Spryker\Client\Kernel\AbstractClient;

/**
 * @method \SprykerDemo\Client\FrontendConfiguratorStorage\FrontendConfiguratorStorageFactory getFactory()
 */
class FrontendConfiguratorStorageClient extends AbstractClient implements FrontendConfiguratorStorageClientInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\FrontendConfiguratorTransfer
     */
    public function getFrontendConfiguration(): FrontendConfiguratorTransfer
    {
        return $this->getFactory()
            ->createFrontendConfiguratorStorageReader()
            ->getFrontendConfiguration();
    }
}
