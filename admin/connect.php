<?php
define("HOST", "localhost");     // The host you want to connect to.
define("USER", "root");    // The database username.
define("PASSWORD", "");    // The database password.
define("DATABASE", "pronto_comer");    // The database name.


class BaseDeDados
{
    private $Ligacao=false;
    private $Perguntas=array();
    private $ApontadorPerguntas=0;
    private $UltimaPergunta;


    // Definir a Ligação da Base de Dados
    function __construct() {
        $this->Ligacao=$this->Ligacao();
        if(!$this->Ligacao){
            for($i=0;$i<3||$this->Ligacao;$i++){
                $this->Ligacao=$this->Ligacao();
            }
            if(!$this->Ligacao){die('A BD não responde.');}
        }
    }


    // Ligação a Base de Dados
    private function Ligacao(){
        $mysqli = mysqli_connect(HOST, USER, PASSWORD, DATABASE) or die("Ligação MySQL não foi conseguida!");
        return $mysqli;
    }

    // Verificar a conexão a base de dados
    public function Connectado(){
        return $this->Ligacao;
    }

    // Fechar a conexão a base de dados
    function Fechar(){
        return $this->Ligacao->close();
    }


    function Pergunta($Pergunta){
        $this->CabecaPergunta($Pergunta);
        $this->UltimaPergunta=mysqli_query($this->Ligacao,$Pergunta);
        $this->PePergunta();
        $Erro=mysqli_error($this->Ligacao);
        if(!empty($Erro)) {
            trigger_error($Erro. '|| Pergunta: '.$Pergunta.' || ');

        }
    }

    private function CabecaPergunta($Pergunta){
        $this->Perguntas[$this->ApontadorPerguntas]['Pergunta']=$Pergunta;
        $this->Perguntas[$this->ApontadorPerguntas]['Duracao']=microtime(true);
    }

    private function PePergunta(){
        $this->Perguntas[$this->ApontadorPerguntas]['Duracao']=round ( (microtime(true)- $this->Perguntas[$this->ApontadorPerguntas]['Duracao'])*1000,2);
        $this->ApontadorPerguntas++;
    }

    function Debug(){
        return $this->Perguntas;
    }

    function LimpaString($Srt) {

        if(! is_string($Srt)){
            return '';
        }
        $teste= mysqli_real_escape_string($this->Ligacao,$Srt);
        return $teste;

    }

        function ResultadoSeguinte($Tipo=MYSQLI_ASSOC,$NaoEscapar=array()){
        // MYSQLI_BOTH, MYSQLI_ASSOC, MYSQLI_NUM

        $retorno= mysqli_fetch_array($this->UltimaPergunta,$Tipo);
        if($retorno){
            foreach ($retorno as $Key=>$Chave){
                /*if(!in_array($Key,$NaoEscapar)){
                    $Chave=Str($Chave);
                }*/
                $Return[$Key]=$Chave;
            }
            return $Return;
        }else{
            return $retorno;
        }

    }

    function NumeroResultados(){
        return mysqli_num_rows($this->UltimaPergunta);
    }

    function ResultadoParaMatriz($Tipo=MYSQLI_ASSOC,$NaoEscapar=array()){
        $Retorno=array();
        while ($Resultado=$this->ResultadoSeguinte($Tipo,$NaoEscapar)){
            $Retorno[]=$Resultado;
        }

        return $Retorno;
    }

    function UltimoId(){
        return mysqli_insert_id($this->Ligacao);
    }

    function ResultadosMofificados(){
        return mysqli_affected_rows($this->Ligacao);
    }


}