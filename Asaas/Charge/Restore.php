<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\NoDataMethods;

    class Restore extends NoDataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments/%s/restore';

        /**
         * Request method
         * @var string
         */
        protected $method = 'POST';
    }
?>