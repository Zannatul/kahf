<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ServiceInterfaces\UserServiceInterface;

class SearchController extends Controller
{
    // Injecting the UserService into the controller
    protected $userService;

    /**
     * Constructor to initialize dependencies
     * 
     * @param UserServiceInterface $userService
     */
    public function __construct(UserServiceInterface $userService)
    {
        // Assigning the injected service to the class property
        $this->userService = $userService;
    }

    /**
     * Handle the search request and return the search results
     * 
     * @param Request $request - The HTTP request object containing search parameters
     * @return \Illuminate\View\View - The search results view with the data
     */
    public function search(Request $request)
    {
        // Using the UserService to search based on the request input
        $searchData = $this->userService->search($request);

        // Returning the 'search' view with the search results
        return view('search', ['searchData' => $searchData]);
    }
}
