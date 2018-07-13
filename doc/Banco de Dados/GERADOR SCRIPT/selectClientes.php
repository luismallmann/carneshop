<?php
/*
INSERT INTO CLIENTE(CPFCLNT, NOMCLNT, SEXCLNT, NASCLNT,
    EMLCLNT, SENCLNT) VALUES(?,?,?,?,?,md5(?))
    
    INSERT INTO ENDERECO_CLIENTE(CLIENTECPFCLNT, CIDENDCLNT, ESTENDCLNT, CEPENDCLNT, RUAENDCLNT,
        NUMENDCLNT, BAIENDCLNT, CMPENDCLNT) VALUES(?,?,?,?,?,?,?,?)
        
        INSERT INTO TELEFONE_CLIENTE(CLIENTECPFCLNT, DDDTELCLNT, NUMTELCLNT) VALUES(?,?,?)

'ABEL','ABELARDO','ABRAAO','ADAO','ADLER','ADOLFO','ADRIAN','ADRIANO','AGNELO','ALAN','ALBERTO','ALCINO','ALEJANDRO','ALESSANDRO',
'ALEX','ALEXANDRE','ALFONSO','ALFREDO','ALONSO','ALVARO','AMADEU','ANDERSON','ANDRE','ANGELO','ANSELMO','ANTONIO','APOLO','AQUILES',
'ARTUR','ATHOS','ATILA','AUGUSTO','ATOS','BACO','BALTAZAR','BRENO','BRUNO','CACO','CALVIN','CAMILO','CANDIDO','CAUE','CECILIO','CELIO',
'CELSO','CESAR','CHRISTIAN','CICERO','CLARK','CLAUDIO','CRISTIANO','DANIEL','DANILO','DARWIN','DENIS','DIOGO','DMITRY','DOUGLAS',
'EDGAR','EDUARDO','ELIAS','ELISEU','ELVIS','ENRIQUE','ERIC','ERICK','ESTEVAO','EUGENIO','EURIPEDES','EVANDRO','FABIANO','FABIO',
'FAUSTO','FELIPE','FELIX','FERDINANDO','FERNANDO','FLAVIO','FRANCISCO','FRANKLIN','FREDERICO','GABRIEL','GEORGE','GERALDO',
'GETULIO', 'GILBERTO','GLAUBER','GLAUCO','GREGORIO','GUILHERME','GUSTAVO','HAMILTON','HANS','HELIO','HENRI','HERCULES','HILTON',
'HIPOLITO', 'HIRAM','HONORATO','HUBERTO','HUGO','IAGO','IAN','IGOR','INACIO','ISAAC','ISAIAS','ISAQUE','ISMAEL','ITALO','IVAN',
'JACO','JEAN', 'JEREMIAS','JOAQUIM','JONAS','JONATHAN','JORGE','JOSE','JOSIAS','JOSUE','JULIANO','JULIO','JUNIO','JUSCELINO',
'JUSTUS','KARL','KEN', 'LAERCIO','LAERTE','LANCELOT','LAUREN','LAURENCE','LAURO','LAZARO','LEANDRO','LEONARDO','LEOPOLDO','LEVI',
'LINCOLN','LINEU','LIVIO', 'LOUIS','LUCAS','LUIS','LUIZ','MANFREDO','MANOEL','MANUEL','MARCELINO','MARCELO','MARCIO','MARCOS',
'MATEUS','MESSIAS','MICAEL', 'MICHAEL','MIGUEL','MILTON','MISAEL','MOACIR','MOISES','MURIEL','MURILO','NALDO','NARCISO','NATAN',
'NATANAEL','NAZARE','NEI', 'NEIMAR','NELSON','NESTOR','NICOLAS','NICOLAU','NORBERTO','NUNO','ODELIO','ODILON','ODISSEU','OLAVO',
'OMAR','ONOFRE','ORLANDO', 'OSCAR','OSVALDO','OTAVIO','OTTO','PABLO','PATRICIO','PATRICK','PAULO','PEDRO','RAFAEL','RENATO',
'RICARDO','ROBERTO','ROBERVAL', 'RODOLFO','ROGERIO','ROMEU','ROMULO','RONALDO','RUBEM','SALOMAO','SAMUEL','SANDRO','SANTIAGO',
'SEBASTIAN','SEBASTIAO','SERGIO', 'SEVERINO','SIDNEY','SILAS','SILVESTRE','SIMAO','TALES','TANCREDO','TARCISIO','TASSO',
'TEODORO','THIERRY','THOMAS','THOR','TIAGO', 'TIMOTEO','TOBIAS','TULIO','UBIRAJARA','UGO','VAGNER','VALDO','VALENTINO',
'VALERIO','VALTER','VENANCIO','VINICIUS','VLADIMIR', 'WAGNER','WALDIR','WESLEY','WILLIAM','WILSON','WILTON','XAVIER',
'XIMENES','YAN','YURE'  

230
'ABIGAIL','ADALFREDA','ADALGISA','ADALIA','ADALINA','ADALTA','ADELAIDE','ADRIANA','ADRIENNE','AFRODITE','AGATA','AHSLEY', 'AILEEN',
'AKEMI','ALANA','ALBERTA','ALCINA','ALCIONE','ALEXA','ALEXANDRA','ALEXANDRINA','ALICE','ALICIA','ALINE','ALMA', 'AMALIA','AMANDA',
'AMELIA','ANA','ANABELA','ANASTACIA','ANDREA','ANDRESA','ANGELA','ANGELICA','ANGELINA','ANITA','ANTONIA', 'APARECIDA','ARIADNE',
'AUGUSTA','BARBARA','BEATRICE','BEATRIZ','BERENICE','BERNADETE','BETANIA','BETTY','BIANCA','BRENDA', 'BRIDGET','BRUNA','CAMILA',
'CAMILLE','CARMEM','CAROLINA','CASSANDRA','CASSIA','CATARINA','CECILIA','CELIA','CELINA', 'CHARLOTE','CHIARA','CIBELE','CINTIA',
'CLAIRE','CLARA','CLARICE','CLARISSA','CLAUDIA','CLOE','CRISTAL','DAFNE','DAISY', 'DALILA','DANIELA','DANIELLE','DEBORA','DENISE',
'DESIREE','DIANA','DOLORES','DULCE','EDITH','ELEN','ELENA','ELIANA', 'ELISA','ELISABETE','ELISANGELA','ELVIRA','ESMERALDA','ESTER',
'EVA','FABIANA','FATIMA','FERNANDA','FLAVIA','FLORA', 'FLORENCE','FREJA','FRIDA','GABRIELA','GAIA','GIA','GIANE','GISELE','GLAUCIA',
'GLORIA','GRAZIELA','HANNAH','HEIDI', 'HELENA','HELOISA','HILDA','IARA','IASMIN','IRACEMA','IRIS','ISABEL','ISABELA','ISADORA',
'ISAURA','IVY','JADE','JAMILA', 'JANE','JASMIM','JESSICA','JOANA','JULIA','JULIANA','JULIETA','JUNE','KARIN','KARINA','KARLA',
'KELLY','LAILA','LAIS', 'LARA','LARISSA','LEILA','LETICIA','LIDIA','LILIAN','LINDA','LIVIA','LOLITA','LORENA','LUCIA','LUCIANA',
'LUDMILA','LUISA', 'LUNA','MAGNOLIA','MAIRA','MAISA','MAITE','MARA','MARCELA','MARCIA','MARIA','MARILIA','MARINA','MARISA','MAYA',
'MELISSA', 'MICHELE','MILENA','MIRANDA','MONALISA','MONICA','MORGANA','NAIARA','NARA','NATALIA','NATASHA','NICOLE','OLGA','PALOMA',
'PAMELA','PANDORA','PAOLA','PATRICIA','PAULA','PERLA','POLIANA','PRISCILA','RAFAELA','RAQUEL','ROBERTA','ROSA','ROSANA', 
'RUBI','RUTE','SABRINA','SAFIRA','SAMANTA','SAMARA','SANDRA','SANDY','SARA','SELENA','SELMA','SIANE','SILVIA','SONIA','SOPHIA',
'SORAIA','STEPHANIE','SUSANA','TABATA','TAIS','TALITA','TARSILA','TELMA','TEREZA','TICIANA','UIARA','URSULA','VALENTINA','VALERIA',
'VALQUIRIA','VANIA','VELMA','VERENA','VERONICA','VICTORIA','VILMA','VIRGINIA','VIVIANA','VIVIANE','YASMIN','YEDA','YNES','YOLANDA', 
*/

