<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\FrontendConfiguratorStorage\Reader;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;
use Spryker\Client\Storage\StorageClientInterface;

class FrontendConfiguratorStorageReader implements FrontendConfiguratorStorageReaderInterface
{
    /**
     * @var string
     */
    protected const KEY_FRONTEND_CONFIGURATOR = 'frontend_configurator:frontend_config';

    protected StorageClientInterface $storageClient;

    /**
     * @param \Spryker\Client\Storage\StorageClientInterface $storageClient
     */
    public function __construct(StorageClientInterface $storageClient)
    {
        $this->storageClient = $storageClient;
    }

    /**
     * @return \Generated\Shared\Transfer\FrontendConfiguratorTransfer
     */
    public function getFrontendConfiguration(): FrontendConfiguratorTransfer
    {
        $frontendConfiguration = $this->storageClient->get(static::KEY_FRONTEND_CONFIGURATOR);

        return (new FrontendConfiguratorTransfer())
            ->setData($frontendConfiguration);
    }
}
