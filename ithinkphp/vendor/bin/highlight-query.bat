@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../phpmyadmin/sql-parser/bin/highlight-query
php "%BIN_TARGET%" %*
