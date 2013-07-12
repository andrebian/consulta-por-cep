<?php
require_once 'PHPUnit/Autoload.php';
require_once './ConsultaPorCep.php';

class ConsultaPorCepTest extends PHPUnit_Framework_TestCase {
    
    protected $ConsultaPorCep;

    public function setUp() {
        $this->ConsultaPorCep = new ConsultaPorCep();
    }
    
    
    public function tearDown() {
        unset($this->ConsultaPorCep);
    }
    
    
    public function testInstanceOf() {
        $this->assertInstanceOf('ConsultaPorCep', $this->ConsultaPorCep);
    }
    
    
    public function testConsultaComEnderecoDisponivel() {
        $endereco = $this->ConsultaPorCep->consulta('82.900-270');
        
        $this->assertEquals('Cajuru', $endereco['bairro'], 'Não retornou bairro');
        $this->assertEquals('Rua Miguel Caluf', $endereco['logradouro'], 'Não retornou logradouro');
        $this->assertEquals('Curitiba', $endereco['localidade'], 'Não retornou cidade');
        $this->assertEquals('PR', $endereco['uf'], 'Não retornou Estado');
        $this->assertEquals('82900270', $endereco['cep'], 'Não retornou CEP');
    }
    
    
    public function testConsultaComEnderecoIndisponivelUtilParaQuandoEhConsultaEmCidadesPequenas() {
        $endereco = $this->ConsultaPorCep->consulta('84.600-000');
        
        $this->assertEquals('', $endereco['bairro']);
        $this->assertEquals(' ', $endereco['logradouro']);
        $this->assertEquals('União da Vitória', $endereco['localidade'], 'Não retornou cidade');
        $this->assertEquals('PR', $endereco['uf'], 'Não retornou Estado');
        $this->assertEquals('84600000', $endereco['cep'], 'Não retornou CEP');
        
    }
}

?>
