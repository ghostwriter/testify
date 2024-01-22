<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\NodeVisitor;

use Override;
use PhpParser\Node;
use PhpParser\Node\Expr\Array_;
use PhpParser\NodeVisitor;
use PhpParser\NodeVisitorAbstract;

final class ChangeToShortArrayNodeVisitor extends NodeVisitorAbstract implements NodeVisitor
{
    #[Override]
    public function leaveNode(Node $node): ?Node
    {
        if (! $node instanceof Array_) {
            return null;
        }

        $node->setAttribute('kind', Array_::KIND_SHORT);

        return $node;
    }
}
