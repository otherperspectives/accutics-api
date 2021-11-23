<?php

namespace App\Services;


use App\Traits\ConsumesExternalService;

class UserService
{
    use ConsumesExternalService;

    /**
     * The base uri to consume the users service
     * @var string
     */
    public $baseUri;

    /**
     * UserService constructor.
     * @param $baseUri
     */
    public function __construct()
    {
        $this->baseUri = config('services.users.base_uri');
    }

    /**
     * Get the full list of users from user service
     * @return string
     */
    public function getUser($id)
    {
        return $this->performRequest('GET', '/user/'.$id);
    }


    /**
     * Get the full list of users from user service
     * @return string
     */
    public function getAll()
    {
        return $this->performRequest('GET', '/users');
    }

    /**
     * Search for a user by name or email
     * @return string
     */
    public function search($searchBy, $searchQuery)
    {
        return $this->performRequest('POST', '/user/search', [
            'searchBy' => $searchBy,
            'searchQuery' => $searchQuery
        ]);
    }

}
