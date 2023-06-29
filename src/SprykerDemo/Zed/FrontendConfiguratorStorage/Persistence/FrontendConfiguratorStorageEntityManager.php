<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence;

use Generated\Shared\Transfer\ConfigContainerTransfer;
use Spryker\Zed\Kernel\Persistence\AbstractEntityManager;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStoragePersistenceFactory getFactory()
 */
class FrontendConfiguratorStorageEntityManager extends AbstractEntityManager implements FrontendConfiguratorStorageEntityManagerInterface
{
    /**
     * @uses \SprykerDemo\Zed\FrontendConfigurator\FrontendConfiguratorConfig::FRONTEND_CONFIG_CONTAINER_NAME
     *
     * @var string
     */
    protected const FK_FRONTEND_CONFIGURATOR = 'FRONTEND_CONFIG';

    /**
     * @param \Generated\Shared\Transfer\ConfigContainerTransfer $configContainerTransfer
     *
     * @return void
     */
    public function saveFrontendConfiguratorStorage(ConfigContainerTransfer $configContainerTransfer): void
    {
        $searchEntity = $this->getFactory()
            ->createFrontendConfiguratorStorageQuery()
            ->filterByFkFrontendConfigurator(static::FK_FRONTEND_CONFIGURATOR)
            ->findOneOrCreate();
        $searchEntity->setFkFrontendConfigurator(static::FK_FRONTEND_CONFIGURATOR);
        $searchEntity->setData($configContainerTransfer->getData());

        $searchEntity->save();
    }
}
