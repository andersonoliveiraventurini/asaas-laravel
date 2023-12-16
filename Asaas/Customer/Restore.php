<?php
    namespace Andmarruda\Asaas\Customer;

    use Andmarruda\Asaas\NoDataMethods;

    class Restore extends NoDataMethods
    {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/customers/%s/restore';

        /**
         * Request method
         * @var string
         */
        protected $method = 'POST';
    }
?>