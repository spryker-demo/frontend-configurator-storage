<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStoragePersistenceFactory getFactory()
 */
class FrontendConfiguratorStorageEntityManager extends AbstractEntityManager implements FrontendConfiguratorStorageEntityManagerInterface
{
    /**
     * @uses \SprykerDemo\Zed\FrontendConfigurator\FrontendConfiguratorConfig::FRONTEND_CONFIG_REDIS_KEY_SUFFIX
     *
     * @var string
     */
    protected const FK_FRONTEND_CONFIGURATOR = 'FRONTEND_CONFIG';

    /**
     * @param \Generated\Shared\Transfer\FrontendConfiguratorTransfer $frontendConfiguratorTransfer
     *
     * @return void
     */
    public function saveFrontendConfiguratorStorage(FrontendConfiguratorTransfer $frontendConfiguratorTransfer): void
    {
        $frontendConfiguratorStorageEntity = $this->getFactory()
            ->createFrontendConfiguratorStorageQuery()
            ->filterByFkFrontendConfigurator(static::FK_FRONTEND_CONFIGURATOR)
            ->findOneOrCreate();
        $frontendConfiguratorStorageEntity->setFkFrontendConfigurator(static::FK_FRONTEND_CONFIGURATOR);
        $frontendConfiguratorStorageEntity->setData($frontendConfiguratorTransfer->getData());

        $frontendConfiguratorStorageEntity->save();
    }
}
