<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Persistence;

use Generated\Shared\Transfer\ConfigContainerTransfer;

interface FrontendConfiguratorStorageEntityManagerInterface
{
    /**
     * @param \Generated\Shared\Transfer\ConfigContainerTransfer $configContainerTransfer
     *
     * @return void
     */
    public function saveFrontendConfiguratorStorage(ConfigContainerTransfer $configContainerTransfer): void;
}
