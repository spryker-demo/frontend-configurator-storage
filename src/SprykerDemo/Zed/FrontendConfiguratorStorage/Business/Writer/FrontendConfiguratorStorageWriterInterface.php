<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business\Writer;

interface FrontendConfiguratorStorageWriterInterface
{
    /**
     * @return void
     */
    public function publish(): void;
}
