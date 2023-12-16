<?php
    namespace Andmarruda\Asaas;

    abstract class NoDataMethods extends DataMethods {
        /**
         * Variable that can handle with all possible data of this endpoint
         * @var array
         */
        protected $data = [];

        /**
         * Required data to create a customer
         * @var array
         */
        protected $required = [];

        /**
         * Set data convertion
         * @var array
         */
        protected $convert = [];

        /**
         * Constructor of the class passing the customer id
         * @param string $id
         * @return void
         */
        public function __construct(string $id)
        {
            parent::__construct();
            $this->endpoint = sprintf($this->endpoint, $id);
        }
    }
?>