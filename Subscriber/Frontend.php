<?php

namespace BobbyshawLoqateAddressCapture\Subscriber;

use Enlight\Event\SubscriberInterface;
use Shopware\Components\Plugin\ConfigReader;

class Frontend implements SubscriberInterface
{
    private $pluginDirectory;
    private $config;

    public static function getSubscribedEvents()
    {
        return array(
            'Enlight_Controller_Action_PreDispatch_Frontend' => 'onFrontendPreDispatch'
        );
    }

    public function __construct($pluginName, $pluginDirectory, ConfigReader $configReader)
    {
        $this->pluginDirectory = $pluginDirectory;
        $this->config = $configReader->getByPluginName($pluginName);
    }

    public function onFrontendPreDispatch(\Enlight_Event_EventArgs $args)
    {
        /** @var $controller \Enlight_Controller_Action */
        $controller = $args->getSubject();
        $view = $controller->View();

        if ($controller->Front()->Request()->getControllerName() == 'checkout') {
            $view->addTemplateDir($this->pluginDirectory . '/Resources/views');

            $view->assign('bobbyshawLoqateAddressCaptureEnabled', $this->config['bobbyshawLoqateAddressCaptureEnabled']);
            $view->assign('bobbyshawLoqateAPIKey', $this->config['bobbyshawLoqateAPIKey']);
        }
    }
}
