<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\NodeVisitor;

use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\Match_;
use PhpParser\Node\Identifier;
use PhpParser\Node\MatchArm;
use PhpParser\Node\Stmt\ClassLike;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeVisitor;
use PhpParser\NodeVisitorAbstract;

use function usort;

final class SortUseStatementsAlphabeticallyNodeVisitor extends NodeVisitorAbstract implements NodeVisitor
{
    #[Override]
    public function leaveNode(Node $node): ?Node
    {
        if (! $node instanceof Namespace_) {
            return null;
        }

        usort($node->stmts, static function ($a, $b) {
            if (! $a instanceof Use_ || ! $b instanceof Use_) {
                return 0;
            }

            return $a->uses[0]->name->toString() <=> $b->uses[0]->name->toString();
        });

        return $node;
    }
}
