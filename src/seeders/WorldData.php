<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\City;
use App\Models\State;
use App\Models\Country;

use File;

class WorldData extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	ini_set("memory_limit","256M");
        // Read JSON file
		$world = File::get(base_path("vendor/dgera/world-data-repo/src/seeders/world_data.json"));

		//Decode JSON
		$world = json_decode($world,true);
		foreach ($world as $key => $value) {
			$country = Country::find($world[$key]['id']);
			if(!$country){
				$country = new Country;
				$country->id = $world[$key]['id'];
			}
			$country->iso2 = $world[$key]["iso2"];
			$country->iso3 = $world[$key]["iso3"];
			$country->name = $world[$key]["name"];
			$country->phonedigit = $world[$key]["phonedigit"];
			$country->capital = $world[$key]["capital"];
			$country->currency = $world[$key]["currency"];
			$country->phonecode = $world[$key]["phone_code"];
			$country->save();
			if(count($value['states']) > 0){
				foreach ($value['states'] as $k => $v) {
					$state = State::find($value['states'][$k]['id']);
					if(!$state){
						$state = new State;
						$state->id = $value['states'][$k]['id'];
					}
					$state->name = $value['states'][$k]['name'];
					$state->state_code = $value['states'][$k]['state_code'];
					$state->country_id = $world[$key]['id'];
					$state->save();
					if(count($value['states'][$k]['cities']) > 0){
						foreach ($value['states'][$k]['cities'] as $i => $c) {
							$city = City::find($value['states'][$k]['cities'][$i]['id']);
							if(!$city){
								$city = new City;
								$city->id = $value['states'][$k]['cities'][$i]['id'];
							}
							$city->name = $value['states'][$k]['cities'][$i]['name'];
							$city->state_id = $value['states'][$k]['id'];
							$city->save();
						}
					}
				}
			}
		}
		$jsondata = json_encode($world, JSON_PRETTY_PRINT);
	   
		//write json data into data.json file
		if(file_put_contents('database/world_data.json', $jsondata)) {
			echo 'Data successfully saved';
		}
		else{ 
			echo "error";
		}

    }
}
