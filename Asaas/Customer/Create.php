<?php
    namespace Andmarruda\Asaas\Customer;

    use Andmarruda\Asaas\DataMethods;

    class Create extends DataMethods
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
        protected $method = 'POST';
        
        /**
         * Variable that can handle with all possible data of this endpoint
         * @var array
         */
        protected $data = [
            'name' => '',
            'cpfCnpj' => '',
            'email' => '',
            'phone' => '',
            'mobilePhone' => '',
            'address' => '',
            'addressNumber' => '',
            'complement' => '',
            'province' => '',
            'postalCode' => '',
            'externalReference' => '',
            'notificationDisabled' => false,
            'additionalEmailsEnabled' => false,
            'municipalInscription' => '',
            'stateInscription' => '',
            'observations' => '',
            'groupName' => '',
            'company' => ''
        ];

        /**
         * Required data to create a customer
         * @var array
         */
        protected $required = ['name', 'cpfCnpj'];

        /**
         * Set data convertion
         * @var array
         */
        protected $convert = [
            'notificationDisabled' => 'bool',
        ];
    }
?>