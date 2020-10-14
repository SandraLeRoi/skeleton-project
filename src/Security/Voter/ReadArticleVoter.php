<?php

namespace App\Security\Voter;

use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;
use Symfony\Component\Security\Core\Authorization\Voter\Voter;
use Symfony\Component\Security\Core\Security;
use Symfony\Component\Security\Core\User\UserInterface;

class ReadArticleVoter extends Voter
{
    private $security;
    /**
     * ReadArticleVoter constructor.
     */
    public function __construct(Security $security) {
        $this->security = $security;
    }

    protected function supports($attribute, $subject)
    {
        // replace with your own logic
        // https://symfony.com/doc/current/security/voters.html
        return $attribute === "read_article";
    }

    protected function voteOnAttribute($attribute, $subject, TokenInterface $token)
    {
        $user = $token->getUser();
        if($user === $subject->getAuteur() || $this->security->isGranted("ROLE_ADMIN")) {
            return true;
        } else {
            return false ;
        }
    }
}
