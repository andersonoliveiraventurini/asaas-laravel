<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\NoDataMethods;

    class Status extends NoDataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments/%s/status';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
    }
?>