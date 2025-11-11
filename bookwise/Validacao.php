<?php


class Validacao {

    public $validacoes = [];

    public static function validar($regras, $dados){
        
        $validacao = new self();

        foreach($regras as $campo => $regrasDoCampo) {

            foreach($regrasDoCampo as $regra) {
                $valorCampo = $dados[$campo] ?? '';
                if ($regra == 'confirmed') {
                    $validacao->confirmed($campo, $valorCampo, $dados["{$campo}_confirmacao"] ?? '');
                } 
                elseif (str_contains($regra, ':')) {
                    $temp = explode(':', $regra);
                    $regra = $temp[0];
                    $regraArg = $temp[1];
                    $validacao->$regra($campo, $valorCampo, $regraArg);
                }                
                else {
                    $validacao->$regra($campo, $valorCampo);
                }
            }
            dd($campo, $regrasDoCampo);
        }

        return $validacao;
    }

    private function required($campo, $valor){
        if (strlen($valor) === 0){
            $this->validacoes[] = "O $campo é obrigatório";
        }
    }

    private function email($campo, $valor){
        if (!filter_var($campo, FILTER_VALIDATE_EMAIL)){
            $this->validacoes[] = "O $campo é inválido";
        }
    }

    private function confirmed($campo, $valor, $valor_confirmation){
        if ($valor != $valor_confirmation){
            $this->validacoes[] = "Os $valor e $valor_confirmation não conferem";
        }
    }

    private function min($campo, $valor, $min){
        if (strlen($valor) < $min){
            $this->validacoes[] = "O $campo deve ter no mínimo $min caracteres";
        }
    }

    private function max($campo, $valor, $max){
        if (strlen($valor) > $max){
            $this->validacoes[] = "O $campo deve ter no máximo $max caracteres";
        }
    }

    private function strong($campo, $valor){
        if (!strpbrk($valor, '!@#$%¨&*()_+-=[]{}|;:,.<>?')){
            $this->validacoes[] = "O $campo deve conter pelo menos um caractere especial";
        }
    }

    public function naoPassou(){
        $_SESSION['validacoes'] = $this -> validacoes;
        return sizeof($this->validacoes) > 0;
    }
}