<?php

namespace Drupal\social_profile_field\Plugin\Field\FieldWidget;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Plugin implementation of the 'social_profile' default widget.
 *
 * @FieldWidget (
 *   id = "social_profile_default",
 *   label = @Translation("Social profile"),
 *   field_types = {
 *     "social_profile"
 *   }
 * )
 */
class SocialProfileWidget extends WidgetBase {

  /**
   * {@inheritdoc}
   */
  public function formElement(FieldItemListInterface $items, $delta, array $element, array &$form, FormStateInterface $form_state) {
    $options = [
      'facebook' => $this->t('Facebook'),
      'twitter' => $this->t('Twitter'),
      'instagram' => $this->t('Instagram'),
      'linkedin' => $this->t('Linkedin'),
      'youtube' => $this->t('YouTube'),
      'pinterest' => $this->t('Pinterest'),
      'google-plus' => $this->t('Google+'),
      'feed' => $this->t('RSS Feed')
    ];

    asort($options);

    $element['network'] = [
      '#type' => 'select',
      '#title' => t('Network'),
      '#default_value' => isset($items[$delta]->network) ? $items[$delta]->network : 0,
      '#multiple' => FALSE,
      '#options' => $options,
      //      '#required' => TRUE,
      '#empty_option' => $this->t('Select a social network'),
      '#empty_value' => NULL,
    ];

    $element['url'] = [
      '#type' => 'textfield',
      '#title' => t('URL'),
      '#default_value' => isset($items[$delta]->url) ? $items[$delta]->url : NULL,
      //      '#required' => TRUE
    ];

    // If cardinality is 1, ensure a label is output for the field by wrapping
    // it in a details element.
    if ($this->fieldDefinition->getFieldStorageDefinition()
        ->getCardinality() == 1) {
      $element += [
        '#type' => 'fieldset',
        '#attributes' => ['class' => ['container-inline']],
      ];
    }

    return $element;
  }
}
