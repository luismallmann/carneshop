create trigger tg_produto
after update
on produto
for each row
execute procedure produto_log();


create trigger tg_venda
after update
on venda
for each row
execute procedure venda_log();