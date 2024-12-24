<?php

header("Access-Control-Allow-Origin: https://www.cultivesmart.com.br"); // Permitir apenas essa origem
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS"); // Métodos permitidos
header("Access-Control-Allow-Headers: Content-Type, Authorization"); // Cabeçalhos permitidos
header("Access-Control-Allow-Credentials: true"); // Se autenticação com cookies for usada

if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    http_response_code(200); // Responder a requisições preflight
    exit();
}

require './api/fornecedor.php';
require 'db/connection.php';