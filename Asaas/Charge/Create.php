<?php
    namespace Andmarruda\Asaas\Charge;
    use Andmarruda\Asaas\DataMethods;

    class Create extends DataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        protected $endpoint = 'v3/payments';

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
            'customer' => '',
            'billingType' => '',
            'value' => '',
            'dueDate' => '',
            'description' => '',
            'daysAfterDueDateToCancellationRegistration' => '',
            'externalReference' => '',
            'installmentCount' => '',
            'totalValue' => '',
            'installmentValue' => '',
            'discount' => [],
            'interest' => [],
            'fine' => [],
            'postalService' => false,
            'split' => [],
            'callbackUrl' => []
        ];

        /**
         * Required data to create a customer
         * @var array
         */
        protected $required = [
            'customer',
            'billingType',
            'value',
            'dueDate',
        ];

        /**
         * Set data convertion
         * @var array
         */
        protected $convert = [
            'value' => 'float',
            'daysAfterDueDateToCancellationRegistration' => 'int',
            'installmentCount' => 'int',
            'totalValue' => 'float',
            'installmentValue' => 'float',
            'postalService' => 'bool',
        ];

        /**
         * Allowed data values
         * @var array
         */
        protected array $allowed = [
            'billingType' => ['BOLETO', 'CREDIT_CARD', 'PIX'],
            'discount.type' => ['FIXED', 'PERCENTAGE'],
            'fine.type' => ['FIXED', 'PERCENTAGE'],
        ];

        /**
         * Avoidable data that has a defined structure
         * @var array
         */
        protected array $prohibited = [
            'discount', 'interest', 'fine', 'split', 'callbackUrl'
        ];

        /**
         * Set discount template
         * @param float $value
         * @param string $type
         * @param int $dueDateLimitDays
         * @return void
         */
        public function set_discount(float $value, string $type, ?int $dueDateLimitDays)
        {
            if(!in_array($type, $this->allowed['discount.type']))
                throw new \Exception("The value $type is not allowed for the key discount.type in the endpoint ". get_class($this));

            $this->data['discount'] = [
                'value' => $value,
                'type' => $type,
            ];

            if(!is_null($dueDateLimitDays))
                $this->data['discount']['dueDateLimitDays'] = $dueDateLimitDays;
        }

        /**
         * Set interest template
         * @param float $value
         * @return void
         */
        public function set_interest(float $value)
        {
            $this->data['interest'] = [
                'value' => $value,
            ];
        }

        /**
         * Set fine template
         * @param float $value
         * @param string $type
         * @return void
         */
        public function set_fine(float $value, string $type)
        {
            if(!in_array($type, $this->allowed['fine.type']))
                throw new \Exception("The value $type is not allowed for the key fine.type in the endpoint ". get_class($this));

            $this->data['fine'] = [
                'value' => $value,
                'type' => $type,
            ];
        }

        /**
         * Set split template
         * @param string $walletId
         * @param float $fixedValue
         * @param float $percentualValue
         * @param float $totalFixedValue
         * @return void
         */
        public function set_split(string $walletId, float $fixedValue, float $percentualValue, float $totalFixedValue)
        {
            $this->data['split'] = [
                'walletId' => $walletId,
                'fixedValue' => $fixedValue,
                'percentualValue' => $percentualValue,
                'totalFixedValue' => $totalFixedValue,
            ];
        }

        /**
         * Set callbackUrl template
         * @param string $successUrl
         * @param bool $autoRedirect
         * @return void
         */
        public function set_callbackUrl(string $successUrl, bool $autoRedirect=true)
        {
            $this->data['callbackUrl'] = [
                'successUrl' => $successUrl,
                'autoRedirect' => $autoRedirect,
            ];
        }
    }
?>