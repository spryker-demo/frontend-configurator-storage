<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business;

use Spryker\Zed\Kernel\Business\AbstractBusinessFactory;
use SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface;
use SprykerDemo\Zed\FrontendConfiguratorStorage\Business\Writer\FrontendConfiguratorStorageWriter;
use SprykerDemo\Zed\FrontendConfiguratorStorage\Business\Writer\FrontendConfiguratorStorageWriterInterface;
use SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageDependencyProvider;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStorageEntityManagerInterface getEntityManager()
 */
class FrontendConfiguratorStorageBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @return \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\Writer\FrontendConfiguratorStorageWriterInterface
     */
    public function createFrontendConfiguratorStorageWriter(): FrontendConfiguratorStorageWriterInterface
    {
        return new FrontendConfiguratorStorageWriter(
            $this->getFrontendConfiguratorFacade(),
            $this->getEntityManager(),
        );
    }

    /**
     * @return \SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface
     */
    public function getFrontendConfiguratorFacade(): FrontendConfiguratorFacadeInterface
    {
        return $this->getProvidedDependency(FrontendConfiguratorStorageDependencyProvider::FACADE_FRONTEND_CONFIGURATOR);
    }
}
