<?php

namespace Utils\Rector;

use PhpParser\Node;
use PhpParser\Node\Expr\MethodCall;
use Rector\Core\Rector\AbstractRector;
use Symplify\RuleDocGenerator\Exception\PoorDocumentationException;
use Symplify\RuleDocGenerator\ValueObject\CodeSample\CodeSample;
use Symplify\RuleDocGenerator\ValueObject\RuleDefinition;

class UseAssertCountWhenPossible extends AbstractRector
{
    /**
     * @throws PoorDocumentationException
     */
    public function getRuleDefinition(): RuleDefinition
    {
        return new RuleDefinition(
            'Replace ->assertEquals(count($expected), 2) with ->assertCount(2, $expected)',
            [
                new CodeSample('->assertEquals(count($expected), 2)', '->assertCount(2, $expected)'),
            ]
        );
    }

    public function getNodeTypes(): array
    {
        return [ MethodCall::class ];
    }

    /**
     * @param MethodCall $node
     */
    public function refactor(Node $node): ?Node
    {

        if ($node->name->toString() !== 'assertEquals') {
            return null;
        }

        if (!($node->args[1]->value instanceof Node\Expr\FuncCall)) {
            return null;
        }

        if ($node->args[1]->value->name->toString() !== 'count') {
            return null;
        }

        // ->assertEquals(2, count($expected))', '->assertCount(2, $expected)
        $firstArg = $node->args[0];
        $secondArg = $node->args[1]->value->args[0];

        return $this->nodeFactory
            ->createMethodCall('this', 'assertCount', [$firstArg, $secondArg]);
    }

}