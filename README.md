# PayPal PHP SDK Examples
A simple set of payment examples using PayPal PHP SDK.

## Steps

1. Create a Paypal Developer account on [Paypal Developer](https://developer.paypal.com). 
2. Create an App on [Paypal Developer  - REST API apps](https://developer.paypal.com/developer/applications/create)
3. Use your App's Client id and Secret on the file app/init.php

```php
new OAuthTokenCredential(
	'YOUR_CLIENT_ID',
	'YOUR_SECRET'
)
```
4. Use your Business Account's Email ID on the file index.php

```html
<script async="async" 
src="https://www.paypalobjects.com/js/external/paypal-button.min.js?merchant=BUSINESS_ACCOUNT_EMAIL_ID" 
...
></script>
```

5. Start your server from the root folder. For example:
```cmd
php -S localhost:80
```

6. Access the web page going to: [Localhost](http://localhost)