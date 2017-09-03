@ECHO OFF
setlocal DISABLEDELAYEDEXPANSION
SET BIN_TARGET=%~dp0/../fatrellis/mqk/bin/mqk
php "%BIN_TARGET%" %*
