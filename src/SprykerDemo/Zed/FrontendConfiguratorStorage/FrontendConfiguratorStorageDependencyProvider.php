<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage;

use Spryker\Zed\Kernel\AbstractBundleDependencyProvider;
use Spryker\Zed\Kernel\Container;
use SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 */
class FrontendConfiguratorStorageDependencyProvider extends AbstractBundleDependencyProvider
{
    /**
     * @var string
     */
    public const FACADE_FRONTEND_CONFIGURATOR = 'FACADE_FRONTEND_CONFIGURATOR';

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    public function provideBusinessLayerDependencies(Container $container): Container
    {
        $container = parent::provideBusinessLayerDependencies($container);
        $container = $this->addFrontendConfiguratorFacade($container);

        return $container;
    }

    /**
     * @param \Spryker\Zed\Kernel\Container $container
     *
     * @return \Spryker\Zed\Kernel\Container
     */
    protected function addFrontendConfiguratorFacade(Container $container): Container
    {
        $container->set(static::FACADE_FRONTEND_CONFIGURATOR, function (Container $container): FrontendConfiguratorFacadeInterface {
            return $container->getLocator()->frontendConfigurator()->facade();
        });

        return $container;
    }
}
