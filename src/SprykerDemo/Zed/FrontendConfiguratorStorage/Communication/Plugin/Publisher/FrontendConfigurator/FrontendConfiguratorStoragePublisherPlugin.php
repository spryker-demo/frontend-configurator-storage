<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\Plugin\Publisher\FrontendConfigurator;

use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherPluginInterface;
use SprykerDemo\Zed\FrontendConfigurator\Dependency\FrontendConfiguratorEvents;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStoragePublisherPlugin extends AbstractPlugin implements PublisherPluginInterface
{
    /**
     * {@inheritDoc}
     * - Gets MerchantIds from event transfers.
     * - Publish merchant data to storage table.
     *
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName): void
    {
        $this->getFacade()->publish();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return array<string>
     */
    public function getSubscribedEvents(): array
    {
        return [
            FrontendConfiguratorEvents::FRONTEND_CONFIGURATOR_PUBLISH,
            FrontendConfiguratorEvents::ENTITY_SPY_FRONTEND_CONFIGURATOR_CREATE,
            FrontendConfiguratorEvents::ENTITY_SPY_FRONTEND_CONFIGURATOR_UPDATE,
        ];
    }
}
