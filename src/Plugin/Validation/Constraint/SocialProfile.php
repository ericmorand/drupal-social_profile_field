<?php
/**
 * Created by PhpStorm.
 * User: ericmorand
 * Date: 13.10.17
 * Time: 11:48
 */

namespace Drupal\social_profile_field\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a unique integer
 *
 * @Constraint(
 *   id = "social_profile",
 *   label = @Translation("Social profile", context = "Validation"),
 * )
 */
class SocialProfile extends Constraint {
  public $networkWithNoUrl = 'URL is mandatory for network %value';

  public $urlWithNoUrl = 'Network is not set for URL %value';
}
