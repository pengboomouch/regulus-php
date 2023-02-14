<?php

declare(strict_types=1);

namespace Regulus;

readonly class RuleResult
{
    private bool $isFulfilled;
    /**
     * @param string $ruleName
     * @param string[] $conditionNames
     */
    public function __construct(private string $ruleName, private array $conditionNames)
    {
        if (! empty($this->conditions)) {
            $this->isFulfilled = true;
        } else {
            $this->isFulfilled = false;
        }
    }

    public function getRuleName(): string
    {
        return $this->ruleName;
    }

    /**
     * @return string[]
     */
    public function getConditionNames(): array
    {
        return $this->conditionNames;
    }

    public function isFulfilled(): bool
    {
        return $this->isFulfilled;
    }
}