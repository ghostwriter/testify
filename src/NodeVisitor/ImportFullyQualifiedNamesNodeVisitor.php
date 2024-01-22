<?php

declare(strict_types=1);

namespace Ghostwriter\Testify\NodeVisitor;

use Override;
use PhpParser\Node;
use PhpParser\Node\Identifier;
use PhpParser\Node\Name;
use PhpParser\Node\Param;
use PhpParser\Node\Stmt\Namespace_;
use PhpParser\Node\Stmt\Use_;
use PhpParser\NodeVisitor;
use PhpParser\NodeVisitorAbstract;

use function array_key_exists;
use function str_contains;

final class ImportFullyQualifiedNamesNodeVisitor extends NodeVisitorAbstract implements NodeVisitor
{
    private array $aliases = [];

    public function __construct(
        private readonly UseStatements $uses = new UseStatements(),
    ) {
    }

    #[Override]
    public function enterNode(Node $node): ?Node
    {
        return match (true) {
            $node instanceof Name => $this->enterName($node),
            $node instanceof Namespace_ => $this->enterNamespace($node),
            default => null,
        };
    }

    #[Override]
    public function leaveNode(Node $node): ?Node
    {
        return match (true) {
            $node instanceof Namespace_ => $this->leaveNamespace($node),
            default => null,
        };
    }

    private function enterName(Name $node): Name
    {
        if ($node->getAttribute('parent') instanceof Param) {
            $type = $node->toString();

            if (! str_contains($type, '\\')) {
                return $node;
            }

            if (! $this->uses->has($type)) {
                return $node;
            }

            $useStatement = $this->uses->get($type);

            $name = $useStatement->name();

            if ($this->uses->has($name)) {
                $name = $useStatement->alias();

                $this->aliases[$type] = $name;
            }

            return new Name($name);
        }

        return $node;
    }

    private function enterNamespace(Namespace_ $node): Namespace_
    {
        foreach ($node->stmts as $stmt) {
            if (! $stmt instanceof Use_) {
                continue;
            }

            foreach ($stmt->uses as $use) {
                $this->uses->set($use->name->toString());
            }
        }

        return $node;
    }

    private function leaveNamespace(Namespace_ $node): Namespace_
    {
        foreach ($node->stmts as $stmt) {
            if (! $stmt instanceof Use_) {
                continue;
            }

            foreach ($stmt->uses as $use) {
                $type = $use->name->toString();

                if (! array_key_exists($type, $this->aliases)) {
                    continue;
                }

                $use->alias = new Identifier($this->aliases[$type]);
            }
        }

        return $node;
    }
}
