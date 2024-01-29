<?php

namespace Ghostwriter\Testify\NodeVisitor;

use PhpParser\Node;
use PhpParser\Node\Expr\Match_;
use PhpParser\Node\MatchArm;
use PhpParser\NodeVisitorAbstract;

final class SortMatchExpressionsAlphabeticallyNodeVisitor extends NodeVisitorAbstract
{
    public function leaveNode(Node $node)
    {
        if (!$node instanceof Match_) {
            return null;
        }

        usort($node->arms, function (MatchArm $a, MatchArm $b) {
            $aIsDefault = $a->conds === null;
            $bIsDefault = $b->conds === null;
            if ($aIsDefault && $bIsDefault) {
                return 0;
            }

            if ($aIsDefault) {
                return 1;
            }

            if ($bIsDefault) {
                return -1;
            }

//            dd($a->conds[0]);
            return $a->conds[0]->name?->toString() <=> $b->conds[0]->name?->toString();
//           
            return match (true) {
                $aIsDefault && $bIsDefault => 0,
                $aIsDefault => 1,
                $bIsDefault => -1,
                default => $a->conds[0]?->name?->toString() <=> $b->conds[0]?->name?->toString(),
            };
        });

        return $node;
    }
}
