<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\Plugin\Event\Listener;

use Spryker\Zed\Event\Dependency\Plugin\EventBulkHandlerInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\FrontendConfiguratorStorageCommunicationFactory getFactory()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStorageListener extends AbstractPlugin implements EventBulkHandlerInterface
{
    /**
     * @api
     *
     * @param array<\Generated\Shared\Transfer\EventEntityTransfer> $eventEntityTransfers
     * @param string $eventName
     *
     * @return void
     */
    public function handleBulk(array $eventEntityTransfers, $eventName)
    {
        $configContainerIds = $this->getFactory()->getEventBehaviorFacade()->getEventTransferIds($eventEntityTransfers);

        $this->getFacade()->publish($configContainerIds);
    }
}