$nomeArray=array('ABEL','ABELARDO','ABRAAO','ADAO','ADLER','ADOLFO','ADRIAN','ADRIANO','AGNELO','ALAN','ALBERTO','ALCINO','ALEJANDRO','ALESSANDRO',
'ALEX','ALEXANDRE','ALFONSO','ALFREDO','ALONSO','ALVARO','AMADEU','ANDERSON','ANDRE','ANGELO','ANSELMO','ANTONIO','APOLO','AQUILES',
'ARTUR','ATHOS','ATILA','AUGUSTO','ATOS','BACO','BALTAZAR','BRENO','BRUNO','CACO','CALVIN','CAMILO','CANDIDO','CAUE','CECILIO','CELIO',
'CELSO','CESAR','CHRISTIAN','CICERO','CLARK','CLAUDIO','CRISTIANO','DANIEL','DANILO','DARWIN','DENIS','DIOGO','DMITRY','DOUGLAS',
'EDGAR','EDUARDO','ELIAS','ELISEU','ELVIS','ENRIQUE','ERIC','ERICK','ESTEVAO','EUGENIO','EURIPEDES','EVANDRO','FABIANO','FABIO',
'FAUSTO','FELIPE','FELIX','FERDINANDO','FERNANDO','FLAVIO','FRANCISCO','FRANKLIN','FREDERICO','GABRIEL','GEORGE','GERALDO',
'GETULIO', 'GILBERTO','GLAUBER','GLAUCO','GREGORIO','GUILHERME','GUSTAVO','HAMILTON','HANS','HELIO','HENRI','HERCULES','HILTON',
'HIPOLITO', 'HIRAM','HONORATO','HUBERTO','HUGO','IAGO','IAN','IGOR','INACIO','ISAAC','ISAIAS','ISAQUE','ISMAEL','ITALO','IVAN',
'JACO','JEAN', 'JEREMIAS','JOAQUIM','JONAS','JONATHAN','JORGE','JOSE','JOSIAS','JOSUE','JULIANO','JULIO','JUNIO','JUSCELINO',
'JUSTUS','KARL','KEN', 'LAERCIO','LAERTE','LANCELOT','LAUREN','LAURENCE','LAURO','LAZARO','LEANDRO','LEONARDO','LEOPOLDO','LEVI',
'LINCOLN','LINEU','LIVIO', 'LOUIS','LUCAS','LUIS','LUIZ','MANFREDO','MANOEL','MANUEL','MARCELINO','MARCELO','MARCIO','MARCOS',
'MATEUS','MESSIAS','MICAEL', 'MICHAEL','MIGUEL','MILTON','MISAEL','MOACIR','MOISES','MURIEL','MURILO','NALDO','NARCISO','NATAN',
'NATANAEL','NAZARE','NEI', 'NEIMAR','NELSON','NESTOR','NICOLAS','NICOLAU','NORBERTO','NUNO','ODELIO','ODILON','ODISSEU','OLAVO',
'OMAR','ONOFRE','ORLANDO', 'OSCAR','OSVALDO','OTAVIO','OTTO','PABLO','PATRICIO','PATRICK','PAULO','PEDRO','RAFAEL','RENATO',
'RICARDO','ROBERTO','ROBERVAL', 'RODOLFO','ROGERIO','ROMEU','ROMULO','RONALDO','RUBEM','SALOMAO','SAMUEL','SANDRO','SANTIAGO',
'SEBASTIAN','SEBASTIAO','SERGIO', 'SEVERINO','SIDNEY','SILAS','SILVESTRE','SIMAO','TALES','TANCREDO','TARCISIO','TASSO',
'TEODORO','THIERRY','THOMAS','THOR','TIAGO', 'TIMOTEO','TOBIAS','TULIO','UBIRAJARA','UGO','VAGNER','VALDO','VALENTINO',
'VALERIO','VALTER','VENANCIO','VINICIUS','VLADIMIR', 'WAGNER','WALDIR','WESLEY','WILLIAM','WILSON','WILTON','XAVIER',
'XIMENES','YAN','YURE');
$sobrenomeArray=array("ALMEIDA","ANDRADE","BARBOSA","BARROS","BATISTA","BORGES","CAMPOS","CARDOSO","CARVALHO","CASTRO","COSTA",
    "ROCHA","SOUZA","SILVA","PINHEIRO","CORTEZ");
$nascimentoArray=0;
$nome = 0;
$sobrenome = 0;
$nascimento = 0;
        
   // $insert = ($cpf.", '".$nome." ".$sobrenome."','F','".$nascimento."','".$nome."@gmail.com','".md5($nome));
       
    for($i = 0; $i<51; $i++){
        $nome = $nomeArray[mt_rand(0,230)];
        $sobrenome = $sobrenomeArray[mt_rand(0,5)];
        $nascimento = mt_rand(1,30).'/'.mt_rand(1,12).'/'.mt_rand(1950,2017);
        $cpf="130573680".$i;
        $insert = "(".$cpf.", '".$nome." ".$sobrenome."','M','".$nascimento."','".strtolower($nome).$i."@gmail.com','".md5(strtolower($nome))."'),";
        echo $insert."<br>";
    }
    
?>