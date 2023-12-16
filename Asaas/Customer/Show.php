<?php
    namespace Andmarruda\Asaas\Customer;

    use Andmarruda\Asaas\NoDataMethods;

    class Show extends NoDataMethods
    {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/customers/%s';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
    }
?>