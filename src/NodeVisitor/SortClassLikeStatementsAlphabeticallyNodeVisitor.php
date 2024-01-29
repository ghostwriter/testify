<?php

namespace Ghostwriter\Testify\NodeVisitor;

use PhpParser\Node;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\NodeVisitorAbstract;

final class SortClassLikeStatementsAlphabeticallyNodeVisitor extends NodeVisitorAbstract
{
    public function enterNode(Node $node)
    {
        if (!$node instanceof Namespace_) {
            return null;
        }

        usort($node->stmts, static function (Node $a, Node $b) {
            if (!$a instanceof ClassLike) {
                return 0;
            }

            if (!$b instanceof ClassLike) {
                return 0;
            }

            return $a->name?->toString() <=> $b->name?->toString();
        });

        return $node;
    }
}
