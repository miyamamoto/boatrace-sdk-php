<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceProgramDatabase extends Database
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
            create table if not exists programs (
                id                              bigserial primary key,
                date                            integer,
                place_id                        integer,
                place_name                      text,
                race_id                         integer,
                race_name                       text,
                race_type                       text,
                race_distance                   integer,
                frame_1_racer_id                integer,
                frame_2_racer_id                integer,
                frame_3_racer_id                integer,
                frame_4_racer_id                integer,
                frame_5_racer_id                integer,
                frame_6_racer_id                integer,
                frame_1_racer_name              text,
                frame_2_racer_name              text,
                frame_3_racer_name              text,
                frame_4_racer_name              text,
                frame_5_racer_name              text,
                frame_6_racer_name              text,
                frame_1_racer_rank              text,
                frame_2_racer_rank              text,
                frame_3_racer_rank              text,
                frame_4_racer_rank              text,
                frame_5_racer_rank              text,
                frame_6_racer_rank              text,
                frame_1_racer_branch            text,
                frame_2_racer_branch            text,
                frame_3_racer_branch            text,
                frame_4_racer_branch            text,
                frame_5_racer_branch            text,
                frame_6_racer_branch            text,
                frame_1_racer_graduate          text,
                frame_2_racer_graduate          text,
                frame_3_racer_graduate          text,
                frame_4_racer_graduate          text,
                frame_5_racer_graduate          text,
                frame_6_racer_graduate          text,
                frame_1_racer_age               integer,
                frame_2_racer_age               integer,
                frame_3_racer_age               integer,
                frame_4_racer_age               integer,
                frame_5_racer_age               integer,
                frame_6_racer_age               integer,
                frame_1_racer_weight            numeric,
                frame_2_racer_weight            numeric,
                frame_3_racer_weight            numeric,
                frame_4_racer_weight            numeric,
                frame_5_racer_weight            numeric,
                frame_6_racer_weight            numeric,
                frame_1_racer_flying            integer,
                frame_2_racer_flying            integer,
                frame_3_racer_flying            integer,
                frame_4_racer_flying            integer,
                frame_5_racer_flying            integer,
                frame_6_racer_flying            integer,
                frame_1_racer_late              integer,
                frame_2_racer_late              integer,
                frame_3_racer_late              integer,
                frame_4_racer_late              integer,
                frame_5_racer_late              integer,
                frame_6_racer_late              integer,
                frame_1_racer_nationwide_rate_1 numeric,
                frame_2_racer_nationwide_rate_1 numeric,
                frame_3_racer_nationwide_rate_1 numeric,
                frame_4_racer_nationwide_rate_1 numeric,
                frame_5_racer_nationwide_rate_1 numeric,
                frame_6_racer_nationwide_rate_1 numeric,
                frame_1_racer_nationwide_rate_2 numeric,
                frame_2_racer_nationwide_rate_2 numeric,
                frame_3_racer_nationwide_rate_2 numeric,
                frame_4_racer_nationwide_rate_2 numeric,
                frame_5_racer_nationwide_rate_2 numeric,
                frame_6_racer_nationwide_rate_2 numeric,
                frame_1_racer_nationwide_rate_3 numeric,
                frame_2_racer_nationwide_rate_3 numeric,
                frame_3_racer_nationwide_rate_3 numeric,
                frame_4_racer_nationwide_rate_3 numeric,
                frame_5_racer_nationwide_rate_3 numeric,
                frame_6_racer_nationwide_rate_3 numeric,
                frame_1_racer_local_rate_1      numeric,
                frame_2_racer_local_rate_1      numeric,
                frame_3_racer_local_rate_1      numeric,
                frame_4_racer_local_rate_1      numeric,
                frame_5_racer_local_rate_1      numeric,
                frame_6_racer_local_rate_1      numeric,
                frame_1_racer_local_rate_2      numeric,
                frame_2_racer_local_rate_2      numeric,
                frame_3_racer_local_rate_2      numeric,
                frame_4_racer_local_rate_2      numeric,
                frame_5_racer_local_rate_2      numeric,
                frame_6_racer_local_rate_2      numeric,
                frame_1_racer_local_rate_3      numeric,
                frame_2_racer_local_rate_3      numeric,
                frame_3_racer_local_rate_3      numeric,
                frame_4_racer_local_rate_3      numeric,
                frame_5_racer_local_rate_3      numeric,
                frame_6_racer_local_rate_3      numeric,
                frame_1_motor_number            integer,
                frame_2_motor_number            integer,
                frame_3_motor_number            integer,
                frame_4_motor_number            integer,
                frame_5_motor_number            integer,
                frame_6_motor_number            integer,
                frame_1_motor_rate_2            numeric,
                frame_2_motor_rate_2            numeric,
                frame_3_motor_rate_2            numeric,
                frame_4_motor_rate_2            numeric,
                frame_5_motor_rate_2            numeric,
                frame_6_motor_rate_2            numeric,
                frame_1_motor_rate_3            numeric,
                frame_2_motor_rate_3            numeric,
                frame_3_motor_rate_3            numeric,
                frame_4_motor_rate_3            numeric,
                frame_5_motor_rate_3            numeric,
                frame_6_motor_rate_3            numeric,
                frame_1_boat_number             integer,
                frame_2_boat_number             integer,
                frame_3_boat_number             integer,
                frame_4_boat_number             integer,
                frame_5_boat_number             integer,
                frame_6_boat_number             integer,
                frame_1_boat_rate_2             numeric,
                frame_2_boat_rate_2             numeric,
                frame_3_boat_rate_2             numeric,
                frame_4_boat_rate_2             numeric,
                frame_5_boat_rate_2             numeric,
                frame_6_boat_rate_2             numeric,
                frame_1_boat_rate_3             numeric,
                frame_2_boat_rate_3             numeric,
                frame_3_boat_rate_3             numeric,
                frame_4_boat_rate_3             numeric,
                frame_5_boat_rate_3             numeric,
                frame_6_boat_rate_3             numeric
            );
        ');
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions)
    {
        $response = $this->connect()->table('programs');
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
                    'date'                            => $races['basic']['date'],
                    'place_id'                        => $placeId,
                    'place_name'                      => $races['basic']['place'],
                    'race_id'                         => $raceId,
                    'race_name'                       => $races['basic']['name'],
                    'race_type'                       => $races['basic']['type'],
                    'race_distance'                   => $races['basic']['distance'],
                    'frame_1_racer_id'                => $races['racer'][0]['id'],
                    'frame_2_racer_id'                => $races['racer'][1]['id'],
                    'frame_3_racer_id'                => $races['racer'][2]['id'],
                    'frame_4_racer_id'                => $races['racer'][3]['id'],
                    'frame_5_racer_id'                => $races['racer'][4]['id'],
                    'frame_6_racer_id'                => $races['racer'][5]['id'],
                    'frame_1_racer_name'              => $races['racer'][0]['name'],
                    'frame_2_racer_name'              => $races['racer'][1]['name'],
                    'frame_3_racer_name'              => $races['racer'][2]['name'],
                    'frame_4_racer_name'              => $races['racer'][3]['name'],
                    'frame_5_racer_name'              => $races['racer'][4]['name'],
                    'frame_6_racer_name'              => $races['racer'][5]['name'],
                    'frame_1_racer_rank'              => $races['racer'][0]['rank'],
                    'frame_2_racer_rank'              => $races['racer'][1]['rank'],
                    'frame_3_racer_rank'              => $races['racer'][2]['rank'],
                    'frame_4_racer_rank'              => $races['racer'][3]['rank'],
                    'frame_5_racer_rank'              => $races['racer'][4]['rank'],
                    'frame_6_racer_rank'              => $races['racer'][5]['rank'],
                    'frame_1_racer_branch'            => $races['racer'][0]['branch'],
                    'frame_2_racer_branch'            => $races['racer'][1]['branch'],
                    'frame_3_racer_branch'            => $races['racer'][2]['branch'],
                    'frame_4_racer_branch'            => $races['racer'][3]['branch'],
                    'frame_5_racer_branch'            => $races['racer'][4]['branch'],
                    'frame_6_racer_branch'            => $races['racer'][5]['branch'],
                    'frame_1_racer_graduate'          => $races['racer'][0]['graduate'],
                    'frame_2_racer_graduate'          => $races['racer'][1]['graduate'],
                    'frame_3_racer_graduate'          => $races['racer'][2]['graduate'],
                    'frame_4_racer_graduate'          => $races['racer'][3]['graduate'],
                    'frame_5_racer_graduate'          => $races['racer'][4]['graduate'],
                    'frame_6_racer_graduate'          => $races['racer'][5]['graduate'],
                    'frame_1_racer_age'               => $races['racer'][0]['age'],
                    'frame_2_racer_age'               => $races['racer'][1]['age'],
                    'frame_3_racer_age'               => $races['racer'][2]['age'],
                    'frame_4_racer_age'               => $races['racer'][3]['age'],
                    'frame_5_racer_age'               => $races['racer'][4]['age'],
                    'frame_6_racer_age'               => $races['racer'][5]['age'],
                    'frame_1_racer_weight'            => $races['racer'][0]['weight'],
                    'frame_2_racer_weight'            => $races['racer'][1]['weight'],
                    'frame_3_racer_weight'            => $races['racer'][2]['weight'],
                    'frame_4_racer_weight'            => $races['racer'][3]['weight'],
                    'frame_5_racer_weight'            => $races['racer'][4]['weight'],
                    'frame_6_racer_weight'            => $races['racer'][5]['weight'],
                    'frame_1_racer_flying'            => $races['racer'][0]['flying'],
                    'frame_2_racer_flying'            => $races['racer'][1]['flying'],
                    'frame_3_racer_flying'            => $races['racer'][2]['flying'],
                    'frame_4_racer_flying'            => $races['racer'][3]['flying'],
                    'frame_5_racer_flying'            => $races['racer'][4]['flying'],
                    'frame_6_racer_flying'            => $races['racer'][5]['flying'],
                    'frame_1_racer_late'              => $races['racer'][0]['late'],
                    'frame_2_racer_late'              => $races['racer'][1]['late'],
                    'frame_3_racer_late'              => $races['racer'][2]['late'],
                    'frame_4_racer_late'              => $races['racer'][3]['late'],
                    'frame_5_racer_late'              => $races['racer'][4]['late'],
                    'frame_6_racer_late'              => $races['racer'][5]['late'],
                    'frame_1_racer_nationwide_rate_1' => $races['racer'][0]['nationwideRate1'],
                    'frame_2_racer_nationwide_rate_1' => $races['racer'][1]['nationwideRate1'],
                    'frame_3_racer_nationwide_rate_1' => $races['racer'][2]['nationwideRate1'],
                    'frame_4_racer_nationwide_rate_1' => $races['racer'][3]['nationwideRate1'],
                    'frame_5_racer_nationwide_rate_1' => $races['racer'][4]['nationwideRate1'],
                    'frame_6_racer_nationwide_rate_1' => $races['racer'][5]['nationwideRate1'],
                    'frame_1_racer_nationwide_rate_2' => $races['racer'][0]['nationwideRate2'],
                    'frame_2_racer_nationwide_rate_2' => $races['racer'][1]['nationwideRate2'],
                    'frame_3_racer_nationwide_rate_2' => $races['racer'][2]['nationwideRate2'],
                    'frame_4_racer_nationwide_rate_2' => $races['racer'][3]['nationwideRate2'],
                    'frame_5_racer_nationwide_rate_2' => $races['racer'][4]['nationwideRate2'],
                    'frame_6_racer_nationwide_rate_2' => $races['racer'][5]['nationwideRate2'],
                    'frame_1_racer_nationwide_rate_3' => $races['racer'][0]['nationwideRate3'],
                    'frame_2_racer_nationwide_rate_3' => $races['racer'][1]['nationwideRate3'],
                    'frame_3_racer_nationwide_rate_3' => $races['racer'][2]['nationwideRate3'],
                    'frame_4_racer_nationwide_rate_3' => $races['racer'][3]['nationwideRate3'],
                    'frame_5_racer_nationwide_rate_3' => $races['racer'][4]['nationwideRate3'],
                    'frame_6_racer_nationwide_rate_3' => $races['racer'][5]['nationwideRate3'],
                    'frame_1_racer_local_rate_1'      => $races['racer'][0]['localRate1'],
                    'frame_2_racer_local_rate_1'      => $races['racer'][1]['localRate1'],
                    'frame_3_racer_local_rate_1'      => $races['racer'][2]['localRate1'],
                    'frame_4_racer_local_rate_1'      => $races['racer'][3]['localRate1'],
                    'frame_5_racer_local_rate_1'      => $races['racer'][4]['localRate1'],
                    'frame_6_racer_local_rate_1'      => $races['racer'][5]['localRate1'],
                    'frame_1_racer_local_rate_2'      => $races['racer'][0]['localRate2'],
                    'frame_2_racer_local_rate_2'      => $races['racer'][1]['localRate2'],
                    'frame_3_racer_local_rate_2'      => $races['racer'][2]['localRate2'],
                    'frame_4_racer_local_rate_2'      => $races['racer'][3]['localRate2'],
                    'frame_5_racer_local_rate_2'      => $races['racer'][4]['localRate2'],
                    'frame_6_racer_local_rate_2'      => $races['racer'][5]['localRate2'],
                    'frame_1_racer_local_rate_3'      => $races['racer'][0]['localRate3'],
                    'frame_2_racer_local_rate_3'      => $races['racer'][1]['localRate3'],
                    'frame_3_racer_local_rate_3'      => $races['racer'][2]['localRate3'],
                    'frame_4_racer_local_rate_3'      => $races['racer'][3]['localRate3'],
                    'frame_5_racer_local_rate_3'      => $races['racer'][4]['localRate3'],
                    'frame_6_racer_local_rate_3'      => $races['racer'][5]['localRate3'],
                    'frame_1_motor_number'            => $races['racer'][0]['motorNumber'],
                    'frame_2_motor_number'            => $races['racer'][1]['motorNumber'],
                    'frame_3_motor_number'            => $races['racer'][2]['motorNumber'],
                    'frame_4_motor_number'            => $races['racer'][3]['motorNumber'],
                    'frame_5_motor_number'            => $races['racer'][4]['motorNumber'],
                    'frame_6_motor_number'            => $races['racer'][5]['motorNumber'],
                    'frame_1_motor_rate_2'            => $races['racer'][0]['motorRate2'],
                    'frame_2_motor_rate_2'            => $races['racer'][1]['motorRate2'],
                    'frame_3_motor_rate_2'            => $races['racer'][2]['motorRate2'],
                    'frame_4_motor_rate_2'            => $races['racer'][3]['motorRate2'],
                    'frame_5_motor_rate_2'            => $races['racer'][4]['motorRate2'],
                    'frame_6_motor_rate_2'            => $races['racer'][5]['motorRate2'],
                    'frame_1_motor_rate_3'            => $races['racer'][0]['motorRate3'],
                    'frame_2_motor_rate_3'            => $races['racer'][1]['motorRate3'],
                    'frame_3_motor_rate_3'            => $races['racer'][2]['motorRate3'],
                    'frame_4_motor_rate_3'            => $races['racer'][3]['motorRate3'],
                    'frame_5_motor_rate_3'            => $races['racer'][4]['motorRate3'],
                    'frame_6_motor_rate_3'            => $races['racer'][5]['motorRate3'],
                    'frame_1_boat_number'             => $races['racer'][0]['boatNumber'],
                    'frame_2_boat_number'             => $races['racer'][1]['boatNumber'],
                    'frame_3_boat_number'             => $races['racer'][2]['boatNumber'],
                    'frame_4_boat_number'             => $races['racer'][3]['boatNumber'],
                    'frame_5_boat_number'             => $races['racer'][4]['boatNumber'],
                    'frame_6_boat_number'             => $races['racer'][5]['boatNumber'],
                    'frame_1_boat_rate_2'             => $races['racer'][0]['boatRate2'],
                    'frame_2_boat_rate_2'             => $races['racer'][1]['boatRate2'],
                    'frame_3_boat_rate_2'             => $races['racer'][2]['boatRate2'],
                    'frame_4_boat_rate_2'             => $races['racer'][3]['boatRate2'],
                    'frame_5_boat_rate_2'             => $races['racer'][4]['boatRate2'],
                    'frame_6_boat_rate_2'             => $races['racer'][5]['boatRate2'],
                    'frame_1_boat_rate_3'             => $races['racer'][0]['boatRate3'],
                    'frame_2_boat_rate_3'             => $races['racer'][1]['boatRate3'],
                    'frame_3_boat_rate_3'             => $races['racer'][2]['boatRate3'],
                    'frame_4_boat_rate_3'             => $races['racer'][3]['boatRate3'],
                    'frame_5_boat_rate_3'             => $races['racer'][4]['boatRate3'],
                    'frame_6_boat_rate_3'             => $races['racer'][5]['boatRate3'],
                ];
            }
        }

        $this->connect()->table('programs')->insert($storeData);
    }
}
