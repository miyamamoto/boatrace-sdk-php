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
                technique             integer,
                arrival_1_arrival     integer,
                arrival_2_arrival     integer,
                arrival_3_arrival     integer,
                arrival_4_arrival     integer,
                arrival_5_arrival     integer,
                arrival_6_arrival     integer,
                arrival_1_racer_id    integer,
                arrival_2_racer_id    integer,
                arrival_3_racer_id    integer,
                arrival_4_racer_id    integer,
                arrival_5_racer_id    integer,
                arrival_6_racer_id    integer,
                arrival_1_frame       integer,
                arrival_2_frame       integer,
                arrival_3_frame       integer,
                arrival_4_frame       integer,
                arrival_5_frame       integer,
                arrival_6_frame       integer,
                course_1_racer_id     integer,
                course_2_racer_id     integer,
                course_3_racer_id     integer,
                course_4_racer_id     integer,
                course_5_racer_id     integer,
                course_6_racer_id     integer,
                course_1_frame        integer,
                course_2_frame        integer,
                course_3_frame        integer,
                course_4_frame        integer,
                course_5_frame        integer,
                course_6_frame        integer,
                course_1_start_timing integer,
                course_2_start_timing integer,
                course_3_start_timing integer,
                course_4_start_timing integer,
                course_5_start_timing integer,
                course_6_start_timing integer,
                weather               integer,
                wind                  integer,
                wave                  integer,
                temperature           numeric,
                water_temperature     numeric
            );
        ');
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions)
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
                $frames = [
                    $races['arrival'][0]['frame'] => ['racerId' => $races['arrival'][0]['racerId']],
                    $races['arrival'][1]['frame'] => ['racerId' => $races['arrival'][1]['racerId']],
                    $races['arrival'][2]['frame'] => ['racerId' => $races['arrival'][2]['racerId']],
                    $races['arrival'][3]['frame'] => ['racerId' => $races['arrival'][3]['racerId']],
                    $races['arrival'][4]['frame'] => ['racerId' => $races['arrival'][4]['racerId']],
                    $races['arrival'][5]['frame'] => ['racerId' => $races['arrival'][5]['racerId']],
                ];

                if (! ksort($frames)) {
                    continue;
                }

                $storeData[] = [
                    'date'                  => $races['basic']['date'] ?? null,
                    'place_id'              => $placeId ?? null,
                    'race_id'               => $raceId ?? null,
                    'arrival_1_arrival'     => $races['arrival'][0]['arrival'] ?? null,
                    'arrival_2_arrival'     => $races['arrival'][1]['arrival'] ?? null,
                    'arrival_3_arrival'     => $races['arrival'][2]['arrival'] ?? null,
                    'arrival_4_arrival'     => $races['arrival'][3]['arrival'] ?? null,
                    'arrival_5_arrival'     => $races['arrival'][4]['arrival'] ?? null,
                    'arrival_6_arrival'     => $races['arrival'][5]['arrival'] ?? null,
                    'arrival_1_racer_id'    => $races['arrival'][0]['racerId'] ?? null,
                    'arrival_2_racer_id'    => $races['arrival'][1]['racerId'] ?? null,
                    'arrival_3_racer_id'    => $races['arrival'][2]['racerId'] ?? null,
                    'arrival_4_racer_id'    => $races['arrival'][3]['racerId'] ?? null,
                    'arrival_5_racer_id'    => $races['arrival'][4]['racerId'] ?? null,
                    'arrival_6_racer_id'    => $races['arrival'][5]['racerId'] ?? null,
                    'arrival_1_frame'       => $races['arrival'][0]['frame'] ?? null,
                    'arrival_2_frame'       => $races['arrival'][1]['frame'] ?? null,
                    'arrival_3_frame'       => $races['arrival'][2]['frame'] ?? null,
                    'arrival_4_frame'       => $races['arrival'][3]['frame'] ?? null,
                    'arrival_5_frame'       => $races['arrival'][4]['frame'] ?? null,
                    'arrival_6_frame'       => $races['arrival'][5]['frame'] ?? null,
                    'course_1_racer_id'     => $frames[$races['course'][0]['frame'] ?? null]['racerId'] ?? null,
                    'course_2_racer_id'     => $frames[$races['course'][1]['frame'] ?? null]['racerId'] ?? null,
                    'course_3_racer_id'     => $frames[$races['course'][2]['frame'] ?? null]['racerId'] ?? null,
                    'course_4_racer_id'     => $frames[$races['course'][3]['frame'] ?? null]['racerId'] ?? null,
                    'course_5_racer_id'     => $frames[$races['course'][4]['frame'] ?? null]['racerId'] ?? null,
                    'course_6_racer_id'     => $frames[$races['course'][5]['frame'] ?? null]['racerId'] ?? null,
                    'course_1_frame'        => $races['course'][0]['frame'] ?? null,
                    'course_2_frame'        => $races['course'][1]['frame'] ?? null,
                    'course_3_frame'        => $races['course'][2]['frame'] ?? null,
                    'course_4_frame'        => $races['course'][3]['frame'] ?? null,
                    'course_5_frame'        => $races['course'][4]['frame'] ?? null,
                    'course_6_frame'        => $races['course'][5]['frame'] ?? null,
                    'course_1_start_timing' => $races['course'][0]['startTiming'] ?? null,
                    'course_2_start_timing' => $races['course'][1]['startTiming'] ?? null,
                    'course_3_start_timing' => $races['course'][2]['startTiming'] ?? null,
                    'course_4_start_timing' => $races['course'][3]['startTiming'] ?? null,
                    'course_5_start_timing' => $races['course'][4]['startTiming'] ?? null,
                    'course_6_start_timing' => $races['course'][5]['startTiming'] ?? null,
                    'weather'               => $races['weather']['weather'] ?? null,
                    'wind'                  => $races['weather']['wind'] ?? null,
                    'wave'                  => $races['weather']['wave'] ?? null,
                    'temperature'           => $races['weather']['temperature'] ?? null,
                    'water_temperature'     => $races['weather']['waterTemperature'] ?? null,
                    'technique'             => $races['basic']['technique'] ?? null,
                ];
            }
        }

        $this->connect()->table('results')->insert($storeData);
    }
}
