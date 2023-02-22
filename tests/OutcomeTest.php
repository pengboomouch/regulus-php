<?php

declare(strict_types=1);

use PHPUnit\Framework\MockObject\Exception;
use PHPUnit\Framework\TestCase;
use Regulus\Exception\OutcomeException;
use Regulus\Outcome;
use Regulus\Rule;

class OutcomeTest extends TestCase
{

    /**
     * @throws OutcomeException
     * @throws Exception
     */
    public function testNoTwoRulesOfSameClass()
    {
        $rule = $this->createStub(Rule::class);

        $outcome = new Outcome();
        $outcome->addRule($rule);

        $this->expectException(OutcomeException::class);
        $outcome->addRule($rule);
    }

    public function testFindRule()
    {
        $rule = $this->createStub(Rule::class);

        $outcome = $this->createStub(Outcome::class);
        $outcome->method('findRule')->willReturn($rule);

        $this->assertEquals($outcome->findRule($rule::class), $rule);
    }
}