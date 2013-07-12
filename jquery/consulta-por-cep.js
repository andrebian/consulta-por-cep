  
   function buscaPorCep( cep ) {
       
       if (cep.length >= 9) {
            cep = cep.replace(".", "");
            cep = cep.replace("-", "");
            
            correios = "http://cep.correiocontrol.com.br/" + cep + ".json";
            
            jQuery.get(correios, function(endereco) {
                
                jQuery("#seu_id_da_cidade").val(endereco.localidade);
                jQuery("#seu_id_do_bairro").val(endereco.bairro);
                jQuery("#seu_id_do_logradouro").val(endereco.logradouro);
                jQuery("#seu_id_do_uf").val(endereco.uf);
                jQuery("#seu_id_do_cep").val(endereco.cep);
                
            });
        }
        return true;
   }
   