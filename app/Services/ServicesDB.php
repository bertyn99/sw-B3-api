<?php

namespace App\Services ;

use GuzzleHttp\Client ; 
use Illuminate\Support\Facades\Http;

class ServicesDB 
{
    protected $url ;
    protected $http;

    public function __construct()
    {
        $this->url = 'http://swapi.dev/api' ;
        $this->http = new Client() ;
        
    }

    public function getData(String $uri )
    {
        $full_path = $this->url;
        $full_path .= $uri;
        $response = $this->http->get($full_path, [
            'timeout'         => 30,
            'connect_timeout' => true,
            'http_errors'     => true,
        ]); 
        return $response->getBody()->getContents() ;
    
    }

    public function parseData ()
    {

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
                    $people->skin_color = $object->skin_color;
                    $people->homeworld = parseLink($object->homeworld);
                    $people->url = $object->url;
                    
                    $people->save();
                }
            break;
            case 'specie': 
                foreach($tableau as $object){
                    $specie = new Specie;
                    $specie->classification = $object->classification;
                    $specie->designation = $object->designation;
                    $specie->height_average = $object->average_height;
                    $specie->hair_color = $object->hair_color;
                    $specie->eye_colors = $object->eye_colors;
                    $specie->average_life = $object->average_lifespan;
                    $specie->language = $object->language;
                    $specie->skin_colors = $object->skin_colors;
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
                    $vehicle->cost_in_credit = $object->cost_in_credits;
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
      $this->parseData($data);
    }
}









