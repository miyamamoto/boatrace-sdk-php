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
                race_distance                   text,
                racer_id_frame_1                integer,
                racer_id_frame_2                integer,
                racer_id_frame_3                integer,
                racer_id_frame_4                integer,
                racer_id_frame_5                integer,
                racer_id_frame_6                integer,
                racer_name_frame_1              text,
                racer_name_frame_2              text,
                racer_name_frame_3              text,
                racer_name_frame_4              text,
                racer_name_frame_5              text,
                racer_name_frame_6              text,
                racer_rank_frame_1              text,
                racer_rank_frame_2              text,
                racer_rank_frame_3              text,
                racer_rank_frame_4              text,
                racer_rank_frame_5              text,
                racer_rank_frame_6              text,
                racer_branch_frame_1            text,
                racer_branch_frame_2            text,
                racer_branch_frame_3            text,
                racer_branch_frame_4            text,
                racer_branch_frame_5            text,
                racer_branch_frame_6            text,
                racer_graduate_frame_1          text,
                racer_graduate_frame_2          text,
                racer_graduate_frame_3          text,
                racer_graduate_frame_4          text,
                racer_graduate_frame_5          text,
                racer_graduate_frame_6          text,
                racer_age_frame_1               text,
                racer_age_frame_2               text,
                racer_age_frame_3               text,
                racer_age_frame_4               text,
                racer_age_frame_5               text,
                racer_age_frame_6               text,
                racer_weight_frame_1            text,
                racer_weight_frame_2            text,
                racer_weight_frame_3            text,
                racer_weight_frame_4            text,
                racer_weight_frame_5            text,
                racer_weight_frame_6            text,
                racer_flying_frame_1            text,
                racer_flying_frame_2            text,
                racer_flying_frame_3            text,
                racer_flying_frame_4            text,
                racer_flying_frame_5            text,
                racer_flying_frame_6            text,
                racer_late_frame_1              text,
                racer_late_frame_2              text,
                racer_late_frame_3              text,
                racer_late_frame_4              text,
                racer_late_frame_5              text,
                racer_late_frame_6              text,
                racer_nationwide_rate_1_frame_1 numeric,
                racer_nationwide_rate_1_frame_2 numeric,
                racer_nationwide_rate_1_frame_3 numeric,
                racer_nationwide_rate_1_frame_4 numeric,
                racer_nationwide_rate_1_frame_5 numeric,
                racer_nationwide_rate_1_frame_6 numeric,
                racer_nationwide_rate_2_frame_1 numeric,
                racer_nationwide_rate_2_frame_2 numeric,
                racer_nationwide_rate_2_frame_3 numeric,
                racer_nationwide_rate_2_frame_4 numeric,
                racer_nationwide_rate_2_frame_5 numeric,
                racer_nationwide_rate_2_frame_6 numeric,
                racer_nationwide_rate_3_frame_1 numeric,
                racer_nationwide_rate_3_frame_2 numeric,
                racer_nationwide_rate_3_frame_3 numeric,
                racer_nationwide_rate_3_frame_4 numeric,
                racer_nationwide_rate_3_frame_5 numeric,
                racer_nationwide_rate_3_frame_6 numeric,
                racer_local_rate_1_frame_1      numeric,
                racer_local_rate_1_frame_2      numeric,
                racer_local_rate_1_frame_3      numeric,
                racer_local_rate_1_frame_4      numeric,
                racer_local_rate_1_frame_5      numeric,
                racer_local_rate_1_frame_6      numeric,
                racer_local_rate_2_frame_1      numeric,
                racer_local_rate_2_frame_2      numeric,
                racer_local_rate_2_frame_3      numeric,
                racer_local_rate_2_frame_4      numeric,
                racer_local_rate_2_frame_5      numeric,
                racer_local_rate_2_frame_6      numeric,
                racer_local_rate_3_frame_1      numeric,
                racer_local_rate_3_frame_2      numeric,
                racer_local_rate_3_frame_3      numeric,
                racer_local_rate_3_frame_4      numeric,
                racer_local_rate_3_frame_5      numeric,
                racer_local_rate_3_frame_6      numeric,
                motor_number_frame_1            integer,
                motor_number_frame_2            integer,
                motor_number_frame_3            integer,
                motor_number_frame_4            integer,
                motor_number_frame_5            integer,
                motor_number_frame_6            integer,
                motor_rate_2_frame_1            numeric,
                motor_rate_2_frame_2            numeric,
                motor_rate_2_frame_3            numeric,
                motor_rate_2_frame_4            numeric,
                motor_rate_2_frame_5            numeric,
                motor_rate_2_frame_6            numeric,
                motor_rate_3_frame_1            numeric,
                motor_rate_3_frame_2            numeric,
                motor_rate_3_frame_3            numeric,
                motor_rate_3_frame_4            numeric,
                motor_rate_3_frame_5            numeric,
                motor_rate_3_frame_6            numeric,
                boat_number_frame_1             integer,
                boat_number_frame_2             integer,
                boat_number_frame_3             integer,
                boat_number_frame_4             integer,
                boat_number_frame_5             integer,
                boat_number_frame_6             integer,
                boat_rate_2_frame_1             numeric,
                boat_rate_2_frame_2             numeric,
                boat_rate_2_frame_3             numeric,
                boat_rate_2_frame_4             numeric,
                boat_rate_2_frame_5             numeric,
                boat_rate_2_frame_6             numeric,
                boat_rate_3_frame_1             numeric,
                boat_rate_3_frame_2             numeric,
                boat_rate_3_frame_3             numeric,
                boat_rate_3_frame_4             numeric,
                boat_rate_3_frame_5             numeric,
                boat_rate_3_frame_6             numeric
            );
        ');
    }

    /**
     * @param  array $conditions
     * @return array
     */
    public function get(array $conditions = [])
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
        array_walk_recursive($data, function (&$v, $k) {
            if ($v === '-') {
                $v = null;
            }
        });

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
                    'racer_id_frame_1'                => $races['racer'][0]['id'],
                    'racer_id_frame_2'                => $races['racer'][1]['id'],
                    'racer_id_frame_3'                => $races['racer'][2]['id'],
                    'racer_id_frame_4'                => $races['racer'][3]['id'],
                    'racer_id_frame_5'                => $races['racer'][4]['id'],
                    'racer_id_frame_6'                => $races['racer'][5]['id'],
                    'racer_name_frame_1'              => $races['racer'][0]['name'],
                    'racer_name_frame_2'              => $races['racer'][1]['name'],
                    'racer_name_frame_3'              => $races['racer'][2]['name'],
                    'racer_name_frame_4'              => $races['racer'][3]['name'],
                    'racer_name_frame_5'              => $races['racer'][4]['name'],
                    'racer_name_frame_6'              => $races['racer'][5]['name'],
                    'racer_rank_frame_1'              => $races['racer'][0]['rank'],
                    'racer_rank_frame_2'              => $races['racer'][1]['rank'],
                    'racer_rank_frame_3'              => $races['racer'][2]['rank'],
                    'racer_rank_frame_4'              => $races['racer'][3]['rank'],
                    'racer_rank_frame_5'              => $races['racer'][4]['rank'],
                    'racer_rank_frame_6'              => $races['racer'][5]['rank'],
                    'racer_branch_frame_1'            => $races['racer'][0]['branch'],
                    'racer_branch_frame_2'            => $races['racer'][1]['branch'],
                    'racer_branch_frame_3'            => $races['racer'][2]['branch'],
                    'racer_branch_frame_4'            => $races['racer'][3]['branch'],
                    'racer_branch_frame_5'            => $races['racer'][4]['branch'],
                    'racer_branch_frame_6'            => $races['racer'][5]['branch'],
                    'racer_graduate_frame_1'          => $races['racer'][0]['graduate'],
                    'racer_graduate_frame_2'          => $races['racer'][1]['graduate'],
                    'racer_graduate_frame_3'          => $races['racer'][2]['graduate'],
                    'racer_graduate_frame_4'          => $races['racer'][3]['graduate'],
                    'racer_graduate_frame_5'          => $races['racer'][4]['graduate'],
                    'racer_graduate_frame_6'          => $races['racer'][5]['graduate'],
                    'racer_age_frame_1'               => $races['racer'][0]['age'],
                    'racer_age_frame_2'               => $races['racer'][1]['age'],
                    'racer_age_frame_3'               => $races['racer'][2]['age'],
                    'racer_age_frame_4'               => $races['racer'][3]['age'],
                    'racer_age_frame_5'               => $races['racer'][4]['age'],
                    'racer_age_frame_6'               => $races['racer'][5]['age'],
                    'racer_weight_frame_1'            => $races['racer'][0]['weight'],
                    'racer_weight_frame_2'            => $races['racer'][1]['weight'],
                    'racer_weight_frame_3'            => $races['racer'][2]['weight'],
                    'racer_weight_frame_4'            => $races['racer'][3]['weight'],
                    'racer_weight_frame_5'            => $races['racer'][4]['weight'],
                    'racer_weight_frame_6'            => $races['racer'][5]['weight'],
                    'racer_flying_frame_1'            => $races['racer'][0]['flying'],
                    'racer_flying_frame_2'            => $races['racer'][1]['flying'],
                    'racer_flying_frame_3'            => $races['racer'][2]['flying'],
                    'racer_flying_frame_4'            => $races['racer'][3]['flying'],
                    'racer_flying_frame_5'            => $races['racer'][4]['flying'],
                    'racer_flying_frame_6'            => $races['racer'][5]['flying'],
                    'racer_late_frame_1'              => $races['racer'][0]['late'],
                    'racer_late_frame_2'              => $races['racer'][1]['late'],
                    'racer_late_frame_3'              => $races['racer'][2]['late'],
                    'racer_late_frame_4'              => $races['racer'][3]['late'],
                    'racer_late_frame_5'              => $races['racer'][4]['late'],
                    'racer_late_frame_6'              => $races['racer'][5]['late'],
                    'racer_nationwide_rate_1_frame_1' => $races['racer'][0]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_2' => $races['racer'][1]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_3' => $races['racer'][2]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_4' => $races['racer'][3]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_5' => $races['racer'][4]['nationwideRate1'],
                    'racer_nationwide_rate_1_frame_6' => $races['racer'][5]['nationwideRate1'],
                    'racer_nationwide_rate_2_frame_1' => $races['racer'][0]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_2' => $races['racer'][1]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_3' => $races['racer'][2]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_4' => $races['racer'][3]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_5' => $races['racer'][4]['nationwideRate2'],
                    'racer_nationwide_rate_2_frame_6' => $races['racer'][5]['nationwideRate2'],
                    'racer_nationwide_rate_3_frame_1' => $races['racer'][0]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_2' => $races['racer'][1]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_3' => $races['racer'][2]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_4' => $races['racer'][3]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_5' => $races['racer'][4]['nationwideRate3'],
                    'racer_nationwide_rate_3_frame_6' => $races['racer'][5]['nationwideRate3'],
                    'racer_local_rate_1_frame_1'      => $races['racer'][0]['localRate1'],
                    'racer_local_rate_1_frame_2'      => $races['racer'][1]['localRate1'],
                    'racer_local_rate_1_frame_3'      => $races['racer'][2]['localRate1'],
                    'racer_local_rate_1_frame_4'      => $races['racer'][3]['localRate1'],
                    'racer_local_rate_1_frame_5'      => $races['racer'][4]['localRate1'],
                    'racer_local_rate_1_frame_6'      => $races['racer'][5]['localRate1'],
                    'racer_local_rate_2_frame_1'      => $races['racer'][0]['localRate2'],
                    'racer_local_rate_2_frame_2'      => $races['racer'][1]['localRate2'],
                    'racer_local_rate_2_frame_3'      => $races['racer'][2]['localRate2'],
                    'racer_local_rate_2_frame_4'      => $races['racer'][3]['localRate2'],
                    'racer_local_rate_2_frame_5'      => $races['racer'][4]['localRate2'],
                    'racer_local_rate_2_frame_6'      => $races['racer'][5]['localRate2'],
                    'racer_local_rate_3_frame_1'      => $races['racer'][0]['localRate3'],
                    'racer_local_rate_3_frame_2'      => $races['racer'][1]['localRate3'],
                    'racer_local_rate_3_frame_3'      => $races['racer'][2]['localRate3'],
                    'racer_local_rate_3_frame_4'      => $races['racer'][3]['localRate3'],
                    'racer_local_rate_3_frame_5'      => $races['racer'][4]['localRate3'],
                    'racer_local_rate_3_frame_6'      => $races['racer'][5]['localRate3'],
                    'motor_number_frame_1'            => $races['racer'][0]['motorNumber'],
                    'motor_number_frame_2'            => $races['racer'][1]['motorNumber'],
                    'motor_number_frame_3'            => $races['racer'][2]['motorNumber'],
                    'motor_number_frame_4'            => $races['racer'][3]['motorNumber'],
                    'motor_number_frame_5'            => $races['racer'][4]['motorNumber'],
                    'motor_number_frame_6'            => $races['racer'][5]['motorNumber'],
                    'motor_rate_2_frame_1'            => $races['racer'][0]['motorRate2'],
                    'motor_rate_2_frame_2'            => $races['racer'][1]['motorRate2'],
                    'motor_rate_2_frame_3'            => $races['racer'][2]['motorRate2'],
                    'motor_rate_2_frame_4'            => $races['racer'][3]['motorRate2'],
                    'motor_rate_2_frame_5'            => $races['racer'][4]['motorRate2'],
                    'motor_rate_2_frame_6'            => $races['racer'][5]['motorRate2'],
                    'motor_rate_3_frame_1'            => $races['racer'][0]['motorRate3'],
                    'motor_rate_3_frame_2'            => $races['racer'][1]['motorRate3'],
                    'motor_rate_3_frame_3'            => $races['racer'][2]['motorRate3'],
                    'motor_rate_3_frame_4'            => $races['racer'][3]['motorRate3'],
                    'motor_rate_3_frame_5'            => $races['racer'][4]['motorRate3'],
                    'motor_rate_3_frame_6'            => $races['racer'][5]['motorRate3'],
                    'boat_number_frame_1'             => $races['racer'][0]['boatNumber'],
                    'boat_number_frame_2'             => $races['racer'][1]['boatNumber'],
                    'boat_number_frame_3'             => $races['racer'][2]['boatNumber'],
                    'boat_number_frame_4'             => $races['racer'][3]['boatNumber'],
                    'boat_number_frame_5'             => $races['racer'][4]['boatNumber'],
                    'boat_number_frame_6'             => $races['racer'][5]['boatNumber'],
                    'boat_rate_2_frame_1'             => $races['racer'][0]['boatRate2'],
                    'boat_rate_2_frame_2'             => $races['racer'][1]['boatRate2'],
                    'boat_rate_2_frame_3'             => $races['racer'][2]['boatRate2'],
                    'boat_rate_2_frame_4'             => $races['racer'][3]['boatRate2'],
                    'boat_rate_2_frame_5'             => $races['racer'][4]['boatRate2'],
                    'boat_rate_2_frame_6'             => $races['racer'][5]['boatRate2'],
                    'boat_rate_3_frame_1'             => $races['racer'][0]['boatRate3'],
                    'boat_rate_3_frame_2'             => $races['racer'][1]['boatRate3'],
                    'boat_rate_3_frame_3'             => $races['racer'][2]['boatRate3'],
                    'boat_rate_3_frame_4'             => $races['racer'][3]['boatRate3'],
                    'boat_rate_3_frame_5'             => $races['racer'][4]['boatRate3'],
                    'boat_rate_3_frame_6'             => $races['racer'][5]['boatRate3'],
                ];
            }
        }

        $this->connect()->table('programs')->insert($storeData);
    }
}
