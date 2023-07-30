<?php

namespace App\Controllers;

use CodeIgniter\Controller;
use CodeIgniter\HTTP\CLIRequest;
use CodeIgniter\HTTP\IncomingRequest;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;
use CodeIgniter\Exceptions\PageNotFoundException;
use Twig\TwigFunction;

/**
 * Class BaseController
 *
 * BaseController provides a convenient place for loading components
 * and performing functions that are needed by all your controllers.
 * Extend this class in any new controllers:
 *     class Home extends BaseController
 *
 * For security be sure to declare any new methods as protected or private.
 */
abstract class BaseController extends Controller
{
    /**
     * Instance of the main Request object.
     *
     * @var CLIRequest|IncomingRequest
     */
    protected $request;

    /**
     * An array of helpers to be loaded automatically upon
     * class instantiation. These helpers will be available
     * to all other controllers that extend BaseController.
     *
     * @var array
     */
    protected $helpers = [];

    /**
     * Be sure to declare properties for any property fetch you initialized.
     * The creation of dynamic property is deprecated in PHP 8.2.
     */
    // protected $session;


    private $templateViewDir = APPPATH . 'Views/';
    private $templateCacheDir = WRITEPATH . 'twig/cache/';
    // instance of twig
    private $templateTwig = null;


    /**
     * Constructor.
     */
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        // E.g.: $this->session = \Config\Services::session();
        $this->initTwig();
    }

    public function twigDisplay(string $view, $data = [])
    {
        return $this->templateTwig->display("{$view}.twig", $data);
    }

    private function initTwig()
    {
        $loader = new \Twig\Loader\FilesystemLoader($this->templateViewDir);

        $this->templateTwig = new \Twig\Environment($loader, [
            'cache' => $this->templateCacheDir,
            'debug' => ENVIRONMENT === 'development'
        ]);

        $this->templateTwig->addExtension(new \Twig\Extension\DebugExtension());

        # add CI functions to be recognized and call in Twig files
        $fn_ci_list = [
            'form_open',
            'form_close',
            'old',
            'validation_list_errors',
            'validation_show_error'
        ];

        foreach ($fn_ci_list as $fn_name) {
            $this->templateTwig->addFunction(new TwigFunction($fn_name, $fn_name));
        }
    }
}
