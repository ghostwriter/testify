<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\NodeVisitor;

use Override;
use PhpParser\Node;
use PhpParser\NodeVisitor;
use PhpParser\NodeVisitorAbstract;

use function spl_object_hash;

final class HashNodeVisitor extends NodeVisitorAbstract implements NodeVisitor
{
    #[Override]
    public function enterNode(Node $node): ?Node
    {
        $node->setAttribute(self::class, spl_object_hash($node));
        return $node;
    }
}
