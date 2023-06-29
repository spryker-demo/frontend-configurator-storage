<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\FrontendConfiguratorStorage;

use Spryker\Client\Kernel\AbstractFactory;
use Spryker\Client\Storage\StorageClientInterface;
use SprykerDemo\Client\FrontendConfiguratorStorage\Reader\FrontendConfiguratorStorageReader;
use SprykerDemo\Client\FrontendConfiguratorStorage\Reader\FrontendConfiguratorStorageReaderInterface;

class FrontendConfiguratorStorageFactory extends AbstractFactory
{
    /**
     * @return \SprykerDemo\Client\FrontendConfiguratorStorage\Reader\FrontendConfiguratorStorageReaderInterface
     */
    public function createFrontendConfiguratorStorageReader(): FrontendConfiguratorStorageReaderInterface
    {
        return new FrontendConfiguratorStorageReader($this->getStorageClient());
    }

    /**
     * @return \Spryker\Client\Storage\StorageClientInterface
     */
    public function getStorageClient(): StorageClientInterface
    {
        return $this->getProvidedDependency(FrontendConfiguratorStorageDependencyProvider::CLIENT_STORAGE);
    }
}
