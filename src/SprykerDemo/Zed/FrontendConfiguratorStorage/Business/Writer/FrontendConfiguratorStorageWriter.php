<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business\Writer;

use SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface;
use SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStorageEntityManagerInterface;

class FrontendConfiguratorStorageWriter implements FrontendConfiguratorStorageWriterInterface
{
    /**
     * @uses \SprykerDemo\Zed\FrontendConfigurator\FrontendConfiguratorConfig::FRONTEND_CONFIG_CONTAINER_NAME
     *
     * @var string
     */
    protected const FK_FRONTEND_CONFIGURATOR = 'FRONTEND_CONFIG';

    /**
     * @var \SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface
     */
    protected FrontendConfiguratorFacadeInterface $frontendConfiguratorFacade;

    /**
     * @var \SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStorageEntityManagerInterface
     */
    protected FrontendConfiguratorStorageEntityManagerInterface $frontendConfiguratorStorageEntityManager;

    /**
     * @param \SprykerDemo\Zed\FrontendConfigurator\Business\FrontendConfiguratorFacadeInterface $frontendConfiguratorFacade
     * @param \SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence\FrontendConfiguratorStorageEntityManagerInterface $frontendConfiguratorStorageEntityManager
     */
    public function __construct(
        FrontendConfiguratorFacadeInterface $frontendConfiguratorFacade,
        FrontendConfiguratorStorageEntityManagerInterface $frontendConfiguratorStorageEntityManager
    ) {
        $this->frontendConfiguratorFacade = $frontendConfiguratorFacade;
        $this->frontendConfiguratorStorageEntityManager = $frontendConfiguratorStorageEntityManager;
    }

    /**
     * @return void
     */
    public function publish(): void
    {
        $frontendConfigurator = $this->frontendConfiguratorFacade->getFrontendGuiConfigContainer();
        $this->frontendConfiguratorStorageEntityManager->saveFrontendConfiguratorStorage($frontendConfigurator);
    }
}
