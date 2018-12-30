@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../phpmyadmin/sql-parser/bin/lint-query
php "%BIN_TARGET%" %*
