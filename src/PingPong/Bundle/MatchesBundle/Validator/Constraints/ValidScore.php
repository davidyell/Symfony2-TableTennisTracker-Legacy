<?php
/**
 * Check to make sure that two table tennis scores are valid
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\MatchesBundle\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * ValidScore Constraint
 *
 * @Annotation
 */
class ValidScore extends Constraint
{
    /**
     * @var string
     */
    public $message = "Scores are not valid.";

    /**
     * Which validator class are we going to use?
     *
     * @return string
     */
    public function validatedBy()
    {
        return get_class($this).'Validator';
    }

}