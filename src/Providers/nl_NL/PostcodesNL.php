<?php

namespace nickurt\PostcodeApi\Providers\nl_NL;

use nickurt\PostcodeApi\Entity\Address;
use nickurt\PostcodeApi\Providers\Provider;

class PostcodesNL extends Provider
{
    public function find(string $postCode): Address
    {
        $this->setRequestUrl($this->getRequestUrl() . '?apikey=' . $this->getApiKey() . '&nlzip6=' . $postCode);

        $response = $this->request();

        if (isset($response['status']) && $response['status'] == 'error') {
            return new Address();
        }

        $address = new Address();
        $address
            ->setStreet($response['results'][0]['streetname'])
            ->setTown($response['results'][0]['city'])
            ->setMunicipality($response['results'][0]['municipality'])
            ->setProvince($response['results'][0]['province'])
            ->setLatitude($response['results'][0]['latitude'])
            ->setLongitude($response['results'][0]['longitude']);

        return $address;
    }

    protected function request()
    {
        $response = $this->getHttpClient()->request('GET', $this->getRequestUrl());

        return json_decode($response->getBody(), true);
    }

    public function findByPostcode(string $postCode): Address
    {
        throw new \nickurt\PostcodeApi\Exception\NotSupportedException();
    }

    public function findByPostcodeAndHouseNumber(string $postCode, string $houseNumber): Address
    {
        $this->setRequestUrl($this->getRequestUrl() . '?apikey=' . $this->getApiKey() . '&nlzip6=' . $postCode . '&streetnumber=' . $houseNumber);

        $response = $this->request();

        if (isset($response['status']) && $response['status'] == 'error') {
            return new Address();
        }

        $address = new Address();
        $address
            ->setStreet($response['results'][0]['streetname'])
            ->setTown($response['results'][0]['city'])
            ->setHouseNo($houseNumber)
            ->setMunicipality($response['results'][0]['municipality'])
            ->setProvince($response['results'][0]['province'])
            ->setLatitude($response['results'][0]['latitude'])
            ->setLongitude($response['results'][0]['longitude']);

        return $address;
    }
}
