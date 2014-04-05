<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 27/03/14
 * Time: 20:38
 */

require_once 'CifraCesar.php';

class MainTest extends PHPUnit_Framework_TestCase {
    private $cifra;

    function setUp() {
        $this->cifra = new CifraCesar();
        $this->cifra->setaMensagem("teste");
    }

    function testRetornaMensagemOriginal() {
        $this->assertEquals( "teste", $this->cifra->retornaMensagemOriginal() );
    }

    function testRetornaLetraDaMensagemConformePosicao() {
        $this->assertEquals("s", $this->cifra->retornaLetraNa(2));
    }

    function testRotacionaCesarParaLetraPassada() {
        $this->assertEquals("v", $this->cifra->rotaciona($this->cifra->retornaLetraNa(2)));
    }

    function testRotacionaCesarParaLetraForaDoIntervalo1() {
        $this->assertEquals("c", $this->cifra->rotaciona("z"));
    }

    function testRotacionaCesarParaLetraForaDoIntervalo2() {
        $this->assertEquals("a", $this->cifra->rotaciona("x"));
    }

    function testFazCifragem() {
        $this->assertEquals("whvwh", $this->cifra->executa());
    }
}