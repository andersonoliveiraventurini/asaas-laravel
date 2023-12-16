<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\NoDataMethods;

    class DigitableBilletLine extends NoDataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments/%s/identificationField';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
    }
?>