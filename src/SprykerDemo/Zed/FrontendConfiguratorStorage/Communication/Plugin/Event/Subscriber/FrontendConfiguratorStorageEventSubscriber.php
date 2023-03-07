<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\Plugin\Event\Subscriber;

use Spryker\Zed\Event\Dependency\EventCollectionInterface;
use Spryker\Zed\Event\Dependency\Plugin\EventSubscriberInterface;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Url\Dependency\UrlEvents;
use SprykerDemo\Zed\FrontendConfigurator\Dependency\FrontendConfiguratorEvents;
use SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\Plugin\Event\Listener\FrontendConfiguratorStorageListener;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\FrontendConfiguratorStorageCommunicationFactory getFactory()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStorageEventSubscriber extends AbstractPlugin implements EventSubscriberInterface
{
    /**
     * @api
     *
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return \Spryker\Zed\Event\Dependency\EventCollectionInterface
     */
    public function getSubscribedEvents(EventCollectionInterface $eventCollection)
    {
        $this->addConfigContainerCreateStorageListener($eventCollection);
        $this->addConfigContainerUpdateStorageListener($eventCollection);
        $this->addConfigContainerDeleteStorageListener($eventCollection);

        return $eventCollection;
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addConfigContainerCreateStorageListener(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(FrontendConfiguratorEvents::ENTITY_PYZ_CONFIG_CONTAINER_CREATE, new FrontendConfiguratorStorageListener(), 0, null, $this->getConfig()->getConfigContainerEventQueueName());
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addConfigContainerUpdateStorageListener(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(FrontendConfiguratorEvents::ENTITY_PYZ_CONFIG_CONTAINER_UPDATE, new FrontendConfiguratorStorageListener(), 0, null, $this->getConfig()->getConfigContainerEventQueueName());
    }

    /**
     * @param \Spryker\Zed\Event\Dependency\EventCollectionInterface $eventCollection
     *
     * @return void
     */
    protected function addConfigContainerDeleteStorageListener(EventCollectionInterface $eventCollection)
    {
        $eventCollection->addListenerQueued(FrontendConfiguratorEvents::ENTITY_PYZ_CONFIG_CONTAINER_DELETE, new FrontendConfiguratorStorageListener(), 0, null, $this->getConfig()->getConfigContainerEventQueueName());
    }
}

