<?php

namespace Drupal\iqvia_author\Plugin\Validation\Constraint;

use Symfony\Component\Validator\Constraint;

/**
 * Checks that the submitted value is a valid age.
 *
 * @Constraint(
 *   id = "AgeCheckConstraint",
 *   label = @Translation("Age Validation", context = "Validation"),
 *   type = "string"
 * )
 */
class AgeCheckConstraint extends Constraint {

  // The message that will be shown if the age is lesser than 18.
  public $lesserThan = 'Age should be greater than 18';

  // The message that will be shown if the age is greater than 65.
  public $greaterThan = 'Age should be lower than 65';

}
