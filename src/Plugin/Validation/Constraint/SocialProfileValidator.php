<?php
/**
 * Created by PhpStorm.
 * User: ericmorand
 * Date: 13.10.17
 * Time: 11:50
 */

namespace Drupal\social_profile_field\Plugin\Validation\Constraint;


use Drupal\social_profile_field\Plugin\Field\FieldType\SocialProfileItem;
use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class SocialProfileValidator extends ConstraintValidator {

  /**
   * {@inheritdoc}
   */
  public function validate($items, Constraint $constraint) {
    /** @var $constraint \Drupal\social_profile_field\Plugin\Validation\Constraint\SocialProfile */
    /** @var $items SocialProfileItem */
    $values = $items->getValue();
    $network = $values['network'];
    $url = $values['url'];

    if ($network && empty($url)) {
      $this->context->addViolation($constraint->networkWithNoUrl, ['%value' => $network]);
    }
    else {
      if ($url && !$network) {
        $this->context->addViolation($constraint->urlWithNoUrl, ['%value' => $url]);
      }
    }
  }
}
