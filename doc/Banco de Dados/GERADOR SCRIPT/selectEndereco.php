<?php
/*
INSERT INTO CLIENTE(CPFCLNT, NOMCLNT, SEXCLNT, NASCLNT,
    EMLCLNT, SENCLNT) VALUES(?,?,?,?,?,md5(?))
    
    INSERT INTO ENDERECO_CLIENTE(CLIENTECPFCLNT, CIDENDCLNT, ESTENDCLNT, CEPENDCLNT, RUAENDCLNT,
        NUMENDCLNT, BAIENDCLNT, CMPENDCLNT) VALUES(?,?,?,?,?,?,?,?)
        
        INSERT INTO TELEFONE_CLIENTE(CLIENTECPFCLNT, DDDTELCLNT, NUMTELCLNT) VALUES(?,?,?)*/
//"Davi","Arthur","Pedro","Gabriel","Bernardo","Lucas","Matheus","Rafael","Heitor","Enzo","Guilherme","Nicolas","Lorenzo","Gustavo"
//"Alice","Julia","Isabella","Manuela","Laura","Luiza","Valentina","Giovanna","Maria Eduarda","Helena","Beatriz","Maria Luiza","Lara","Mariana"
    
$cidadeArray = array("São Miguel do Oeste", "Chapecó", "Itapiranga", "Descanso", "Maravilha", "Belmonte", "Iporã do Oeste",
    "São Jose do Cedro", "Pinhalzinho", "Dionisio Cerqueira", "Tunápolis", "Guaruja do Sul");
$ruaArray = array("Das Flores", "Sao Jose", "Do Comércio", "Sete de Setembro", "Primeiro de Maio", "Quince de Novembro", "Marcilio Dias");
$bairroArray= array("Centro", "Cohab", "Pioneiro", "Industrial", "Dos Passáros");
   // $insert = ($cpf.", '".$nome." ".$sobrenome."','F','".$nascimento."','".$nome."@gmail.com','".md5($nome));
       
    for($i = 00; $i<100; $i++){
        $cpf="130573680".$i;
        $cidade = $cidadeArray[mt_rand(0,11)];
        $rua = $ruaArray[mt_rand(0,6)];
        $bairro = $bairroArray[mt_rand(0,4)];     
        $insert = "(".$cpf.", '".$cidade."','SC',8989".mt_rand(0,9)."000".",'".$rua."','".mt_rand(0,100)."','".$bairro."','Casa'),";
        echo $insert."<br>";
    }
    
?>