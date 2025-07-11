<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\FrontendConfiguratorStorage;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;

interface FrontendConfiguratorStorageClientInterface
{
    /**
     * Specification:
     * - Retrieves frontend configuration from the storage.
     *
     * @api
     *
     * @return \Generated\Shared\Transfer\FrontendConfiguratorTransfer
     */
    public function getFrontendConfiguration(): FrontendConfiguratorTransfer;
}
