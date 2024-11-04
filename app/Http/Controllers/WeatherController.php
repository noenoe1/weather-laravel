<?php

namespace App\Http\Controllers;

use App\Models\Weather;
use Illuminate\Http\Request;

class WeatherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $weathers = Weather::latest()->get();

        return inertia('weather/Index', compact('weathers'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return inertia('weather/Add');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'name' => 'required',
        ]);
        $city = $request->name;
        $getapi = 'https://api.openweathermap.org/data/2.5/weather?q='.$city.'&appid=69f64af565fc8f21873015ba71db4e9e';
        $context=stream_context_create(array(
            'http' => array('ignore_errors' => true),
        ));
        $data = file_get_contents($getapi,false,$context);
        $val = json_decode($data,true);
        if($val['cod'] == 200) {
            $temperature = $val['main']['temp'].' °C';
            $weather_description = $val['weather'][0]['description'];
            $weather = new Weather;
            $weather->name = $city;
            $weather->temperature = $temperature;
            $weather->description = $weather_description;
            $weather->save();
            $request->session()->flash('message', 'Weather has been added successful!');
        }
        elseif($val['cod'] == 404) {
            //city not found error
            $request->session()->flash('message', $val['message']);
        }
        else {
            //401 Invalid APi key
            $request->session()->flash('message', $val['message']);
        }
        
        return redirect()->route('weathers.index');    

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function show(Weather $weather)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function edit(Weather $weather)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Weather $weather)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Weather  $weather
     * @return \Illuminate\Http\Response
     */
    public function destroy(Weather $weather)
    {
        //
    }
}
