CREATE TABLE cliente (
  cpfclnt numeric(11, 0) NOT NULL, 
  emlclnt varchar(40) NOT NULL UNIQUE, 
  nomclnt varchar(40) NOT NULL, 
  sexclnt char(1) NOT NULL, 
  nasclnt date NOT NULL, 
  senclnt varchar(32) NOT NULL, 
  PRIMARY KEY (cpfclnt));
COMMENT ON TABLE cliente IS 'Tabela que contém os dados pessoais de cada cliente.';
COMMENT ON COLUMN cliente.cpfclnt IS 'CPF do Cliente';
COMMENT ON COLUMN cliente.emlclnt IS 'Email do Cliente';
COMMENT ON COLUMN cliente.nomclnt IS 'Nome do Cliente';
COMMENT ON COLUMN cliente.sexclnt IS 'sexo do cliente';
COMMENT ON COLUMN cliente.nasclnt IS 'Data de Nascimento do Cliente';
COMMENT ON COLUMN cliente.senclnt IS 'senha de acesso do cliente';
CREATE TABLE endereco_cliente (
  codendclnt     SERIAL NOT NULL, 
  cidendclnt     varchar(30) NOT NULL, 
  estendclnt     varchar(2) NOT NULL, 
  cependclnt     numeric(8, 0) NOT NULL, 
  ruaendclnt     varchar(40) NOT NULL, 
  numendclnt     varchar(5) NOT NULL, 
  baiendclnt     varchar(20) NOT NULL, 
  cmpendclnt     varchar(20), 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codendclnt));
COMMENT ON TABLE endereco_cliente IS 'Enderecos do cliente. Pode existir mais de um para o mesmo cliente';
COMMENT ON COLUMN endereco_cliente.codendclnt IS 'codigo do endereco do cliente. é gerado automaticamente de forma sequencial.';
COMMENT ON COLUMN endereco_cliente.cidendclnt IS 'cidade do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.estendclnt IS 'estado do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.cependclnt IS 'CEP do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.ruaendclnt IS 'rua do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.numendclnt IS 'numero do endereco';
COMMENT ON COLUMN endereco_cliente.baiendclnt IS 'bairro do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.cmpendclnt IS 'complemento do endereco cadastrado. pode ser opcional';
COMMENT ON COLUMN endereco_cliente.clientecpfclnt IS 'chave estrangeira que identica a qual cliente está vinculado o endereco';
CREATE TABLE funcionario (
  codfun SERIAL NOT NULL 			, 
  nomfun varchar(40) NOT NULL 	, 
  logfun varchar(20) NOT NULL UNIQUE 	, 
  senfun varchar(32) NOT NULL, 
  PRIMARY KEY (codfun));
COMMENT ON TABLE funcionario IS 'detalhamento do funcionario/administrador do sistema';
COMMENT ON COLUMN funcionario.codfun IS 'código do funcionario, gerado automaticamente de forma sequencial';
COMMENT ON COLUMN funcionario.nomfun IS 'nome do funcionario';
COMMENT ON COLUMN funcionario.logfun IS 'login do funcionario';
COMMENT ON COLUMN funcionario.senfun IS 'senha do funcionario';
CREATE TABLE pedido (
  codped         SERIAL NOT NULL, 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codped));
COMMENT ON TABLE pedido IS 'tabela que contem o codigo de identificação do pedido e a qual cliente ele está vinculado. Lembrando que nem todo pedido é uma venda.';
COMMENT ON COLUMN pedido.codped IS 'codigo do pedido';
COMMENT ON COLUMN pedido.clientecpfclnt IS 'chave estrangeira a qual vincula o cpf ao pedido';
CREATE TABLE pedido_produto (
  itempedidoprod SERIAL NOT NULL, 
  produtocodprod int4 NOT NULL, 
  pedidocodped   int4 NOT NULL, 
  qntped         int4 NOT NULL, 
  PRIMARY KEY (itempedidoprod));
COMMENT ON TABLE pedido_produto IS 'tabela que relaciona os produtos selecionados ao pedido. pode existir mais de um produto no mesmo pedido';
COMMENT ON COLUMN pedido_produto.itempedidoprod IS 'item do produto no pedido (ex: 1,2,3...)';
COMMENT ON COLUMN pedido_produto.produtocodprod IS 'chave estrangeira que identifica o produto';
COMMENT ON COLUMN pedido_produto.pedidocodped IS 'chave estrangeira que identifca o pedido';
COMMENT ON COLUMN pedido_produto.qntped IS 'quantidade de itens pedidos do mesmo produto';
CREATE TABLE produto (
  codprod SERIAL NOT NULL 	, 
  desprod varchar(140), 
  nomprod varchar(40) NOT NULL 		, 
  valprod numeric(10, 2) NOT NULL, 
  estprod int4 NOT NULL, 
  imgprod varchar(80), 
  catprod varchar(50),
  logfun varchar(140), 
  PRIMARY KEY (codprod));
