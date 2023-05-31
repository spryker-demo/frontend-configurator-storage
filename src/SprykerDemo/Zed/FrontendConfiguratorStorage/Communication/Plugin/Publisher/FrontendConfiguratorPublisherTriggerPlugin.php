<?php

/**
 * Copyright © 2016-present Spryker Systems GmbH. All rights reserved.
 * Use of this software requires acceptance of the Spryker Marketplace License Agreement. See LICENSE file.
 */

namespace SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\Plugin\Publisher;

use Generated\Shared\Transfer\FilterTransfer;
use Generated\Shared\Transfer\MerchantCriteriaTransfer;
use Orm\Zed\ConfigContainer\Persistence\Map\PyzConfigContainerTableMap;
use Orm\Zed\FrontendConfiguratorStorage\Persistence\PyzConfigContainerStorageQuery;
use Orm\Zed\Merchant\Persistence\Map\SpyMerchantTableMap;
use Spryker\Shared\MerchantStorage\MerchantStorageConfig;
use Spryker\Zed\Kernel\Communication\AbstractPlugin;
use Spryker\Zed\Merchant\Dependency\MerchantEvents;
use Spryker\Zed\PublisherExtension\Dependency\Plugin\PublisherTriggerPluginInterface;
use SprykerDemo\Zed\FrontendConfigurator\Dependency\FrontendConfiguratorEvents;

/**
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Business\FrontendConfiguratorStorageFacadeInterface getFacade()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\FrontendConfiguratorStorageConfig getConfig()
 * @method \SprykerDemo\Zed\FrontendConfiguratorStorage\Communication\FrontendConfiguratorStorageCommunicationFactory getFactory()
 */
class FrontendConfiguratorPublisherTriggerPlugin extends AbstractPlugin implements PublisherTriggerPluginInterface
{
    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getResourceName(): string
    {
        return FrontendConfiguratorEvents::FRONTEND_CONFIGURATOR_RESOURCE_NAME;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @param int $offset
     * @param int $limit
     *
     * @return array<\Generated\Shared\Transfer\MerchantProfileTransfer|\Spryker\Shared\Kernel\Transfer\AbstractTransfer>
     */
    public function getData(int $offset, int $limit): array
    {
        $filterTransfer = $this->createFilterTransfer($offset, $limit);
        $merchantCriteriaTransfer = (new MerchantCriteriaTransfer())->setFilter($filterTransfer);
        $merchantCollectionTransfer = $this->getFactory()
            ->getMerchantFacade()
            ->get($merchantCriteriaTransfer);

        return $merchantCollectionTransfer->getMerchants()->getArrayCopy();
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string
     */
    public function getEventName(): string
    {
        return FrontendConfiguratorEvents::FRONTEND_CONFIGURATOR_PUBLISH;
    }

    /**
     * {@inheritDoc}
     *
     * @api
     *
     * @return string|null
     */
    public function getIdColumnName(): ?string
    {
        return PyzConfigContainerTableMap::COL_NAME;
    }

    /**
     * @param int $offset
     * @param int $limit
     *
     * @return \Generated\Shared\Transfer\FilterTransfer
     */
    protected function createFilterTransfer(int $offset, int $limit): FilterTransfer
    {
        return (new FilterTransfer())
            ->setOrderBy(PyzConfigContainerTableMap::COL_NAME)
            ->setOffset($offset)
            ->setLimit($limit);
    }
}
