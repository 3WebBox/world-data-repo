<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Request;

use App\Models\City;
use App\Models\Country;
use App\Models\State;

class WorldController extends Controller
{
    /**
    * Get List of Countries
    */
    public function getCountries(){
        if(request()->searchTerm){
            $countries = Country::where('name','LIKE','%'.request()->searchTerm.'%')->get();
        }
        else{
            $countries = Country::get();
        }
        # States Found
        return response()->json([
	            "status"       =>  "success",
	            "message"      =>  trans('messages.country_found_success'),
	            "countries"    =>  $countries
	        ],200,[],JSON_NUMERIC_CHECK
	    );
    }

    /**
    * Get List of States
    */
    public function getStates( $countryId ){
        $states = State::where('country_id','=',$countryId);
        if(request()->searchTerm){
            $states->where('name','LIKE','%'.request()->searchTerm.'%');
        }
        $states = $states->get();
        # States Found
        if(count($states)){
            $message = trans('messages.state_found_success');
        }else{
            $message = trans('messages.state_found_fail');
        }
        return response()->json([
	            "status"   =>  "success",
	            "message"  =>  $message,
	            "states"   =>  $states
	        ],200,[],JSON_NUMERIC_CHECK
	    );
    }

    /**
    * Get List of Cities
    */
    public function getCities( $id , $from = 'state' ){
        if($from === 'state'){
            $cities = City::where('cities.state_id','=',$id);
        }
        else{
            $cities = City::join('states','states.id','=','cities.state_id')
                            ->join('countries','states.country_id','=','countries.id')
                            ->where('countries.id','=',$id);
        }
        if(request()->searchTerm){
            $cities->where('cities.name','LIKE','%'.request()->searchTerm.'%');
        }
        $cities = $cities->select('cities.*')->get();
        # Cities Found
        if(count($cities)){
            $message = trans('messages.city_found_success');
        }
        else{
            $message = trans('messages.city_found_fail');
        }
        return response()->json([
                "status"    =>  "success",
                "message"   =>  $message,
                "cities"    =>  $cities
            ],200,[],JSON_NUMERIC_CHECK
        );
    }
}
