<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceResultDatabase extends Database
{
    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @return void
     */
    public function create()
    {
        $this->connect()->statement('
            create table if not exists results (
                id                    bigserial primary key,
                date                  integer,
                place_id              integer,
                race_id               integer,
                technique             text,
                arrival_1_frame       integer,
                arrival_2_frame       integer,
                arrival_3_frame       integer,
                arrival_4_frame       integer,
                arrival_5_frame       integer,
                arrival_6_frame       integer,
                course_1_frame        integer,
                course_2_frame        integer,
                course_3_frame        integer,
                course_4_frame        integer,
                course_5_frame        integer,
                course_6_frame        integer,
                course_1_start_timing text,
                course_2_start_timing text,
                course_3_start_timing text,
                course_4_start_timing text,
                course_5_start_timing text,
                course_6_start_timing text,
                weather               text,
                wind                  text,
                wave                  text,
                temperature           text,
                water_temperature     text
            );
        ');
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions = [])
    {
        $response = $this->connect()->table('results');
        foreach ($conditions as $k => $v) {
            $response->where($k, $v);
        }

        return $this->toArray($response->orderBy('date', 'desc')->get());
    }

    /**
     * @param  array $data
     * @return void
     */
    public function store(array $data)
    {
        $storeData = [];

        foreach ($data as $placeId => $places) {
            foreach ($places as $raceId => $races) {
                $storeData[] = [
                    'date'                  => $races['basic']['date'],
                    'place_id'              => $placeId,
                    'race_id'               => $raceId,
                    'arrival_1_frame'       => $races['arrival'][0]['frame'],
                    'arrival_2_frame'       => $races['arrival'][1]['frame'],
                    'arrival_3_frame'       => $races['arrival'][2]['frame'],
                    'arrival_4_frame'       => $races['arrival'][3]['frame'],
                    'arrival_5_frame'       => $races['arrival'][4]['frame'],
                    'arrival_6_frame'       => $races['arrival'][5]['frame'],
                    'course_1_frame'        => $races['course'][0]['frame'],
                    'course_2_frame'        => $races['course'][1]['frame'],
                    'course_3_frame'        => $races['course'][2]['frame'],
                    'course_4_frame'        => $races['course'][3]['frame'],
                    'course_5_frame'        => $races['course'][4]['frame'],
                    'course_6_frame'        => $races['course'][5]['frame'],
                    'course_1_start_timing' => $races['course'][0]['startTiming'],
                    'course_2_start_timing' => $races['course'][1]['startTiming'],
                    'course_3_start_timing' => $races['course'][2]['startTiming'],
                    'course_4_start_timing' => $races['course'][3]['startTiming'],
                    'course_5_start_timing' => $races['course'][4]['startTiming'],
                    'course_6_start_timing' => $races['course'][5]['startTiming'],
                    'weather'               => $races['weather']['weather'],
                    'wind'                  => $races['weather']['wind'],
                    'wave'                  => $races['weather']['wave'],
                    'temperature'           => $races['weather']['temperature'],
                    'water_temperature'     => $races['weather']['waterTemperature'],
                    'technique'             => $races['basic']['technique'],
                ];
            }
        }

        $this->connect()->table('results')->insert($storeData);
    }
}