COMMENT ON TABLE produto IS 'informacoes do produto';
COMMENT ON COLUMN produto.codprod IS 'codigo do produto gerado de forma sequencial';
COMMENT ON COLUMN produto.desprod IS 'descricao do produto';
COMMENT ON COLUMN produto.nomprod IS 'nome do produto';
COMMENT ON COLUMN produto.valprod IS 'valor do produto(R$)';
COMMENT ON COLUMN produto.estprod IS 'quantidade em estoque do produto';
COMMENT ON COLUMN produto.imgprod IS 'nome de imagem cadastrada na pasta imgproduto';
COMMENT ON COLUMN produto.catprod IS 'categoria ao qual o produto se enquadra. ex: bovina, frango, suino...';
COMMENT ON COLUMN produto.logfun IS 'login do funcionario';
CREATE TABLE telefone_cliente (
  codtelclnt     SERIAL NOT NULL, 
  dddtelclnt     numeric(2, 0) NOT NULL, 
  numtelclnt     numeric(9, 0) NOT NULL, 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codtelclnt));
COMMENT ON TABLE telefone_cliente IS 'telefones do cliente. pode exitir mais de um registro';
COMMENT ON COLUMN telefone_cliente.codtelclnt IS 'codigo do telefone do cliente. gerado automaticamente de forma sequencial';
COMMENT ON COLUMN telefone_cliente.dddtelclnt IS 'DDD do telefone do cliente.';
COMMENT ON COLUMN telefone_cliente.numtelclnt IS 'numero do telefone cadastrado para o cliente';
COMMENT ON COLUMN telefone_cliente.clientecpfclnt IS 'chave estrangeira que identifica a qual cliente está vinculado o telefone';
CREATE TABLE venda (
  codvenda     SERIAL NOT NULL, 
  pedidocodped int4 NOT NULL, 
  valvenda     numeric(6, 2) NOT NULL 		, 
  stsvenda     varchar(140) NOT NULL 	, 
  datvenda     date NOT NULL, 
  horvenda     time NOT NULL 	,
  logfun varchar(140), 
  PRIMARY KEY (codvenda));
COMMENT ON TABLE venda IS 'detalhamento da venda (pedido efetuado)';
COMMENT ON COLUMN venda.codvenda IS 'codigo da venda';
COMMENT ON COLUMN venda.pedidocodped IS 'codigo do pedido ao qual a venda está relacionada';
COMMENT ON COLUMN venda.valvenda IS 'valor total da venda';
COMMENT ON COLUMN venda.stsvenda IS 'status da venda';
COMMENT ON COLUMN venda.datvenda IS 'data venda';
COMMENT ON COLUMN venda.horvenda IS 'horario da venda';
COMMENT ON COLUMN produto.logfun IS 'login do funcionario';
ALTER TABLE pedido_produto ADD CONSTRAINT FKpedido_pro231850 FOREIGN KEY (produtocodprod) REFERENCES produto (codprod);
ALTER TABLE pedido_produto ADD CONSTRAINT FKpedido_pro330558 FOREIGN KEY (pedidocodped) REFERENCES pedido (codped);
ALTER TABLE venda ADD CONSTRAINT FKvenda21377 FOREIGN KEY (pedidocodped) REFERENCES pedido (codped);
ALTER TABLE pedido ADD CONSTRAINT FKpedido77747 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);
ALTER TABLE telefone_cliente ADD CONSTRAINT FKtelefone_c632501 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);
ALTER TABLE endereco_cliente ADD CONSTRAINT FKendereco_c624907 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);

CREATE TABLE produto_log (
  codprod int4 NOT NULL	, 
  nomprod varchar(40) NOT NULL 		, 
  valprodalt numeric(10, 2) NOT NULL,  
  valprod numeric(10, 2) NOT NULL, 
  logfun varchar (140),
dataalt date not null);
COMMENT ON TABLE produto_log IS 'historico alteracao do produto';

CREATE TABLE venda_log (
  codvenda int4 NOT NULL	, 
  stsant varchar (140),  
  stsnov varchar (140), 
  logfun varchar (140),
  dataalt date not null);
COMMENT ON TABLE venda_log IS 'historico alteracao do status da venda';
