<?php

return [
    "production_url" => env("ASAAS_PRODUCTION_URL", "https://api.asaas.com/"),
    "sandbox_url" => env("ASAAS_SANDBOX_URL", "https://sandbox.asaas.com/api/"),
    "access_token" => env("ASAAS_ACCESS_TOKEN", ""),
    "environment" => env("ASAAS_ENVIRONMENT", "sandbox"), // sandbox or production
    "middleware_web" => [], // array of middlewares to be used in routes
    "middleware_api" => ['api'], // array of middlewares to be used in routes
    "prefix_api" => 'api', // prefix of the api routes
    "prefix_web" => '', // prefix of the web routes
];