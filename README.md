# apiwapp_conector
Script php to connect apiwapp.com.ar services
<h3>Follow the instructions</h3>
<ol>
    <li>Add library reference</li>

```bash
composer install juanalessandrini/apiwapp_conector
```    

<li>Add library reference</li>

```php
use Apiwapp\Conector;
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
