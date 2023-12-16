<?php
    namespace Andmarruda\Asaas\Customer;

    use Andmarruda\Asaas\NoDataMethods;

    class Delete extends NoDataMethods
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
        protected $method = 'DELETE';
    }
?>