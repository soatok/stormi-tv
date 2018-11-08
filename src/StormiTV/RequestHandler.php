<?php
declare(strict_types=1);
namespace Soatok\StormiTV;

use function GuzzleHttp\Psr7\stream_for;
use Psr\Container\ContainerInterface;
use Psr\Http\Message\ResponseInterface;

/**
 * Class RequestHandler
 *
 * @package Soatok\StormiTV
 */
class RequestHandler
{
    /** @var ContainerInterface $container */
    protected $container;

    /** @var \Twig_Environment $view */
    protected $view;

    // constructor receives container instance
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;

        $this->view = $this->container->get('renderer');
    }

    /**
     * @param string $filename
     * @param array $args
     * @return string
     */
    public function render(string $filename, array $args = []): string
    {
        try {
            return $this->view->render($filename, $args);
        } catch (\Throwable $ex) {
            return $ex->getMessage();
        }
    }

    /**
     * @param ResponseInterface $response
     * @param string $template
     * @param array $args
     * @return ResponseInterface
     */
    public function respond(
        ResponseInterface $response,
        string $template,
        array $args = []
    ): ResponseInterface {
        return $response->withBody(
            stream_for($this->render($template, $args))
        );
    }
}
