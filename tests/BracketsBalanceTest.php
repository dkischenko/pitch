<?php namespace Tests;

use App\Http\BracketsBalance;

class BracketsBalanceTest extends \Codeception\Test\Unit
{
    /**
     * @var BracketsBalance
     */
    private $brackets;

    protected function _before()
    {
        $this->brackets = new BracketsBalance();
    }

    /** @test  */
    public function testEmptyBrackets()
    {
        $this->assertEmpty($this->brackets->bracketsBalance(''));
    }

    /** @test */
    public function testBracketsBalanceIsTrue()
    {
        $this->assertTrue($this->brackets->bracketsBalance('{}'));
        $this->assertTrue($this->brackets->bracketsBalance('{()}'));
        $this->assertTrue($this->brackets->bracketsBalance('{([])}'));
        $this->assertTrue($this->brackets->bracketsBalance('[{([])}]'));
        $this->assertTrue($this->brackets->bracketsBalance('[[[{{[{([])}]}}]]]'));
    }

    /** @test */
    public function testBracketsBalanceIsFalse()
    {
        $this->assertFalse($this->brackets->bracketsBalance('asdad'));
        $this->assertFalse($this->brackets->bracketsBalance('31312'));
        $this->assertFalse($this->brackets->bracketsBalance('{(}'));
        $this->assertFalse($this->brackets->bracketsBalance('{(]}'));
        $this->assertFalse($this->brackets->bracketsBalance('{([)}'));
        $this->assertFalse($this->brackets->bracketsBalance('{([a])}'));
        $this->assertFalse($this->brackets->bracketsBalance('{1(2[a]3)}'));
    }
}
