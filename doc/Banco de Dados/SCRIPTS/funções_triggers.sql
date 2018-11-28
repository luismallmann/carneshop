
CREATE OR REPLACE FUNCTION produto_log()
RETURNS trigger 
AS 
$$ 
BEGIN
if (old.valprod <> new.valprod) then

	INSERT INTO produto_log
	(codprod, nomprod,valprodalt,valprod,logfun ,dataalt)
	VALUES
	(new.codprod,new.nomprod, old.valprod, new.valprod, new.logfun , 'today');	
end if;
RETURN NEW;
END; 
$$ LANGUAGE plpgsql;




CREATE OR REPLACE FUNCTION venda_log()
RETURNS trigger 
AS 
$$ 
BEGIN
if (old.stsvenda <> new.stsvenda) then

	INSERT INTO venda_log
	(codvenda, stsant, stsnov, logfun ,dataalt)
	VALUES
	(new.codvenda,old.stsvenda, new.stsvenda, new.logfun , 'today');	
end if;
RETURN NEW;
END; 
$$ LANGUAGE plpgsql;

