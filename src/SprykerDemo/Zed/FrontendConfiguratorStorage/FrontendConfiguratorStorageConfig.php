<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Zed\FrontendConfiguratorStorage;

use Spryker\Zed\Kernel\AbstractBundleConfig;

class FrontendConfiguratorStorageConfig extends AbstractBundleConfig
{
    /**
     * Defines queue name for publish.
     *
     * @var string
     */
    public const PUBLISH_CONFIG_CONTAINER = 'publish.config_container';

    /**
     * Specification:
     * - Queue name as used for processing config container configuration messages
     *
     * @api
     *
     * @var string
     */
    public const CONFIG_CONTAINER_SYNC_STORAGE_QUEUE = 'sync.storage.config_container';


    /**
     * @api
     *
     * @return string|null
     */
    public function getConfigContainerEventQueueName(): ?string
    {
        return static::PUBLISH_CONFIG_CONTAINER;
    }

}
