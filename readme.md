## Payop PHP client

### Example of usage

$client = (new PayopClientFactoryInterface($handlerStack))

```php
use PayopClient\ClientFactory;
use PayopClient\Exceptions\InvalidApiResponseException;
use PayopClient\Models\AbstractModel;

$token = 'YOUR_JWT_TOKEN';
$payload = [
// ...
];

$handler = GuzzleHttp\HandlerStack::create();

$client = (new ClientFactory($handler))->make($token);

$attributes = AbstractModel::createFromAttributes($payload);

try {
    $response = $client->invoices()->createInvoice($attributes);
} catch (InvalidApiResponseException $e) {
    throw $e;
}

```