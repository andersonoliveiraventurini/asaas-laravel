<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\NoDataMethods;

    class Delete extends NoDataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments/%s';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
    }
?>