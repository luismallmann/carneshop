CREATE SEQUENCE seq_endereco_cliente;
CREATE SEQUENCE seq_pedido;
CREATE SEQUENCE seq_produto;
CREATE SEQUENCE seq_telefone_cliente;
CREATE SEQUENCE seq_venda;
CREATE TABLE cliente (
  cpfclnt numeric(11, 0) NOT NULL, 
  nomclnt varchar(40) NOT NULL, 
  nasclnt date NOT NULL, 
  emlclnt varchar(40) NOT NULL UNIQUE, 
  senclnt varchar(32) NOT NULL, 
  PRIMARY KEY (cpfclnt));
COMMENT ON TABLE cliente IS 'Tabela que cont�m os dados pessoais de cada cliente.';
COMMENT ON COLUMN cliente.cpfclnt IS 'CPF do Cliente';
COMMENT ON COLUMN cliente.nomclnt IS 'Nome do Cliente';
COMMENT ON COLUMN cliente.nasclnt IS 'Data de Nascimento do Cliente';
COMMENT ON COLUMN cliente.emlclnt IS 'Email do Cliete';
CREATE TABLE endereco_cliente (
  codendclnt     int4 NOT NULL, 
  cidendclnt     varchar(30) NOT NULL, 
  estendclnt     varchar(2) NOT NULL, 
  cependclnt     numeric(8, 0) NOT NULL, 
  ruaendclnt     varchar(40) NOT NULL, 
  numendclnt     varchar(5) NOT NULL, 
  baiendclnt     varchar(20) NOT NULL, 
  cmpendclnt     varchar(20), 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codendclnt));
COMMENT ON TABLE endereco_cliente IS 'Enderecos do cliente. Pode haver mais de um';
COMMENT ON COLUMN endereco_cliente.codendclnt IS 'codigo do endereco do cliente. � gerado automaticamente de forma sequencial.';
COMMENT ON COLUMN endereco_cliente.cidendclnt IS 'cidade do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.estendclnt IS 'estado do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.cependclnt IS 'CEP do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.ruaendclnt IS 'rua do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.numendclnt IS 'numero do endereco';
COMMENT ON COLUMN endereco_cliente.baiendclnt IS 'bairro do endereco cadastrado';
COMMENT ON COLUMN endereco_cliente.cmpendclnt IS 'complemento do endereco cadastrado. pode ser opcional';
CREATE TABLE funcionario (
  codfun SERIAL NOT NULL 			, 
  nomfun varchar(40) NOT NULL 	, 
  logfun varchar(20) NOT NULL UNIQUE 	, 
  senfun varchar(32) NOT NULL, 
  PRIMARY KEY (codfun));
COMMENT ON TABLE funcionario IS 'detalhamento do funcionario/administrador do sistema';
COMMENT ON COLUMN funcionario.codfun IS 'c�digo do funcionario';
COMMENT ON COLUMN funcionario.nomfun IS 'nome do funcionario';
COMMENT ON COLUMN funcionario.logfun IS 'login do funcionario';
COMMENT ON COLUMN funcionario.senfun IS 'senha do funcionario';
CREATE TABLE pedido (
  codped         int4 NOT NULL, 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codped));
COMMENT ON TABLE pedido IS 'gerenciamento dos produtos comprados';
COMMENT ON COLUMN pedido.codped IS 'codigo do pedido';
CREATE TABLE pedido_produto (
  produtocodprod int4 NOT NULL, 
  pedidocodped   int4 NOT NULL, 
  qntped         int4 NOT NULL, 
  PRIMARY KEY (produtocodprod, 
  pedidocodped));
COMMENT ON COLUMN pedido_produto.qntped IS 'quantidade de itens pedidos';
CREATE TABLE produto (
  codprod int4 NOT NULL 	, 
  desprod varchar(140), 
  nomprod varchar(40) NOT NULL 		, 
  valprod numeric(10, 2) NOT NULL, 
  estprod int4 NOT NULL, 
  imgprod varchar(80), 
  PRIMARY KEY (codprod));
COMMENT ON TABLE produto IS 'informacoes do produto';
COMMENT ON COLUMN produto.codprod IS 'codigo do produto';
COMMENT ON COLUMN produto.desprod IS 'descricao do produto';
COMMENT ON COLUMN produto.nomprod IS 'nome do produto';
COMMENT ON COLUMN produto.valprod IS 'valor do produto(RS)      ';
COMMENT ON COLUMN produto.estprod IS 'quantidade em estoque do produto';
CREATE TABLE telefone_cliente (
  codtelclnt     int4 NOT NULL, 
  dddtelclnt     numeric(2, 0) NOT NULL, 
  numtelclnt     numeric(9, 0) NOT NULL, 
  clientecpfclnt numeric(11, 0) NOT NULL, 
  PRIMARY KEY (codtelclnt));
COMMENT ON COLUMN telefone_cliente.codtelclnt IS 'codigo do telefone do cliente. gerado automaticamente de forma sequencial';
COMMENT ON COLUMN telefone_cliente.dddtelclnt IS 'DDD do telefone do cliente.';
COMMENT ON COLUMN telefone_cliente.numtelclnt IS 'numero do telefone cadastrado para o cliente';
CREATE TABLE venda (
  codvenda     int4 NOT NULL, 
  valvenda     numeric(6, 2) NOT NULL 		, 
  stsvenda     varchar(140) NOT NULL 	, 
  datvenda     date NOT NULL, 
  horvenda     time NOT NULL 	, 
  pedidoqntped int4 NOT NULL, 
  pedidocodped int4 NOT NULL, 
  PRIMARY KEY (codvenda));
COMMENT ON TABLE venda IS 'detalhamento da venda (pedido efetuado)';
COMMENT ON COLUMN venda.codvenda IS 'codigo da venda';
COMMENT ON COLUMN venda.valvenda IS 'valor total da venda';
COMMENT ON COLUMN venda.stsvenda IS 'status da venda';
COMMENT ON COLUMN venda.datvenda IS 'data venda';
COMMENT ON COLUMN venda.horvenda IS 'horario da venda';
ALTER TABLE pedido_produto ADD CONSTRAINT FKpedido_pro231850 FOREIGN KEY (produtocodprod) REFERENCES produto (codprod);
ALTER TABLE pedido_produto ADD CONSTRAINT FKpedido_pro330558 FOREIGN KEY (pedidocodped) REFERENCES pedido (codped);
ALTER TABLE venda ADD CONSTRAINT FKvenda21377 FOREIGN KEY (pedidocodped) REFERENCES pedido (codped);
ALTER TABLE pedido ADD CONSTRAINT FKpedido77747 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);
ALTER TABLE telefone_cliente ADD CONSTRAINT FKtelefone_c632501 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);
ALTER TABLE endereco_cliente ADD CONSTRAINT FKendereco_c624907 FOREIGN KEY (clientecpfclnt) REFERENCES cliente (cpfclnt);
