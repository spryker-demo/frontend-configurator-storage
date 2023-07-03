<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Client\FrontendConfiguratorStorage\Reader;

use Generated\Shared\Transfer\FrontendConfiguratorTransfer;

interface FrontendConfiguratorStorageReaderInterface
{
    /**
     * @return \Generated\Shared\Transfer\FrontendConfiguratorTransfer
     */
    public function getFrontendConfiguration(): FrontendConfiguratorTransfer;
}
