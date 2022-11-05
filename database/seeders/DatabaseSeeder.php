<?php

namespace Database\Seeders;

use App\Models\ProgressionItem;
use App\Models\Resource;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $resources_json = <<<JSON
            [{"title":"Course Overview","description":"","order":1,"children":[{"title":"Overall Structure","description":"","order":1,"children":[]},{"title":"Getting Started","description":"","order":2,"children":[]},{"title":"Module Content and Structure","description":"","order":3,"children":[]},{"title":"Moving through the Resource","description":"","order":4,"children":[]},{"title":"Course Content","description":"","order":5,"children":[]}]},{"title":"Scenarios","description":"","order":2,"children":[{"title":"Scenario 1 - Hidden Agenda","description":"","order":6,"children":[]},{"title":"Scenario 2 - Child of our Time","description":"","order":7,"children":[]},{"title":"Scenario 3 - Too Many Treatments","description":"","order":8,"children":[]},{"title":"Scenario 4 - Inspiration","description":"","order":9,"children":[]},{"title":"Scenario 5 - A Matter of Consent","description":"","order":10,"children":[]}]},{"title":"Pharmacology","description":"","order":3,"children":[{"title":"Basic Pharmacology - An Introduction","description":"","order":1,"children":[]},{"title":"Pharmacodynamics","description":"","order":2,"children":[{"title":"The Key Principles of Pharmacodynamics","description":"","order":1,"children":[]},{"title":"Receptors","description":"","order":2,"children":[]},{"title":"Types of Receptor","description":"","order":3,"children":[]},{"title":"Drug-Receptor Interaction","description":"","order":4,"children":[]},{"title":"Pharmacodynamics: Agonists and Antagonists","description":"","order":5,"children":[]}]},{"title":"Pharmacokinetics","description":"","order":3,"children":[{"title":"Pharmacokinetics","description":"","order":1,"children":[]},{"title":"Time to Onset and Duration of Effect","description":"","order":2,"children":[]},{"title":"Absorption","description":"","order":3,"children":[]},{"title":"First Pass Metabolism","description":"","order":4,"children":[]},{"title":"Drug Administration Routes","description":"","order":5,"children":[]}]},{"title":"Adverse Drug Reactions","description":"","order":4,"children":[{"title":"Adverse Drug Reaction - A Definition","description":"","order":1,"children":[]},{"title":"Adverse Drug Reactions - Paracetamol","description":"","order":3,"children":[]},{"title":"Adverse Drug Reactions - Primary Considerations","description":"","order":4,"children":[]},{"title":"Determining Adverse Drug Reactions","description":"","order":5,"children":[]},{"title":"Adverse Drug Reactions - Further Research","description":"","order":6,"children":[]}]},{"title":"Individual Patient Variation","description":"","order":5,"children":[{"title":"Introducing Individual Patient Variation in Drug Response","description":"","order":1,"children":[]},{"title":"Individual Patient Variation","description":"","order":2,"children":[]},{"title":"Patient Variation - Paediatrics","description":"","order":3,"children":[]},{"title":"Patient Variation - Paediatric Dosage","description":"","order":4,"children":[]},{"title":"Patient Variation -The Elderly","description":"","order":5,"children":[]}]}]},{"title":"Legal  Frameworks for Prescribing","description":"","order":4,"children":[{"title":"Medicines Legislation","description":"","order":1,"children":[{"title":"What is Law?","description":"","order":1,"children":[]},{"title":"Human Medicines Regulations 2012","description":"","order":2,"children":[]},{"title":"Licensing and the Regulations","description":"","order":3,"children":[]},{"title":"Misuse of Drugs Act 1971","description":"","order":4,"children":[]},{"title":"Quiz: Medicines Legislation","description":"","order":5,"children":[]}]},{"title":"Prescribing Unlicenced Medicines and Off-Licence\/Off-Label","description":"","order":2,"children":[{"title":"Prescribing Unlicenced Medicines","description":"","order":1,"children":[]},{"title":"Prescribing Medicines Off-Licence\/ Off-Label","description":"","order":2,"children":[]},{"title":"Mixing Medicines","description":"","order":3,"children":[]},{"title":"Quiz: Prescribing Unlicenced Medicines and Off-Licence\/ Off-Label","description":"","order":4,"children":[]},{"title":"Module Summary:","description":"","order":5,"children":[]}]},{"title":"Mechanisms for Prescribing, Supply and Administration of Medicines","description":"","order":3,"children":[{"title":"Mechanisms for Prescribing, Supply and Administration of Medicines","description":"","order":1,"children":[]},{"title":"Supply of Medicines Using Patient Group Directions","description":"","order":2,"children":[]},{"title":"Requirements for PGD Use","description":"","order":3,"children":[]},{"title":"Restrictions on PGD Use","description":"","order":4,"children":[]},{"title":"Quiz: Mechanisms for Prescribing, Supply and Administration of Medicines","description":"","order":5,"children":[]}]},{"title":"Independent Prescribing","description":"","order":4,"children":[{"title":"Development of Independent Prescribing","description":"","order":1,"children":[]},{"title":"Nurses and Midwives as Independent Prescribers","description":"","order":2,"children":[]},{"title":"Pharmacist Independent Prescribers","description":"","order":3,"children":[]},{"title":"Physiotherapist Independent Prescribers","description":"","order":4,"children":[]},{"title":"Podiatrist\/Chiropodist Independent Prescribers","description":"","order":5,"children":[]}]},{"title":"Supplementary Prescribing","description":"","order":5,"children":[{"title":"Defining Supplementary Prescribing","description":"","order":1,"children":[]},{"title":"Who can prescribe as a Supplementary Prescriber?","description":"","order":2,"children":[]},{"title":"What can be prescribed using a Supplementary Prescribing Arrangement?","description":"","order":3,"children":[]},{"title":"What is the Clinical Management Plan","description":"","order":4,"children":[]},{"title":"Partnership using Supplementary Prescribing","description":"","order":5,"children":[]}]}]},{"title":"Prescribing Professionally","description":"","order":5,"children":[{"title":"Applying the Professional Frameworks for Non-Medical Prescribing","description":"","order":1,"children":[{"title":"Professionalism","description":"","order":1,"children":[]},{"title":"Standards for Prescribing Practice","description":"","order":2,"children":[]},{"title":"Competence for Prescribing Practice","description":"","order":3,"children":[]},{"title":"A Competency Framework for all Prescribers","description":"","order":4,"children":[]},{"title":"Developing and Maintaining Competence in Prescribing","description":"","order":5,"children":[]}]},{"title":"Personal Accountability and Responsibility as a NMP","description":"","order":2,"children":[{"title":"Responsibility and Accountability","description":"","order":1,"children":[]},{"title":"Accepting Responsibility","description":"","order":2,"children":[]},{"title":"Responsibility for Remote Assessment","description":"","order":3,"children":[]},{"title":"Authority to Prescribe","description":"","order":4,"children":[]},{"title":"Quiz: Accepting Responsibility","description":"","order":5,"children":[]}]},{"title":"Patient Records and Documentation","description":"","order":3,"children":[{"title":"Statutory Requirements for Record Keeping","description":"","order":1,"children":[]},{"title":"Contemporaneous Records","description":"","order":2,"children":[]},{"title":"Keeping Records up to Date","description":"","order":3,"children":[]},{"title":"Quiz: Patient Records","description":"","order":4,"children":[]},{"title":"Module Summary:","description":"","order":5,"children":[]}]},{"title":"Patient Confidentiality","description":"","order":4,"children":[{"title":"Confidentiality and the Duty of Confidence","description":"","order":1,"children":[]},{"title":"The Confidentiality Model","description":"","order":2,"children":[]},{"title":"Considerations with Disclosure","description":"","order":3,"children":[]},{"title":"Quiz; Patient Confidentiality","description":"","order":4,"children":[]},{"title":"Module Summary:","description":"","order":5,"children":[]}]},{"title":"Professional Ethics","description":"","order":5,"children":[{"title":"Ethics: An Overview","description":"","order":1,"children":[]},{"title":"Ethics in Prescribing Practice","description":"","order":2,"children":[]},{"title":"Prescribing Dilemmas and Issues","description":"","order":3,"children":[]},{"title":"Quiz: Professional Ethics","description":"","order":4,"children":[]},{"title":"Module Summary:","description":"","order":5,"children":[]}]}]}]
        JSON;
        $this->recursivelySaveResources(json_decode($resources_json, true), null);

        abort_unless(Resource::count() == 100, 500);

        $users_json = <<<'JSON'
            [{"name":"Jasmin Schumm","pc_complete":64},{"name":"Lukas Haley","pc_complete":90},{"name":"Deja Jerde","pc_complete":78},{"name":"Mr. Dallas Gulgowski I","pc_complete":100},{"name":"Jarrod Littel","pc_complete":80},{"name":"Owen Olson II","pc_complete":95},{"name":"Ms. Mae Kunze DDS","pc_complete":62},{"name":"Verdie O'Conner II","pc_complete":84},{"name":"Albertha Crona","pc_complete":100},{"name":"Luella Ondricka","pc_complete":68}]
        JSON;

        foreach (json_decode($users_json, true) as $user_detail) {
            $user = User::create([
                'name' => $user_detail['name'],
                'email' => Str::slug($user_detail['name']) . '@example.com',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
                'created_at' => now()->subYears(2),
                'updated_at' => now()->subYears(2)
            ]);

            $percentage_this_user_should_complete = $user_detail['pc_complete'];

            $startCount = 0;

            // Work through the resources, and for the percentage complete mentioned above,
            // mark as many of them as complete as needed.
            // Start from 1 year ago and randomly one day each time a resource is completed.
            $this->recursivelyCreateProgression(
                $user,
                Resource::query()->whereNull('parent_resource_id')->orderBy('order')->get(),
                null,
                $percentage_this_user_should_complete,
                $startCount,
                now()->subYear(),
            );
        }
    }

    public function recursivelySaveResources(array $resources, $parent_resource_id = null)
    {
        foreach ($resources as $resource) {
            $newResource = Resource::create([
                'title' => $resource['title'],
                'type' => 'resource',
                'description' => $resource['description'],
                'order' => $resource['order'],
                'parent_resource_id' => $parent_resource_id,
                'created_at' => now()->subYears(2),
                'updated_at' => now()->subYears(2)
            ]);

            if (!empty($resource['children']) > 0) {
                $this->recursivelySaveResources($resource['children'], $newResource->id);
            }
        }
    }

    private function recursivelyCreateProgression($user, $resources, $parent_id, $percentage_target, &$current_count, $date)
    {
        foreach ($resources as $resource) {
            if ($current_count >= $percentage_target) {
                return;
            }

            ProgressionItem::create([
                'resource_id' => $resource->id,
                'user_id' => $user->id,
                'created_at' => $date,
                'updated_at' => $date
            ]);

            $current_count++;

            if (rand(0, 1) == 1) {
                $date->addDay();
            }

            $children = Resource::query()->where('parent_resource_id', $resource->id);

            if ($children->count() > 0) {
                $this->recursivelyCreateProgression($user, $children->get(), $resource->id, $percentage_target, $current_count, $date);
            }
        }
    }
}
