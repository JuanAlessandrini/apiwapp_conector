# apiwapp_conector
Script php to connect apiwapp.com.ar services
<h3>Follow the instructions</h3>
<ol>
    <li>Add library reference</li>

```bash
composer install juanalessandrini/apiwapp_conector
```    
<li>Goto ApiWapp.com.ar and get the API token.</li>
<li>Replace token on .env file </li>

```yaml
    // vendor/juanalessandrini/apiwapp_conector/.env
    APIWAPP_TOKEN=yourToken
```
<li>Add library reference</li>

```php
use Juanalessandrini\Apiwapp\Conector\ApiWappConector;
```

<li>Create class instance:</li>

```php
    $whatsapp = new ApiWappConector(EntityManagerInterface,HttpClientInterface);
```

<li>Call to method to send message:</li>

```php
    $whatsapp->sendMessage($template_uid, $params, $target);
```
</ol>
