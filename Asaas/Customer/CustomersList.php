<?php
    namespace Andmarruda\Asaas\Customer;

    use Andmarruda\Asaas\DataMethods;

    class CustomersList extends DataMethods
    {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/customers';

        /**
         * Request method
         * @var string
         */
        protected $method = 'GET';
        
        /**
         * Variable that can handle with all possible data of this endpoint
         * @var array
         */
        protected $data = [
            'name' => '',
            'email' => '',
            'cpfCnpj' => '',
            'groupName' => '',
            'externalReference' => '',
            'offset' => 0,
            'limit' => 25
        ];

        /**
         * Required data to create a customer
         * @var array
         */
        protected $required = [];

        /**
         * Set data convertion
         * @var array
         */
        protected $convert = [
            'offset' => 'int',
            'limit' => 'int'
        ];
    }
?>