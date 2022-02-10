## Laravel PostcodeApi
[![Build Status](https://github.com/nickurt/laravel-postcodeapi/workflows/tests/badge.svg)](https://github.com/nickurt/laravel-postcodeapi/actions)
[![Total Downloads](https://poser.pugx.org/nickurt/laravel-postcodeapi/d/total.svg)](https://packagist.org/packages/nickurt/laravel-postcodeapi)
[![Latest Stable Version](https://poser.pugx.org/nickurt/laravel-postcodeapi/v/stable.svg)](https://packagist.org/packages/nickurt/laravel-postcodeapi)
[![MIT Licensed](https://poser.pugx.org/nickurt/laravel-postcodeapi/license.svg)](LICENSE.md)

### Installation
Install this package with composer:
```
composer require nickurt/laravel-postcodeapi
```

Copy the config files for the api
```
php artisan vendor:publish --provider="nickurt\PostcodeApi\ServiceProvider" --tag="config"
```

### Examples
#### Default - en_AU
```php
$postCode10 = PostcodeApi::create('PostcodeApiComAu')->find('3066');
```
#### Default - en_GB
```php
$postCode11 = PostcodeApi::create('GeoPostcodeOrgUk')->find('SW1A1AA');
$postCode12 = PostcodeApi::create('GetAddressIO')->find('SW1A1AA');
$postCode13 = PostcodeApi::create('IdealPostcodes')->find('SW1A1AA');
$postCode14 = PostcodeApi::create('PostcodesIO')->find('SW1A1AA');
$postCode15 = PostcodeApi::create('UkPostcodes')->find('SW1A1AA');
```
#### Default - en_US
```php
$postCode16 = PostcodeApi::create('Algolia')->find('92270');
$postCode17 = PostcodeApi::create('Bing')->find('92270');
$postCode18 = PostcodeApi::create('Geocodio')->find('92270');
$postCode19 = PostcodeApi::create('Google')->find('92270');
$postCode20 = PostcodeApi::create('Here')->find('92270');
$postCode21 = PostcodeApi::create('LocationIQ')->find('92270');
$postCode22 = PostcodeApi::create('Mapbox')->find('92270');
$postCode23 = PostcodeApi::create('OpenCage')->find('92270');
$postCode24 = PostcodeApi::create('TomTom')->find('92270');
```
#### Default - fr_FR
```php
$postCode25 = PostcodeApi::create('AdresseDataGouv')->find('75007');
$postCode26 = PostcodeApi::create('AdresseDataGouv')->findByPostcodeAndHouseNumber('75007', '5 Avenue Anatole France');
```
#### Default - nl_BE
```php
$postCode27 = PostcodeApi::create('Pro6PP_BE')->find('1000');
```
#### Default - nl_NL
```php
$postCode28 = PostcodeApi::create('ApiPostcode')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode29 = PostcodeApi::create('NationaalGeoRegister')->find('1118CP');
$postCode30 = PostcodeApi::create('NationaalGeoRegister')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode31 = PostcodeApi::create('PostcoDe')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode32 = PostcodeApi::create('PostcodeApiNu')->find('1118CP');
$postCode33 = PostcodeApi::create('PostcodeApiNu')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode34 = PostcodeApi::create('PostcodeData')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode35 = PostcodeApi::create('PostcodeNL')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode36 = PostcodeApi::create('PostcodesNL')->find('1118CP');
$postCode37 = PostcodeApi::create('PostcodesNL')->findByPostcodeAndHouseNumber('1118CP', '202');
$postCode38 = PostcodeApi::create('Pro6PP_NL')->find('1118CP');
$postCode39 = PostcodeApi::create('Pstcd')->find('1118CP');
$postCode40 = PostcodeApi::create('Pstcd')->findByPostcodeAndHouseNumber('1118CP', '202');
```
#### Route
```php
Route::get('/{postCode}', function($postCode) {
    $postCode41 = PostcodeApi::create('PostcodeApiNu')->find($postCode);
    
    return Response::json($postCode41->toArray(), 200, [], JSON_PRETTY_PRINT);
});
```

### Providers
[AdresseDataGouv](https://adresse.data.gouv.fr), [Algolia](https://community.algolia.com/places), [ApiPostcode](https://api-postcode.nl), [Bing](https://www.bingmapsportal.com), [Geocodio](https://www.geocod.io), [GeoPostcodeOrgUk](http://www.geopostcode.org.uk), [GetAddresIO](https://getaddress.io), [Google](https://developers.google.com/maps/documentation/geocoding/intro), [Here](https://www.here.com), [IdealPostcodes](https://ideal-postcodes.co.uk), [LocationIQ](https://locationiq.com), [Mapbox](https://www.mapbox.com/), [NationaalGeoRegister](https://nationaalgeoregister.nl/geonetwork/srv/dut/catalog.search#/home), [OpenCage](https://opencagedata.com/), [postco.de](https://postco.de), [PostcodeApiComAu](https://postcodeapi.com.au), [PostcodeApiNu](https://www.postcodeapi.nu), [PostcodeData](http://www.postcodedata.nl), [PostcodeNL](https://www.postcode.nl), [PostcodesIO](https://api.postcodes.io), [PostcodesNL](https://www.postcodes.nl), [Pro6PP_BE](https://www.pro6pp.nl), [Pro6PP_NL](https://www.pro6pp.nl), [Pstcd](http://www.pstcd.nl/), [TomTom](https://developer.tomtom.com/content/search-api-explorer), [UkPostcodes](http://uk-postcodes.com/postcode)
### Tests
```sh
composer test
```

- - - 
