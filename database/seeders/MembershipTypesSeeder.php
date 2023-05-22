<?php

namespace Database\Seeders;

use App\Models\MembershipTypes;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MembershipTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        MembershipTypes::insert(['title'=>'Regular Member','description'=>'Subscription/fee for alumni living in Bangladesh will be BDT 1,000.00 (one thousand taka) and for overseas alumni will be USD 20.00 (twenty US dollars) only for 2 (two) years. The renewal fee (after two years) will be BDT 500.00/ USD 10.00 per year.','registration_fees'=>'1000','fees_bdt'=>'500','fees_usd'=>'10']);

        MembershipTypes::insert(['title'=>'Life Member','description'=>'For an Alumni living inside and outside Bangladesh, the subscription/fees shall be BDT 10,000.00 (ten thousand taka) and USD 100.00 (one hundred US dollars) respectively at a time.','registration_fees'=>'1000','fees_bdt'=>'10000','fees_usd'=>'100']);

        MembershipTypes::insert(['title'=>'Honorary Life Member','description'=>'A distinguished person may be conferred the Honorary Life Membership of the association on recognition of his/her long and distinguished/outstanding/eminent/ services to the cause of humanity, culture, education and national welfare. The Executive Committee may if necessary, grant honorary membership to non-alumni who are instrumental in the development/expansion of the dignity and interests of the association, donors eminent person.','registration_fees'=>'1000','fees_bdt'=>'0','fees_usd'=>'0']);

        MembershipTypes::insert(['title'=>'Donor Member','description'=>'An alumni donating at least BDT 1,00,000.00 (one lac taka) or more at a time shall be offered Donor Membership. A non-Alumni donating the same amount shall be offered Associate donor membership.','registration_fees'=>'1000','fees_bdt'=>'100000','fees_usd'=>'1000']);
    }
}
