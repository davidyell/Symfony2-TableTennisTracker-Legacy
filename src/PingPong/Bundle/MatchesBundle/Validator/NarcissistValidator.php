<?php
/**
 * NarcissistValidator
 * Check to make sure someone isn't playing with themselves
 *
 * @author David Yell <neon1024@gmail.com>
 */

namespace PingPong\Bundle\MatchesBundle\Validator;

use Symfony\Component\Validator\ExecutionContext;
use PingPong\Bundle\MatchesBundle\Entity\Match;

/**
 * NarcissistValidator
 *
 * @Annotation
 */
class NarcissistValidator
{
    /**
     * @param Result           $match
     * @param ExecutionContext $context
     *
     * @return void
     */
    public static function arePlayersValid(Match $match, ExecutionContext $context)
    {
        $players = $match->getResults();

        foreach ($players as $player) {
            $players[] = $player->getId();
        }

        if ($players[0] == $players[1]) {
            $context->addViolationAt('', "You cannot play a match against yourself.");
        }
    }
}