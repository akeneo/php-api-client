<?php

namespace Akeneo\Pim\Api;

use Akeneo\Pim\Client\ResourceClientInterface;
use Akeneo\Pim\Pagination\PageFactoryInterface;
use Akeneo\Pim\Pagination\ResourceCursorFactoryInterface;

/**
 * Class MediaFileApi
 *
 * @author    Laurent Petard <laurent.petard@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class MediaFileApi implements MediaFileApiInterface
{
    const MEDIA_FILES_PATH = 'api/rest/v1/media-files';

    /** @var ResourceClientInterface */
    protected $resourceClient;

    /** @var PageFactoryInterface */
    protected $pageFactory;

    /** @var ResourceCursorFactoryInterface */
    protected $cursorFactory;

    /**
     * @param ResourceClientInterface        $resourceClient
     * @param PageFactoryInterface           $pageFactory
     * @param ResourceCursorFactoryInterface $cursorFactory
     */
    public function __construct(
        ResourceClientInterface $resourceClient,
        PageFactoryInterface $pageFactory,
        ResourceCursorFactoryInterface $cursorFactory
    ) {
        $this->resourceClient = $resourceClient;
        $this->pageFactory = $pageFactory;
        $this->cursorFactory = $cursorFactory;
    }

    /**
     * {@inheritdoc}
     */
    public function listPerPage($limit = 10, $withCount = false, array $queryParameters = [])
    {
        $data = $this->resourceClient->getResources(static::MEDIA_FILES_PATH, [], $limit, $withCount, $queryParameters);

        return $this->pageFactory->createPage($data);
    }

    /**
     * {@inheritdoc}
     */
    public function all($pageSize = 10, array $queryParameters = [])
    {
        $firstPage = $this->listPerPage($pageSize, false, $queryParameters);

        return $this->cursorFactory->createCursor($pageSize, $firstPage);
    }
}