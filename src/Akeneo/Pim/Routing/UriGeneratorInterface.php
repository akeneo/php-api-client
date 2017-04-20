<?php

namespace Akeneo\Pim\Routing;

use Psr\Http\Message\UriInterface;

/**
 * Interface to generate a complete uri from a route name.
 *
 * @author    Alexandre Hocquard <alexandre.hocquard@akeneo.com>
 * @copyright 2017 Akeneo SAS (http://www.akeneo.com)
 * @license   http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
interface UriGeneratorInterface
{
    /**
     * Generate an uri from a path, by adding host and port.
     *
     * @param string $routeName       Name of the route
     * @param array  $uriParameters   List of the parameters to generate the end-point
     * @param array  $queryParameters List of the query parameters added to the end-point
     *
     * @return UriInterface
     *
     * @throws \InvalidArgumentException If the route does not exists
     */
    public function generate($routeName, array $uriParameters = [], array $queryParameters = []);
}
