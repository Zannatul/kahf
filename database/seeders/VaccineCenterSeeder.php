<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VaccineCenter;

class VaccineCenterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaccineCenters = [
            ['Downtown Health Clinic', '123 Main Street, City Center', 'Clinic', '123-456-7890', 200],
            ['Green Valley Hospital', '45 Green Valley Rd, Suburb', 'Hospital', '987-654-3210', 500],
            ['Mobile Vaccination Unit', 'Various Locations', 'Mobile Center', '555-555-5555', 100],
            ['City Hall Vaccination Center', '789 Government Blvd, City', 'Government Facility', '321-654-9870', 300],
            ['Eastside Medical Center', '1010 Eastside Ave, City', 'Clinic', '222-333-4444', 250],
            ['Westend Community Hospital', '1515 Westend St, Suburb', 'Hospital', '111-222-3333', 400],
            ['River Park Vaccination Site', '3232 River Park Drive, Riverside', 'Mobile Center', '444-555-6666', 150],
            ['Springfield Health Unit', '4567 Springfield Rd, Springfield', 'Clinic', '777-888-9999', 180],
            ['Northern Hospital', '1212 North Ave, Uptown', 'Hospital', '888-999-0000', 350],
            ['Lakeside Clinic', '9090 Lakeside Lane, Lakeside', 'Clinic', '123-987-6543', 220],
            ['Hilltop Vaccination Site', '6767 Hilltop Rd, Highlands', 'Mobile Center', '444-111-2222', 130],
            ['Seaside Health Facility', '8080 Seaside Blvd, Seaview', 'Government Facility', '999-111-3333', 240],
            ['Capitol Health Center', '500 Capitol Ave, City Center', 'Clinic', '555-123-4567', 275],
            ['Midtown Wellness Clinic', '3030 Midtown Rd, Midtown', 'Clinic', '987-123-6540', 260],
            ['Sunset Medical Unit', '808 Sunset Blvd, Suburb', 'Mobile Center', '123-555-9876', 140],
            ['Mountain View Hospital', '9898 Mountain View Rd, Highland', 'Hospital', '333-666-7777', 450],
            ['Prairie Medical Clinic', '4040 Prairie Ave, Prairie Town', 'Clinic', '666-333-4444', 210],
            ['Meadowlands Vaccination Unit', '6060 Meadowlands Rd, Meadowlands', 'Mobile Center', '777-444-5555', 160],
            ['Oakwood Health Clinic', '2525 Oakwood St, Oakwood', 'Clinic', '888-222-3333', 230],
            ['Valley Vaccination Hub', '8088 Valley Rd, Valleytown', 'Government Facility', '999-555-4444', 320]
        ];

        foreach ($vaccineCenters as $center) {
            VaccineCenter::create([
                'name'              => $center[0],
                'location'          => $center[1],
                'center_type'       => $center[2],
                'contact_number'    => $center[3],
                'capacity'          => $center[4]
            ]);
        }
    }
}
