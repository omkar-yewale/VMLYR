<?php
namespace Drupal\site_config_api\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\NodeInterface;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Symfony\Component\HttpFoundation;

/**
 * This is the weather report controller.
 */
class WeatherDataController extends ControllerBase
{
    public function mainLink()
    {
        $location = '';
        //get the keys from basic site config form.
        $access_key = \Drupal::service('site_config_api.common')->getConfigs();
        //call getWeatherDetails function to get current city name.
        $location = \Drupal::service('site_config_api.common')->getWeatherDetails($access_key[0], $location);
        //call getWeatherDetails function to get weather report based on city name.
        $report = \Drupal::service('site_config_api.common')->getWeatherDetails($access_key[1],$location);
        //create header for table.
        $header = [
            'col1' => t('City'),
            'col2' => t('Temperature'),
            'col3' => t('Weather code'),
            'col4' => t('Weather descriptionse'),
            'col5' => t('Wind Speed'),
            'col6' => t('Wind Degree'),
            'col7' => t('Pressure'),
            'col8' => t('Humidity'),
            'col9' => t('Cloudcover'),
        ];

        //insert data into the table rows.
        $rows = [
            [
                $location['city'],
                $report['current']['temperature'],
                $report['current']['weather_code'],
                $report['current']['weather_descriptions'][0],
                $report['current']['wind_speed'],
                $report['current']['wind_degree'],
                $report['current']['pressure'],
                $report['current']['humidity'],
                $report['current']['cloudcover'],
            ],
        ];

        $recordsToDisplay = [];
        $recordsToDisplay[] = [
            '#type' => 'markup',
            '#markup' => t('Current temperature in ' .$location['city'] .' is ' .$report['current']['temperature'] .'℃.'),
        ];

        $recordsToDisplay[] = [
            '#type' => 'table',
            '#header' => $header,
            '#rows' => $rows,
            '#empty' => t('No data found'),
            '#markup' => "hello hello",
        ];

        return $recordsToDisplay;
    }
}
