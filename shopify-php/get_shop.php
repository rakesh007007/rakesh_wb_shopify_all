
<?php
    echo "
     <script src=\"https://cdn.shopify.com/s/assets/external/app.js\"></script>
  <script type=\"text/javascript\">
    ShopifyApp.init({
      apiKey: '8e46ce34349be180e0d420a75eb25d30',
      shopOrigin: 'https://rakesh-yadav.myshopify.com'
    });
  </script>
    ";
	session_start();

	require __DIR__.'/vendor/autoload.php';
	use phpish\shopify;

	require __DIR__.'/conf.php';

	$shopify = shopify\client($_SESSION['shop'], SHOPIFY_APP_API_KEY, $_SESSION['oauth_token']);

	try
	{
		# Making an API request can throw an exception
		$shop = $shopify('GET /admin/shop.json');
		print_r($shop);
	}
	catch (shopify\ApiException $e)
	{
		# HTTP status code was >= 400 or response contained the key 'errors'
		echo $e;
		print_r($e->getRequest());
		print_r($e->getResponse());
	}
	catch (shopify\CurlException $e)
	{
		# cURL error
		echo $e;
		print_r($e->getRequest());
		print_r($e->getResponse());
	}
