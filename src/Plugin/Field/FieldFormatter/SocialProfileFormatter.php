<?php
/**
 * Created by PhpStorm.
 * User: ericmorand
 * Date: 12.10.17
 * Time: 18:23
 */


/**
 * @file
 * Contains \Drupal\social_profile_field\Plugin\Field\FieldFormatter\SocialProfileField.
 */

namespace Drupal\social_profile_field\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Render\Element;

/**
 * Plugin implementation of the 'social_profile' default formatter.
 *
 * @FieldFormatter (
 *   id = "social_profile_default",
 *   label = @Translation("Social profile"),
 *   field_types = {
 *     "social_profile"
 *   }
 * )
 */
class SocialProfileFormatter extends FormatterBase {
  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode = NULL) {
    $elements = [];

    foreach ($items as $delta => $item) {
      $elements[$delta] = array(
        '#theme' => 'social_profile_formatter',
        '#network' => $item->network,
        '#url' => $item->url
      );
    }

    return $elements;
  }
}
