<?php
/**
 * Created by PhpStorm.
 * User: Guilherme
 * Date: 27/03/14
 * Time: 20:38
 */

class CifraCesar {
    private $mensagemOriginal;
    private $mensagemCifrada;
    const LETRA_A = 97;
    const LETRA_Z = 122;
    const LETRA_W = 119;
    const LETRAS_ALFABETO = 26;
    const DESLOCAMENTO = 3;

    function setaMensagem($mensagem) {
        $this->mensagemOriginal = strtolower($mensagem);
    }

    function retornaMensagemOriginal() {
        return $this->mensagemOriginal;
    }

    function retornaMensagemCifrada() {
        return $this->mensagemCifrada;
    }

    function retornaLetraNa($posicao) {
        return substr($this->retornaMensagemOriginal(), $posicao, 1);
    }

    function executa() {
        for ($posicao = 0; $posicao < strlen($this->retornaMensagemOriginal());$posicao++) {
            $letra = $this->retornaLetraNa($posicao);
            $this->mensagemCifrada .= $this->rotaciona($letra);
        }

        return $this->retornaMensagemCifrada();
    }

    function rotaciona($letra) {
        $posicao = ord($letra);
        if ($this->ehLetraDoAlfabeto($posicao))
            $posicao = $this->retornaNovaLetraDa($posicao);

        return chr($posicao);
    }

    function retornaNovaLetraDa($posicao) {
        $novaPosicao = ($posicao <= CifraCesar::LETRA_W)? $posicao += CifraCesar::DESLOCAMENTO :
                    $posicao = ($posicao - CifraCesar::LETRAS_ALFABETO) + CifraCesar::DESLOCAMENTO;
        return $novaPosicao;
    }

    public function ehLetraDoAlfabeto($posicao) {
        return $posicao >= CifraCesar::LETRA_A && $posicao <= CifraCesar::LETRA_Z;
    }
} 