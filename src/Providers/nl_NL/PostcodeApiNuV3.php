<?php

namespace nickurt\postcodeapi\Providers\nl_NL;

use Illuminate\Support\Arr;
use nickurt\PostcodeApi\Entity\Address;
use nickurt\PostcodeApi\Exception\NotSupportedException;
use nickurt\PostcodeApi\Providers\Provider;

class PostcodeApiNuV3 extends Provider
{
    /**
     * @param string $postCode
     * @return Address
     */
    public function find($postCode)
    {
        throw new NotSupportedException('Cannot search with postcode only');
    }

    protected function request()
    {
        $response = $this->getHttpClient()->request('GET', $this->getRequestUrl(), [
            'headers' => [
                'X-Api-Key' => $this->getApiKey()
            ]
        ]);

        return json_decode($response->getBody(), true);
    }

    /**
     * @param string $postCode
     * @return Address
     */
    public function findByPostcode($postCode)
    {
        return $this->find($postCode);
    }

    /**
     * @param string $postCode
     * @param string $houseNumber
     * @return Address
     */
    public function findByPostcodeAndHouseNumber($postCode, $houseNumber)
    {
        // Format postcode into 1234AB format
        $postCode = strtoupper(preg_replace('/\s+/', '', $postCode));

        // Extract number from house number
        $houseNumber = preg_replace('/^\s*(\d+).*$/', '\1', $houseNumber);

        // Send request
        $this->setRequestUrl(sprintf($this->getRequestUrl(), $postCode, $houseNumber));

        // Handle response
        $response = $this->request();

        // Check for a street
        if (!Arr::has($response, 'street')) {
            // Postcode / housenumber combination not found
            return new Address();
        }

        // Found it :)
        return (new Address())
            ->setStreet(Arr::get($response, 'street'))
            ->setHouseNo((string) Arr::get($response, 'number'))
            ->setTown(Arr::get($response, 'city'))
            ->setMunicipality(Arr::get($response, 'municipality'))
            ->setProvince(Arr::get($response, 'province'))
            // They're [long, lat]!
            ->setLongitude(Arr::get($response, 'location.coordinates.0'))
            ->setLatitude(Arr::get($response, 'location.coordinates.1'));
    }
}
