<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence;

use Orm\Zed\FrontendConfiguratorStorage\Persistence\SpyFrontendConfiguratorStorageQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStoragePersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\FrontendConfiguratorStorage\Persistence\SpyFrontendConfiguratorStorageQuery
     */
    public function createFrontendConfiguratorStorageQuery(): SpyFrontendConfiguratorStorageQuery
    {
        return SpyFrontendConfiguratorStorageQuery::create();
    }
}
