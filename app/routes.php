<?php

require_once app_path("libraries/AMWS-feeds/src/MarketplaceWebService/Samples/.config.inc.php");
/*
 |--------------------------------------------------------------------------
 | Application Routes
 |--------------------------------------------------------------------------
 |
 | Here is where you can register all of the routes for an application.
 | It's a breeze. Simply tell Laravel the URIs it should respond to
 | and give it the Closure to execute when that URI is requested.
 |
 */

Route::post('login', array('uses' => 'AuthController@postLogin'));
Route::post('signup', array('uses' => 'AuthController@postRegister'));

Route::group(array('before' => 'auth'), function() {
	Route::get('subscribe', function() {
		return Redirect::to("home");
		//return View::make('subscribe.subscribe');
	});
	Route::get('subscribe/success', function() {
		return View::make('subscribe.success');
	});
	Route::get('subscribe/failure', function() {
		return View::make('subscribe.failure');
	});
	Route::post('subscribe', function() {
		return View::make('subscribe.subscribe');
	});
});

Route::get('contact', function() {
	return View::make('contact');
});
Route::get('package', function() {
	return View::make('package');
});
Route::get('about', function() {
	return View::make('about');
});
Route::get('login', function() {
	if( Auth::check() ) {
		return Redirect::to("home");
	}
	return View::make('auth.login');
});

Route::group(array('before' => 'auth','prefix' => 'home'), function() {
	Route::get('/', function() {
		return View::make('homepage');
	});
	Route::post('/upload', 'HomeController@upload');
});

Route::get('logout', function(){
	if( Auth::check() ) {
		Auth::logout();
		Session::flush();
	}
	return Redirect::to("login");
});

Route::get('/', function()
{
	$serviceUrl = "https://mws.amazonservices.in";
	$config = array (
	  'ServiceURL' => $serviceUrl,
	  'ProxyHost' => null,
	  'ProxyPort' => -1,
	  'MaxErrorRetry' => 3,
	);

	$service = new MarketplaceWebService_Client(
	AWS_ACCESS_KEY_ID,
	AWS_SECRET_ACCESS_KEY,
	$config,
	APPLICATION_NAME,
	APPLICATION_VERSION);

	$feed = '<?xml version="1.0" encoding="UTF-8"?>
	<AmazonEnvelope xsi:noNamespaceSchemaLocation="amzn-envelope.xsd" xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance">
	    <Header>
	        <DocumentVersion>1.01</DocumentVersion>
	        <MerchantIdentifier>M_MWSTEST_49045593</MerchantIdentifier>
	    </Header>
	    <MessageType>OrderFulfillment</MessageType>
	    <Message>
	        <MessageID>1</MessageID>
	        <OperationType>Update</OperationType>
	        <OrderFulfillment>
	            <AmazonOrderID>002-3275191-2204215</AmazonOrderID>
	            <FulfillmentDate>2009-07-22T23:59:59-07:00</FulfillmentDate>
	            <FulfillmentData>
	                <CarrierName>Contact Us for Details</CarrierName>
	                <ShippingMethod>Standard</ShippingMethod>
	            </FulfillmentData>
	            <Item>
	                <AmazonOrderItemCode>42197908407194</AmazonOrderItemCode>
	                <Quantity>1</Quantity>
	            </Item>
	        </OrderFulfillment>
	    </Message>
	</AmazonEnvelope>';

	$feedHandle = @fopen('php://temp', 'rw+');
	fwrite($feedHandle, $feed);
	rewind($feedHandle);
	$parameters = array (
	  'Merchant' => MERCHANT_ID,
	  'FeedType' => '_POST_ORDER_FULFILLMENT_DATA_',
	  'FeedContent' => $feedHandle,
	  'PurgeAndReplace' => false,
	  'ContentMd5' => base64_encode(md5(stream_get_contents($feedHandle), true)),
	);

	rewind($feedHandle);

	$request = new MarketplaceWebService_Model_SubmitFeedRequest($parameters);

	invokeSubmitFeed($service, $request);

	@fclose($feedHandle);
	
	die;
	/*
	if( Auth::check() ) {
		return Redirect::to("home");
	}
	return View::make('auth.login');*/
});

function invokeSubmitFeed(MarketplaceWebService_Interface $service, $request) 
  {
      try {
              $response = $service->submitFeed($request);
              
                echo ("Service Response\n");
                echo ("=============================================================================\n");

                echo("        SubmitFeedResponse\n");
                if ($response->isSetSubmitFeedResult()) { 
                    echo("            SubmitFeedResult\n");
                    $submitFeedResult = $response->getSubmitFeedResult();
                    if ($submitFeedResult->isSetFeedSubmissionInfo()) { 
                        echo("                FeedSubmissionInfo\n");
                        $feedSubmissionInfo = $submitFeedResult->getFeedSubmissionInfo();
                        if ($feedSubmissionInfo->isSetFeedSubmissionId()) 
                        {
                            echo("                    FeedSubmissionId\n");
                            echo("                        " . $feedSubmissionInfo->getFeedSubmissionId() . "\n");
                        }
                        if ($feedSubmissionInfo->isSetFeedType()) 
                        {
                            echo("                    FeedType\n");
                            echo("                        " . $feedSubmissionInfo->getFeedType() . "\n");
                        }
                        if ($feedSubmissionInfo->isSetSubmittedDate()) 
                        {
                            echo("                    SubmittedDate\n");
                            echo("                        " . $feedSubmissionInfo->getSubmittedDate()->format(DATE_FORMAT) . "\n");
                        }
                        if ($feedSubmissionInfo->isSetFeedProcessingStatus()) 
                        {
                            echo("                    FeedProcessingStatus\n");
                            echo("                        " . $feedSubmissionInfo->getFeedProcessingStatus() . "\n");
                        }
                        if ($feedSubmissionInfo->isSetStartedProcessingDate()) 
                        {
                            echo("                    StartedProcessingDate\n");
                            echo("                        " . $feedSubmissionInfo->getStartedProcessingDate()->format(DATE_FORMAT) . "\n");
                        }
                        if ($feedSubmissionInfo->isSetCompletedProcessingDate()) 
                        {
                            echo("                    CompletedProcessingDate\n");
                            echo("                        " . $feedSubmissionInfo->getCompletedProcessingDate()->format(DATE_FORMAT) . "\n");
                        }
                    } 
                } 
                if ($response->isSetResponseMetadata()) { 
                    echo("            ResponseMetadata\n");
                    $responseMetadata = $response->getResponseMetadata();
                    if ($responseMetadata->isSetRequestId()) 
                    {
                        echo("                RequestId\n");
                        echo("                    " . $responseMetadata->getRequestId() . "\n");
                    }
                } 

                echo("            ResponseHeaderMetadata: " . $response->getResponseHeaderMetadata() . "\n");
     } catch (MarketplaceWebService_Exception $ex) {
         echo("Caught Exception: " . $ex->getMessage() . "\n");
         echo("Response Status Code: " . $ex->getStatusCode() . "\n");
         echo("Error Code: " . $ex->getErrorCode() . "\n");
         echo("Error Type: " . $ex->getErrorType() . "\n");
         echo("Request ID: " . $ex->getRequestId() . "\n");
         echo("XML: " . $ex->getXML() . "\n");
         echo("ResponseHeaderMetadata: " . $ex->getResponseHeaderMetadata() . "\n");
     }
 }
