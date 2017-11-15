<?php

namespace Drupal\social_profile_field\Plugin\Field\FieldType;

use Drupal\Core\Field\FieldItemBase;
use Drupal\Core\Field\FieldItemInterface;
use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\Core\TypedData\DataDefinition;


/**
 * Plugin implementation of the 'social_profile' field type.
 *
 * @FieldType(
 *   id = "social_profile",
 *   label = @Translation("Social profile"),
 *   default_formatter = "social_profile_default",
 *   default_widget = "social_profile_default",
 *   constraints = {"social_profile" = {}}
 * )
 */
class SocialProfileItem extends FieldItemBase implements FieldItemInterface {

  /**
   * {@inheritdoc}
   */
  public static function schema(FieldStorageDefinitionInterface $field_definition) {
    return [
      'columns' => [
        'network' => [
          'type' => 'varchar',
          'length' => 256,
        ],
        'url' => [
          'type' => 'varchar',
          'length' => 2048,
        ],
      ],
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function isEmpty() {
    $url = $this->get('url')->getValue();

    return empty($url);
  }

  /**
   * Defines field item properties.
   *
   * Properties that are required to constitute a valid, non-empty item should
   * be denoted with \Drupal\Core\TypedData\DataDefinition::setRequired().
   *
   * @return \Drupal\Core\TypedData\DataDefinitionInterface[]
   *   An array of property definitions of contained properties, keyed by
   *   property name.
   *
   * @see \Drupal\Core\Field\BaseFieldDefinition
   */
  /**
   * {@inheritdoc}
   */
  public static function propertyDefinitions(FieldStorageDefinitionInterface $field_definition) {
    $properties['network'] = DataDefinition::create('string')
      ->setLabel(t('Network'))
      ->setDescription(t('The social network'));

    $properties['url'] = DataDefinition::create('string')
      ->setLabel(t('URL'))
      ->setDescription(t('The URL of the profile'))
      ->addConstraint('social_profile_url')
    ;

    return $properties;
  }
}


