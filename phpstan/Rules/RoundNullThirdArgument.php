<?php

namespace Phpstan\Rules;

use PhpParser\Node;
use PhpParser\Node\Name;
use PhpParser\Node\Expr\FuncCall;
use PhpParser\Node\Expr\ConstFetch;
use PHPStan\Analyser\Scope;
use PHPStan\Rules\Rule;
use PHPStan\Rules\RuleErrorBuilder;


class RoundNullThirdArgument implements Rule {
    
    public function getNodeType(): string
    {
        return FuncCall::class;
    }

    public function processNode(Node $node, Scope $scope): array
    {
        if (!$node instanceof FuncCall || !$node->name instanceof Name) {
            return [];
        }

        if (strtolower($node->name->toString()) !== 'round') {
            return [];
        }

        if (!isset($node->args[2])) {
            return [];
        }

        $thirdArg = $node->args[2]->value;

        if ($thirdArg instanceof ConstFetch && strtolower($thirdArg->name->toString()) === 'null') {
            return [
                RuleErrorBuilder::message(sprintf(
                    'Passing null as third argument to round function'
                ))->build()
            ];
        }

        return [];
    }
}
