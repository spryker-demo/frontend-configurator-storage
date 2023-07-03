<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;

interface FrontendConfiguratorStorageEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\FrontendConfiguratorTransfer $frontendConfiguratorTransfer
     *
     * @return void
     */
    public function saveFrontendConfiguratorStorage(FrontendConfiguratorTransfer $frontendConfiguratorTransfer): void;
}
