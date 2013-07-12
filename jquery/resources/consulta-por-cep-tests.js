

test( "CEP", function() {
  cep = buscaPorCep('82.900-270');  
  
  // atualmente apenas testando o retorno (um dia eu melhoro os testes em JS)
  
  ok( cep == true, "Passed!" );
});