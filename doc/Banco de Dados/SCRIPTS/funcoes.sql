CREATE or REPLACE FUNCTION pcd_desconto(valor integer, usuario varchar ) RETURNS VOID
AS $$
declare
BEGIN
 update produto set valprod = (valprod * (1.00 - ((valor * -1.00)/100.00))),  logfun  = usuario; 
END;
$$ LANGUAGE 'plpgsql';

CREATE or REPLACE FUNCTION pcd_acrescimo(valor integer, usuario varchar ) RETURNS VOID
AS $$
declare
BEGIN
 update produto set valprod = (valprod * (1.00 + valor/100.00)),  logfun = usuario;
END;
$$ LANGUAGE 'plpgsql';

