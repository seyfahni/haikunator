<?php
/*
Copyright (c) 2015, Atrox https://github.com/Atrox/haikunatorphp
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:

* Redistributions of source code must retain the above copyright notice, this
  list of conditions and the following disclaimer.

* Redistributions in binary form must reproduce the above copyright notice,
  this list of conditions and the following disclaimer in the documentation
  and/or other materials provided with the distribution.

* Neither the name of Atrox/haikunatorphp nor the names of its
  contributors may be used to endorse or promote products derived from
  this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS"
AND ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE
IMPLIED WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL THE COPYRIGHT HOLDER OR CONTRIBUTORS BE LIABLE
FOR ANY DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL
DAMAGES (INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR
SERVICES; LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER
CAUSED AND ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY,
OR TORT (INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE
OF THIS SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.
 */
declare(strict_types=1);

namespace seyfahni\Haikunator;

use PHPUnit\Framework\TestCase;

class AtroxHaikunatorTest extends TestCase
{
    /**
     * @param array $params
     * @param       $regex
     *
     * @dataProvider paramsDataProvider
     */
    public function testHaikunate(array $params, $regex)
    {
        $haikunator = Haikunators::atroxHaikunator($params);
        $haikunate = $haikunator->haikunate();
        $this->assertMatchesRegularExpression($regex, $haikunate);
    }

    /**
     * @return array
     */
    public function paramsDataProvider()
    {
        return [
            "default params"       => [[], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))(-)(\\d{4})$/i"],
            "token with hex"       => [["tokenHex" => true], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))(-)(.{4})$/i"],
            "tokenlength"          => [["tokenLength" => 9], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))(-)(\\d{9})$/i"],
            "tokenlength with hex" => [["tokenLength" => 9, "tokenHex" => true], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))(-)(.{9})$/i"],
            "delimiter"            => [["delimiter" => "."], "/((?:[a-z][a-z]+))(\\.)((?:[a-z][a-z]+))(\\.)(\\d+)$/i"],
            "drop delimiter"       => [["tokenLength" => 0], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))$/i"],
            "space delimiter"      => [["delimiter" => " ", "tokenLength" => 0], "/((?:[a-z][a-z]+))( )((?:[a-z][a-z]+))$/i"],
            "one word"             => [["delimiter" => "", "tokenLength" => 0], "/((?:[a-z][a-z]+))$/i"],
            "custom tokenchars"    => [["tokenChars" => "A"], "/((?:[a-z][a-z]+))(-)((?:[a-z][a-z]+))(-)(AAAA)$/i"],
        ];
    }

    public function testCustomNounsAndAdjectives()
    {
        $haikunator = Haikunators::atroxHaikunator(adjectives: ['red'], nouns: ['reindeer']);
        $haikunate = $haikunator->haikunate();
        $this->assertMatchesRegularExpression("/(red)(-)(reindeer)(-)(\\d{4})$/i", $haikunate);
    }

    public function testNounsMustNotContainDuplicates()
    {
        $nouns = Haikunators::ATROX_NOUNS;
        $this->assertEquals(count($nouns), count(array_flip($nouns)));
    }

    public function testAdjectivesMustNotContainDuplicates()
    {
        $adjectives = Haikunators::ATROX_ADJECTIVES;
        $this->assertEquals(count($adjectives), count(array_flip($adjectives)));
    }

    public function testEverythingInOne()
    {
        $haikunator = Haikunators::atroxHaikunator(params: [
            "delimiter"   => ".",
            "tokenLength" => 8,
            "tokenChars"  => "l",
        ], adjectives: ['green'], nouns: ['reindeer']);
        $haikunate = $haikunator->haikunate();

        $this->assertMatchesRegularExpression("/(green)(\\.)(reindeer)(\\.)(llllllll)$/i", $haikunate);
    }

    public function testWontReturnSameForSubsequentCalls()
    {
        mt_srand(56324);

        $haikunator = Haikunators::atroxHaikunator();
        $haikunate = $haikunator->haikunate();
        $haikunate2 = $haikunator->haikunate();

        $this->assertNotEquals($haikunate, $haikunate2);
    }
}
