<?php
/**
 * Created by PhpStorm.
 * User: ericmorand
 * Date: 13.10.17
 * Time: 11:48
 */

namespace Drupal\social_profile_field\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Url;

/**
 * Checks that the submitted value is a unique integer
 *
 * @Constraint(
 *   id = "social_profile_url",
 *   label = @Translation("Social profile URL", context = "Validation"),
 * )
 */
class SocialProfileUrl extends Url {

}
