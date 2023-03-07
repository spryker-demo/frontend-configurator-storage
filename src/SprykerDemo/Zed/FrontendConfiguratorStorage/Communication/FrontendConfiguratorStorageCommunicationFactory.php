<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Communication;

use Spryker\Zed\FileManagerStorage\FileManagerStorageDependencyProvider;
use Spryker\Zed\Kernel\Communication\AbstractCommunicationFactory;
use SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageDependencyProvider;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStorageCommunicationFactory extends AbstractCommunicationFactory
{
    /**
     * @return \Spryker\Zed\FileManagerStorage\Dependency\Facade\FileManagerStorageToEventBehaviorFacadeInterface
     */
    public function getEventBehaviorFacade()
    {
        return $this->getProvidedDependency(FrontendConfiguratorStorageDependencyProvider::FACADE_EVENT_BEHAVIOR);
    }
}
