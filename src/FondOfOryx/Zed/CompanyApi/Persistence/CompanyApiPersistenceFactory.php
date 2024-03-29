<?php

namespace FondOfOryx\Zed\CompanyApi\Persistence;

use FondOfOryx\Zed\CompanyApi\CompanyApiDependencyProvider;
use FondOfOryx\Zed\CompanyApi\Dependency\Facade\CompanyApiToApiFacadeInterface;
use FondOfOryx\Zed\CompanyApi\Dependency\QueryContainer\CompanyApiToApiQueryBuilderQueryContainerInterface;
use Orm\Zed\Company\Persistence\SpyCompanyQuery;
use Spryker\Zed\Kernel\Persistence\AbstractPersistenceFactory;

/**
 * @codeCoverageIgnore
 *
 * @method \FondOfOryx\Zed\CompanyApi\CompanyApiConfig getConfig()
 * @method \FondOfOryx\Zed\CompanyApi\Persistence\CompanyApiRepositoryInterface getRepository()
 */
class CompanyApiPersistenceFactory extends AbstractPersistenceFactory
{
    /**
     * @return \Orm\Zed\Company\Persistence\SpyCompanyQuery
     */
    public function getCompanyQuery(): SpyCompanyQuery
    {
        return $this->getProvidedDependency(CompanyApiDependencyProvider::PROPEL_QUERY_COMPANY);
    }

    /**
     * @return \FondOfOryx\Zed\CompanyApi\Dependency\QueryContainer\CompanyApiToApiQueryBuilderQueryContainerInterface
     */
    public function getApiQueryBuilderQueryContainer(): CompanyApiToApiQueryBuilderQueryContainerInterface
    {
        return $this->getProvidedDependency(CompanyApiDependencyProvider::QUERY_CONTAINER_API_QUERY_BUILDER);
    }

    /**
     * @return \FondOfOryx\Zed\CompanyApi\Dependency\Facade\CompanyApiToApiFacadeInterface
     */
    public function getApiFacade(): CompanyApiToApiFacadeInterface
    {
        return $this->getProvidedDependency(CompanyApiDependencyProvider::FACADE_API);
    }
}
