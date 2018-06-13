<?php

use PHPUnit\Framework\TestCase;

class Md5HasherTest extends TestCase
{
    protected $hasher;

    public function setUp()
    {
        $this->hasher = new \CodeCoffee\Hasher\Md5Hasher();
    }

    public function testMake()
    {
        $makeHashValue = $this->hasher->make('password');
        $hashValue = md5('password');

        $this->assertEquals($makeHashValue, $hashValue);
    }

    public function testMakeWithSalt()
    {
        $makeHashValue = $this->hasher->make('password', ['salt' => 'CodeCoffee']);
        $hashValue = md5('passwordCodeCoffee');

        $this->assertEquals($makeHashValue, $hashValue);
    }

    public function testCheck()
    {
        $hashValue = hash('md5', 'password');
        $checkResult = $this->hasher->check('password', $hashValue);

        $this->assertTrue($checkResult);
    }

    public function testCheckWithSalt()
    {
        $hashValue = hash('md5', 'password' . 'CodeCoffee');
        $checkResult = $this->hasher->check('password', $hashValue, ['salt' => 'CodeCoffee']);

        $this->assertTrue($checkResult);
    }
}