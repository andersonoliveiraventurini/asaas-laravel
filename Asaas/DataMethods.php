<?php
    namespace Andmarruda\Asaas;

    use Illuminate\Support\Facades\Log;
    use Illuminate\Support\Facades\Http;

    abstract class DataMethods {
        /**
         * Endpoint URL
         * @var string
         */
        private string $base_url;

        /**
         * Requested http
         * @var \Illuminate\Support\Facades\Http
         */
        private Http $http;

        /**
         * Pattern header of api
         * @var array
         */
        private array $headers = [
            'accept' => 'application/json',
            'Content-Type' => 'application/json',
        ];

        /**
         * Constructor of the class
         * @return void
         */
        public function __construct()
        {
            $this->base_url = config('asaas.environment') == 'sandbox' ? config('asaas.sandbox_url') : config('asaas.production_url');
            $this->headers['access_token'] = config('asaas.access_token');
        }

        /**
         * Set data for an existing dimension inside the data array
         * @param string $key
         * @param mixed $value
         * @return void
         */
        public function __set(string $key, mixed $value)
        {
            if(!isset($this->data[$key]))
                throw new \Exception("The key $key does not exist in the endpoint ". get_class($this));

            if(isset($this->prohibited) && array_key_exists($key, $this->prohibited))
                throw new \Exception("The key $key is prohibited by setting value because has an specific template, use the end point method ". get_class($this). "::set_". $key);

            if(isset($this->convert) && array_key_exists($key, $this->convert))
                settype($value, $this->convert[$key]);

            if(isset($this->allowed) && array_key_exists($key, $this->allowed) && !in_array($value, $this->allowed[$key]))
                throw new \Exception("The value $value is not allowed for the key $key in the endpoint ". get_class($this));

            $this->data[$key] = $value;
        }

        /**
         * Get data from an existing dimension inside the data array
         * @param string $key
         * @return mixed
         */
        public function __get(string $key)
        {
            if(!isset($this->data[$key]))
                throw new \Exception("The key $key does not exist in the endpoint ". get_class($this));

            return $this->data[$key];
        }

        /**
         * Check required data before request
         * @return void
         */
        private function checkRequired()
        {
            if(isset($this->required))
            {
                foreach($this->required as $key)
                {
                    if(empty($this->data[$key]))
                        throw new \Exception("The key $key is required in the endpoint ". get_class($this));
                }
            }
        }

        /**
         * Prepares data to send to Asaas API
         * @return array
         */
        private function prepareData()
        {
            $data = [];

            foreach($this->data as $key => $value)
            {
                if(is_array($value) && sizeof($value) > 0) {
                    $data[$key] = json_encode($value);
                    continue;
                }

                if(!empty($value))
                    $data[$key] = $value;
            }

            return $data;
        }

        /**
         * Returns last request
         * @return \Illuminate\Support\Facades\Http
         */
        public function lastRequest() : Http
        {
            return $this->http;
        }

        /**
         * Request to Asaas API
         * @return array
         */
        public function request() : Http
        {
            $this->checkRequired();
            $endpoint = $this->base_url . $this->endpoint;
            $tempHttp = Http::withHeaders($this->headers);
            switch($this->method)
            {
                case 'POST':
                    $this->http = $tempHttp->post($endpoint, $this->prepareData());
                    break;
                case 'PUT':
                    $this->http = $tempHttp->put($endpoint, $this->prepareData());
                    break;
                case 'DELETE':
                    $this->http = $tempHttp->delete($endpoint, $this->prepareData());
                    break;
                default:
                    $this->http = $tempHttp->get($endpoint, $this->prepareData());
            }

            return $this->http;
        }
    }
?>