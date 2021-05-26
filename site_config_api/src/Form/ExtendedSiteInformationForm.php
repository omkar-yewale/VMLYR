<?php

namespace Drupal\site_config_api\Form;

use Drupal\Core\Form\FormStateInterface;
use Drupal\system\Form\SiteInformationForm;
use Drupal\Core\Render\Markup;

/**
 * ExtendedSiteInformationForm Site Config Form Extended.
 */
class ExtendedSiteInformationForm extends SiteInformationForm {

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $site_config = $this->config('system.site');
    $form = parent::buildForm($form, $form_state);
    $form['api_key'] = [  // create a field set for API keys.
      '#type' => 'details',
      '#title' => 'Custom Field',
      '#open' => TRUE,
    ];
    $form['api_key']['cityapikey'] = [
      '#type' => 'textfield',
      '#title' => 'City API Key',
      // Set Default api key in field.
      '#default_value' => $site_config->get('cityapikey'),
      '#description' => $this->t("Please Enter API Key without space."),
    ];
    $form['api_key']['weatherapikey'] = [
      '#type' => 'textfield',
      '#title' => 'Weather API Key',
      // Set Default api key in field.
      '#default_value' => $site_config->get('weatherapikey'),
      '#description' => $this->t("Please Enter API Key without space."),
    ];
    // Change the save configuration button name.
    $form['actions']['submit']['#value'] = 'Update Configuration';
    return $form;
  }

  /**
   * Basic Config form Custom submit handler.
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $cityapikey = str_replace(' ', '', $form_state->getValue('cityapikey'));
    $weatherapikey = str_replace(' ', '', $form_state->getValue('weatherapikey'));
    $this->config('system.site')
      ->set('cityapikey', $cityapikey)
      ->set('weatherapikey', $weatherapikey)
      ->save();
    parent::submitForm($form, $form_state);
  }

}
