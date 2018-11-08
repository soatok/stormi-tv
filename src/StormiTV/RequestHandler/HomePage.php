<?php
declare(strict_types=1);

namespace Soatok\StormiTV\RequestHandler;
use function GuzzleHttp\Psr7\stream_for;
use Psr\Http\Message\ResponseInterface;
use Slim\Http\Request;
use Slim\Http\Response;
use Soatok\StormiTV\RequestHandler as Base;

/**
 * Class HomePage
 * @package Soatok\StormiTV\RequestHandler
 */
class HomePage extends Base
{
    /**
     * @param Request $request
     * @param Response $response
     * @param array $args
     * @return ResponseInterface
     */
    public function __invoke(Request $request, Response $response, array $args = [])
    {
        return $this->respond($response, 'index.twig');
    }
}
