@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../wapmorgan/unified-archive/bin/cam
php "%BIN_TARGET%" %*
