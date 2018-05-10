ALTER TABLE pedido_produto DROP CONSTRAINT FKpedido_pro330558;
ALTER TABLE pedido_produto DROP CONSTRAINT FKpedido_pro231850;
ALTER TABLE venda DROP CONSTRAINT FKvenda21377;
ALTER TABLE pedido DROP CONSTRAINT FKpedido77747;
ALTER TABLE telefone_cliente DROP CONSTRAINT FKtelefone_c632501;
ALTER TABLE endereco_cliente DROP CONSTRAINT FKendereco_c624907;
DROP TABLE IF EXISTS cliente CASCADE;
DROP TABLE IF EXISTS endereco_cliente CASCADE;
DROP TABLE IF EXISTS funcionario CASCADE;
DROP TABLE IF EXISTS pedido CASCADE;
DROP TABLE IF EXISTS pedido_produto CASCADE;
DROP TABLE IF EXISTS produto CASCADE;
DROP TABLE IF EXISTS telefone_cliente CASCADE;
DROP TABLE IF EXISTS venda CASCADE;
DROP SEQUENCE seq_endereco_cliente;
DROP SEQUENCE seq_pedido;
DROP SEQUENCE seq_produto;
DROP SEQUENCE seq_telefone_cliente;
DROP SEQUENCE seq_venda;
