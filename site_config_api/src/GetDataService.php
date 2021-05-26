<?php
namespace Drupal\site_config_api;

use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpFoundation;

/**
 * GetDataService implement helper service class.
 */
class GetDataService
{

    /**
     * The config factory.
     *
     * @var \Drupal\Core\Config\ConfigFactoryInterface
     */
    protected $configFactory;

    /**
     * 
     *
     * @param ConfigFactoryInterface $config_factory
     *
     */

    public function __construct(ConfigFactoryInterface $config_factory)
    {
        $this->configFactory = $config_factory;
    }

    /**
     * Get the api keys from basic site settings form.
     */
    public function getConfigs()
    {
      $citykey = $this->configFactory->get('system.site')->get('cityapikey');
      $weatehrkey = $this->configFactory->get('system.site')->get('weatherapikey');
      $key = [$citykey, $weatehrkey];
      return $key;
    }

    public function getWeatherDetails($access_key, $location)
    {

        // Get current user ip address.
        $ip = \Drupal::request()->getClientIp();
        // $ip = '1.186.111.12';
        
        if (empty($location))
        {
          // Initialize CURL:
          $ch = curl_init('http://api.ipstack.com/' . $ip . '?access_key=' . $access_key . '');
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        }
        else
        {
          $ch = curl_init(sprintf('http://api.weatherstack.com/current?access_key=' . $access_key . '&query=' . $location . ''));
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        }

        // Store the data:
        $json = curl_exec($ch);
        curl_close($ch);

        // Decode JSON response:
        $api_result = json_decode($json, true);
        
        return $api_result;
    }
}

