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
                date                  integer   not null,
                place_id              integer   not null,
                race_id               integer   not null,
                technique             text      not null,
                arrival_1_frame       integer   not null,
                arrival_2_frame       integer   not null,
                arrival_3_frame       integer   not null,
                arrival_4_frame       integer   not null,
                arrival_5_frame       integer   not null,
                arrival_6_frame       integer   not null,
                course_1_frame        integer   not null,
                course_2_frame        integer   not null,
                course_3_frame        integer   not null,
                course_4_frame        integer   not null,
                course_5_frame        integer   not null,
                course_6_frame        integer   not null,
                course_1_start_timing text      not null,
                course_2_start_timing text      not null,
                course_3_start_timing text      not null,
                course_4_start_timing text      not null,
                course_5_start_timing text      not null,
                course_6_start_timing text      not null,
                weather               text      not null,
                wind                  text      not null,
                wave                  text      not null,
                temperature           text      not null,
                water_temperature     text      not null
            );
        ');
    }

    /**
     * @return array
     */
    public function get()
    {
        return $this->toArray($this->connect()->table('results')->get());
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
