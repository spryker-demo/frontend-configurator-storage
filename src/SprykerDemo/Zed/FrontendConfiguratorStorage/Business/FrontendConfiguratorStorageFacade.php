<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business;

use Orm\Zed\ConfigContainer\Persistence\PyzConfigContainer;
use Orm\Zed\ConfigContainer\Persistence\PyzConfigContainerQuery;
use Orm\Zed\FileManagerStorage\Persistence\PyzConfigContainerStorage;
use Orm\Zed\FileManagerStorage\Persistence\PyzConfigContainerStorageQuery;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageBusinessFactory getFactory()
 */
class FrontendConfiguratorStorageFacade extends AbstractFacade implements FrontendConfiguratorStorageFacadeInterface
{
    public function publish($configContainerIds)
    {
        $antelopeEntity = PyzConfigContainerQuery::create()
            ->filterByName('FRONTEND_CONFIG')
            ->findOne();

        $searchEntity = PyzConfigContainerStorageQuery::create()
            ->filterByFkConfigContainer('FRONTEND_CONFIG')
            ->findOneOrCreate();
        $searchEntity->setFkConfigContainer('FRONTEND_CONFIG');
        $searchEntity->setData(['kk' => '32323']);

        $searchEntity->save();
    }
}
