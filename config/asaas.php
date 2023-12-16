<?php

return [
    "production_url" => env("ASAAS_PRODUCTION_URL", "https://api.asaas.com/"),
    "sandbox_url" => env("ASAAS_SANDBOX_URL", "https://sandbox.asaas.com/api/"),
    "access_token" => env("ASAAS_ACCESS_TOKEN", ""),
    "environment" => env("ASAAS_ENVIRONMENT", "sandbox"), // sandbox or production
];