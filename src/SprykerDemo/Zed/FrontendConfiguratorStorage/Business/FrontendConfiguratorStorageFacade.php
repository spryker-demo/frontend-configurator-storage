<?php

/**
* Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
* Use of this software requires acceptance of the Evaluation License Agreement. See LICENSE file.
*/

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Business;

use Orm\Zed\FrontendConfigurator\Persistence\SpyFrontendConfiguratorQuery;
use Orm\Zed\FrontendConfiguratorStorage\Persistence\SpyFrontendConfiguratorStorageQuery;
use Spryker\Zed\Kernel\Business\AbstractFacade;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageBusinessFactory getFactory()
 */
class FrontendConfiguratorStorageFacade extends AbstractFacade implements FrontendConfiguratorStorageFacadeInterface
{
    public function publish($eventEntityTransfers)
    {
        $keys = [];
        foreach ($eventEntityTransfers as $eventTransfer) {
            $keys[] = $eventTransfer->getId();
        }

        $keys =  array_unique($keys);

        $frontendConfigurator = SpyFrontendConfiguratorQuery::create()
            ->filterByName_In($keys)
            ->findOne();

        $searchEntity = SpyFrontendConfiguratorStorageQuery::create()
            ->filterByFkFrontendConfigurator('FRONTEND_CONFIG')
            ->findOneOrCreate();
        $searchEntity->setFkFrontendConfigurator('FRONTEND_CONFIG');
        $searchEntity->setData(['kk' => $frontendConfigurator->toArray()]);

        $searchEntity->save();
    }
}
