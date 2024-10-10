<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\VaccineScheduleRequest;
use App\Services\ServiceInterfaces\UserServiceInterface;
use App\Services\ServiceInterfaces\VaccineSchedulingServiceInterface;

class VaccineScheduleController extends Controller
{
    /**
     * The user service for retrieving user profile information.
     *
     * @var UserServiceInterface
     */
    protected $userService;

    /**
     * The vaccine scheduling service for handling scheduling logic.
     *
     * @var VaccineSchedulingServiceInterface
     */
    protected $vaccineSchedulingService;

    /**
     * Constructor to inject the services needed by this controller.
     *
     * @param UserServiceInterface $userService The service to manage user-related actions.
     * @param VaccineSchedulingServiceInterface $vaccineSchedulingService The service to manage vaccine scheduling.
     */
    public function __construct(UserServiceInterface $userService, VaccineSchedulingServiceInterface $vaccineSchedulingService)
    {
        $this->userService                  =   $userService;
        $this->vaccineSchedulingService     =   $vaccineSchedulingService;
    }

    /**
     * Display the vaccine scheduling form.
     *
     * This method retrieves the user profile data via the user service and
     * passes it to the view responsible for displaying the schedule creation form.
     *
     * @return \Illuminate\View\View
     */
    public function createSchedule()
    {
        // Retrieve user profile data
        $userProfileData = $this->userService->getProfileInfomation();

        // Pass the data to the view
        return view('vaccine-schedule.create', ['profile' => $userProfileData]);
    }

    /**
     * Store a new vaccine schedule.
     * @param VaccineScheduleRequest $request The validated request containing scheduling data.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function storeSchedule(VaccineScheduleRequest $request)
    {

        // Check if user already created a schedule
        $alreadyScheduled = $this->vaccineSchedulingService->checkDuplicateSchedule();

        if ($alreadyScheduled) {
            return redirect()->back()->with('error', 'Sorry! You already has a schedule!')->withInput();
        }

        // Check if an available slot exists for the requested date
        $isAvailableSlot = $this->vaccineSchedulingService->checkAvailableSlot($request->scheduled_date);

        // If no slots are available, return with an error message
        if (!$isAvailableSlot) {
            return redirect()->back()->with('error', 'Sorry! No available slot for ' . $request->scheduled_date)->withInput();
        }

        // Attempt to store the schedule
        $isStored = $this->vaccineSchedulingService->storeSchedule($request);

        // If the schedule is successfully stored, redirect to the user's profile with a success message
        if ($isStored) {
            return redirect()->to('user/profile')->with('success', 'Schedule Locked Successfully');
        }

        // If storing fails, return with an error message
        return redirect()->back()->with('error', 'Opps! Something went wrong!')->withInput();
    }
}
