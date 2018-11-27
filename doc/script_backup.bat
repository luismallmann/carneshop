@echo Backup database  %PG_PATH%%PG_FILENAME%
@echo off
SET PG_BIN="C:\PostgreSQL\10\bin\pg_dump.exe"
SET PG_HOST=localhost
SET PG_PORT=5432
SET PG_DATABASE=carneshop
SET PG_USER=postgres
SET PG_PASSWORD=postgres
set data=%date:/=-%
set hora=%time:~0,2%h%time:~3,2%m
SET PG_FILENAME=C:\carneshop\backup_%data%_%hora%.sql

mkdir C:\carneshop

%PG_BIN% -U %PG_USER% %PG_DATABASE% > %PG_FILENAME%

@echo Backup Taken Complete %PG_PATH%%PG_FILENAME%