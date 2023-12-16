<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\NoDataMethods;

    class PixQRCode extends NoDataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments/%s/pixQrCode';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
    }
?>