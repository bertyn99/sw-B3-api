<?php

namespace App\Services ;

use GuzzleHttp\Client ; 
use Illuminate\Support\Facades\Http;
use App\Models\Film;
use App\Models\People;
use App\Models\Planet;
use App\Models\Specie;
use App\Models\Starship;
use App\Models\Vehicle;

class ServicesDB 
{
    protected $url ;
    protected $http;

    public function __construct()
    {
        $this->url = 'http://swapi.dev/api' ;
        $this->http = new Client() ;
        
    }
    public function parseLink ($link)
    {
        if(!is_null($link)){
            $linkExploded = explode("/", $link);
            return $linkExploded[count($linkExploded) - 2];
        }
        else{
            return null;
        }
         
    }
    public function parseUrl ($url){
        $env = env('APP_URL');
        $urlExploded = explode("/", $url);

        $urlReturn = $env.'/'.$urlExploded[count($urlExploded)-3].'/'.$urlExploded[count($urlExploded)-2].'/'.$urlExploded[count($urlExploded)-1].'/';
        return $urlReturn;
    }

    public function getData(String $uri )
    {
        $full_path = $this->url;
        $full_path .= $uri;
        $response = $this->http->get($full_path, [
            'verify' => false,
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]); 
        return $response->getBody()->getContents() ;
    
    }

    public function parseData (String $data)
    {
        $parsedData = json_decode($data);
        return $parsedData->results;
    }

    public function saveToBDD ($tableau, $nomTable)
    {
        switch($nomTable){
            case 'film': 
                foreach($tableau as $object){
                    $film = new Film;
                    $film->title = $object->title;
                    $film->episode_id = $object->episode_id;
                    $film->opening_crawl = $object->opening_crawl;
                    $film->director = $object->director;
                    $film->producer = $object->producer;
                    $film->release_date = $object->release_date;
                    $film->url = $object->url;
                    $film->save();
                }
            break;
            case 'people': 
                
                foreach($tableau as $object){
                    $people = new People;
                    $people->name = $object->name;
                    $people->birth_year = $object->birth_year;
                    $people->eye_color = $object->eye_color;
                    $people->hair_color = $object->hair_color;
                    $people->height = $object->height;
                    $people->mass = $object->mass;
                    $people->gender = $object->gender;
                    $people->skin_color = $object->skin_color;
                    $people->homeworld = $this->parseLink($object->homeworld);
                    $people->url = $object->url;
                    
                    $people->save();
                }
            break;
            case 'specie': 
                foreach($tableau as $object){
                    $specie = new Specie;
                    $specie->name = $object->name;
                    $specie->classification = $object->classification;
                    $specie->designation = $object->designation;
                    $specie->height_average = $object->average_height;
                    $specie->hair_colors = $object->hair_colors;
                    $specie->eye_colors = $object->eye_colors;
                    $specie->average_life = $object->average_lifespan;
                    $specie->language = $object->language;
                    $specie->skin_colors = $object->skin_colors;
                    $specie->homeworld = $this->parseLink($object->homeworld);
                    $specie->url = $object->url;
                    $specie->save();
                }
            break;
            case 'starship': 
                foreach($tableau as $object){
                    $starship = new Starship;
                    $starship->name = $object->name;
                    $starship->model = $object->model;
                    $starship->manufacturer = $object->manufacturer;
                    $starship->cost_in_credits = $object->cost_in_credits;
                    $starship->length = $object->length;
                    $starship->crew = $object->crew;
                    $starship->passengers = $object->passengers;
                    $starship->max_atmosphering_speed = $object->max_atmosphering_speed;
                    $starship->hyperdrive_rating = $object->hyperdrive_rating;
                    $starship->MGLT = $object->MGLT;
                    $starship->cargo_capacity = $object->cargo_capacity;
                    $starship->consumables = $object->consumables;
                    $starship->starship_class = $object->starship_class;
                    $starship->url = $object->url;
                    $starship->save();
                }
            break;
            case 'planet': 
                foreach($tableau as $object){
                    $planet = new Planet;
                    $planet->name = $object->name;
                    $planet->diameter = $object->diameter;
                    $planet->rotation_period = $object->rotation_period;
                    $planet->orbital_period = $object->orbital_period;
                    $planet->gravity = $object->gravity;
                    $planet->population = $object->population;
                    $planet->climate = $object->climate;
                    $planet->terrain = $object->terrain;
                    $planet->surface_water = $object->surface_water;
                    $planet->url = $object->url;
                    $planet->save();
                }
            break;
            case 'vehicle': 
                foreach($tableau as $object){
                    $vehicle = new Vehicle;
                    $vehicle->name = $object->name;
                    $vehicle->model = $object->model;
                    $vehicle->vehicle_class = $object->vehicle_class;
                    $vehicle->manufactor = $object->manufacturer;
                    $vehicle->lenght = $object->length;
                    $vehicle->cost_in_credits = $object->cost_in_credits;
                    $vehicle->crew = $object->crew;
                    $vehicle->passenger = $object->passengers;
                    $vehicle->max_atmosphere = $object->max_atmosphering_speed;
                    $vehicle->cargo_capacity = $object->cargo_capacity;
                    $vehicle->consumables = $object->consumables;
                    $vehicle->url = $object->url;
                    $vehicle->save();
                }
            break;
            default: 
                return;
            break;
        }
    }
    public function init ()
    {
        $data = $this->getData("/films");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'film');

        $data = $this->getData("/people");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'people');

        $data = $this->getData("/planets");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'planet');

        $data = $this->getData("/species");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'specie');

        $dta = $this->getData("/starships");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'starship');

        $data = $this->getData("/vehicles");
        $data = $this->parseData($data);
        $this->saveToBDD($data, 'vehicle');
    }
}









