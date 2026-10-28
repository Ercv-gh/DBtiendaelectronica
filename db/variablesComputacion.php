<?php
// Configura estas variables en tu servidor o entorno local.
// Nunca guardes contraseñas reales en archivos versionados.
$servidor = getenv('DB_HOST') ?: 'localhost';
$usuario = getenv('DB_USER') ?: '';
$contrasenha = getenv('DB_PASSWORD') ?: '';
$bd = getenv('DB_NAME') ?: 'tiendaelectronica';
