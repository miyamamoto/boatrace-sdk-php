<?php

require __DIR__ . '/../vendor/autoload.php';

/**
 * @author shimomo
 */
class ClientTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Boatrace\Client
     */
    protected $boatrace;

    /**
     * @var array
     */
    protected $config = [
        'driver'    => 'pgsql',
        'host'      => 'localhost',
        'database'  => 'boatrace',
        'username'  => 'postgres',
        'password'  => '',
        'charset'   => 'utf8',
        'collation' => 'utf8_unicode_ci',
        'prefix'    => '',
    ];

    /**
     * @return void
     */
    public function setUp()
    {
        $this->boatrace = new \Boatrace\Client();
        $this->boatrace->setConfig($this->config);
    }

    /**
     * @return void
     */
    public function testStoreRaceProgram()
    {
        $this->boatrace->storeRaceProgram(20170707, 24, 1);
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testStoreRaceResult()
    {
        $this->boatrace->storeRaceResult(20170707, 24, 1);
        $this->assertTrue(true);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramViaDatabase()
    {
        $response = $this->boatrace->getRaceProgramViaDatabase();
        $this->assertSame(20170707, $response[0]['date']);
        $this->assertSame(24, $response[0]['place_id']);
        $this->assertSame('大村', $response[0]['place_name']);
        $this->assertSame('富士通フロンテック杯', $response[0]['race_name']);
        $this->assertSame('めざまし戦一般', $response[0]['race_type']);
        $this->assertSame('1800m', $response[0]['race_distance']);
        $this->assertSame(4260, $response[0]['racer_id_frame_1']);
        $this->assertSame(4251, $response[0]['racer_id_frame_2']);
        $this->assertSame(3309, $response[0]['racer_id_frame_3']);
        $this->assertSame(3781, $response[0]['racer_id_frame_4']);
        $this->assertSame(3105, $response[0]['racer_id_frame_5']);
        $this->assertSame(4955, $response[0]['racer_id_frame_6']);
        $this->assertSame('中越 博紀', $response[0]['racer_name_frame_1']);
        $this->assertSame('川崎 誠志', $response[0]['racer_name_frame_2']);
        $this->assertSame('大塚 信行', $response[0]['racer_name_frame_3']);
        $this->assertSame('秋元 誠', $response[0]['racer_name_frame_4']);
        $this->assertSame('内山 文典', $response[0]['racer_name_frame_5']);
        $this->assertSame('福田 慶尚', $response[0]['racer_name_frame_6']);
        $this->assertSame('A1', $response[0]['racer_rank_frame_1']);
        $this->assertSame('B1', $response[0]['racer_rank_frame_2']);
        $this->assertSame('B1', $response[0]['racer_rank_frame_3']);
        $this->assertSame('B1', $response[0]['racer_rank_frame_4']);
        $this->assertSame('B1', $response[0]['racer_rank_frame_5']);
        $this->assertSame('B2', $response[0]['racer_rank_frame_6']);
        $this->assertSame('香川', $response[0]['racer_branch_frame_1']);
        $this->assertSame('山口', $response[0]['racer_branch_frame_2']);
        $this->assertSame('東京', $response[0]['racer_branch_frame_3']);
        $this->assertSame('福井', $response[0]['racer_branch_frame_4']);
        $this->assertSame('東京', $response[0]['racer_branch_frame_5']);
        $this->assertSame('広島', $response[0]['racer_branch_frame_6']);
        $this->assertSame('愛媛', $response[0]['racer_graduate_frame_1']);
        $this->assertSame('山口', $response[0]['racer_graduate_frame_2']);
        $this->assertSame('福島', $response[0]['racer_graduate_frame_3']);
        $this->assertSame('富山', $response[0]['racer_graduate_frame_4']);
        $this->assertSame('東京', $response[0]['racer_graduate_frame_5']);
        $this->assertSame('広島', $response[0]['racer_graduate_frame_6']);
        $this->assertSame('33歳', $response[0]['racer_age_frame_1']);
        $this->assertSame('34歳', $response[0]['racer_age_frame_2']);
        $this->assertSame('53歳', $response[0]['racer_age_frame_3']);
        $this->assertSame('41歳', $response[0]['racer_age_frame_4']);
        $this->assertSame('53歳', $response[0]['racer_age_frame_5']);
        $this->assertSame('22歳', $response[0]['racer_age_frame_6']);
        $this->assertSame('51.4kg', $response[0]['racer_weight_frame_1']);
        $this->assertSame('51.0kg', $response[0]['racer_weight_frame_2']);
        $this->assertSame('53.8kg', $response[0]['racer_weight_frame_3']);
        $this->assertSame('53.5kg', $response[0]['racer_weight_frame_4']);
        $this->assertSame('52.9kg', $response[0]['racer_weight_frame_5']);
        $this->assertSame('52.1kg', $response[0]['racer_weight_frame_6']);
        $this->assertSame('F0', $response[0]['racer_flying_frame_1']);
        $this->assertSame('F0', $response[0]['racer_flying_frame_2']);
        $this->assertSame('F0', $response[0]['racer_flying_frame_3']);
        $this->assertSame('F0', $response[0]['racer_flying_frame_4']);
        $this->assertSame('F1', $response[0]['racer_flying_frame_5']);
        $this->assertSame('F0', $response[0]['racer_flying_frame_6']);
        $this->assertSame('L0', $response[0]['racer_late_frame_1']);
        $this->assertSame('L0', $response[0]['racer_late_frame_2']);
        $this->assertSame('L0', $response[0]['racer_late_frame_3']);
        $this->assertSame('L0', $response[0]['racer_late_frame_4']);
        $this->assertSame('L0', $response[0]['racer_late_frame_5']);
        $this->assertSame('L0', $response[0]['racer_late_frame_6']);
        $this->assertSame('6.15', $response[0]['racer_nationwide_rate_1_frame_1']);
        $this->assertSame('3.77', $response[0]['racer_nationwide_rate_1_frame_2']);
        $this->assertSame('3.93', $response[0]['racer_nationwide_rate_1_frame_3']);
        $this->assertSame('4.31', $response[0]['racer_nationwide_rate_1_frame_4']);
        $this->assertSame('5.56', $response[0]['racer_nationwide_rate_1_frame_5']);
        $this->assertSame('1.30', $response[0]['racer_nationwide_rate_1_frame_6']);
        $this->assertSame('43.52', $response[0]['racer_nationwide_rate_2_frame_1']);
        $this->assertSame('14.75', $response[0]['racer_nationwide_rate_2_frame_2']);
        $this->assertSame('21.92', $response[0]['racer_nationwide_rate_2_frame_3']);
        $this->assertSame('24.74', $response[0]['racer_nationwide_rate_2_frame_4']);
        $this->assertSame('38.26', $response[0]['racer_nationwide_rate_2_frame_5']);
        $this->assertSame('0.00', $response[0]['racer_nationwide_rate_2_frame_6']);
        $this->assertSame('62.96', $response[0]['racer_nationwide_rate_3_frame_1']);
        $this->assertSame('27.87', $response[0]['racer_nationwide_rate_3_frame_2']);
        $this->assertSame('28.77', $response[0]['racer_nationwide_rate_3_frame_3']);
        $this->assertSame('40.21', $response[0]['racer_nationwide_rate_3_frame_4']);
        $this->assertSame('55.65', $response[0]['racer_nationwide_rate_3_frame_5']);
        $this->assertSame('0.00', $response[0]['racer_nationwide_rate_3_frame_6']);
        $this->assertSame('5.91', $response[0]['racer_local_rate_1_frame_1']);
        $this->assertSame('4.56', $response[0]['racer_local_rate_1_frame_2']);
        $this->assertSame('3.35', $response[0]['racer_local_rate_1_frame_3']);
        $this->assertSame('4.63', $response[0]['racer_local_rate_1_frame_4']);
        $this->assertSame('4.86', $response[0]['racer_local_rate_1_frame_5']);
        $this->assertSame('0.00', $response[0]['racer_local_rate_1_frame_6']);
        $this->assertSame('33.33', $response[0]['racer_local_rate_2_frame_1']);
        $this->assertSame('22.22', $response[0]['racer_local_rate_2_frame_2']);
        $this->assertSame('20.00', $response[0]['racer_local_rate_2_frame_3']);
        $this->assertSame('37.50', $response[0]['racer_local_rate_2_frame_4']);
        $this->assertSame('14.29', $response[0]['racer_local_rate_2_frame_5']);
        $this->assertSame('0.00', $response[0]['racer_local_rate_2_frame_6']);
        $this->assertSame('63.64', $response[0]['racer_local_rate_3_frame_1']);
        $this->assertSame('55.56', $response[0]['racer_local_rate_3_frame_2']);
        $this->assertSame('25.00', $response[0]['racer_local_rate_3_frame_3']);
        $this->assertSame('50.00', $response[0]['racer_local_rate_3_frame_4']);
        $this->assertSame('42.86', $response[0]['racer_local_rate_3_frame_5']);
        $this->assertSame('0.00', $response[0]['racer_local_rate_3_frame_6']);
        $this->assertSame(25, $response[0]['motor_number_frame_1']);
        $this->assertSame(24, $response[0]['motor_number_frame_2']);
        $this->assertSame(54, $response[0]['motor_number_frame_3']);
        $this->assertSame(19, $response[0]['motor_number_frame_4']);
        $this->assertSame(67, $response[0]['motor_number_frame_5']);
        $this->assertSame(27, $response[0]['motor_number_frame_6']);
        $this->assertSame('29.33', $response[0]['motor_rate_2_frame_1']);
        $this->assertSame('38.55', $response[0]['motor_rate_2_frame_2']);
        $this->assertSame('39.51', $response[0]['motor_rate_2_frame_3']);
        $this->assertSame('34.48', $response[0]['motor_rate_2_frame_4']);
        $this->assertSame('30.49', $response[0]['motor_rate_2_frame_5']);
        $this->assertSame('38.20', $response[0]['motor_rate_2_frame_6']);
        $this->assertSame('42.67', $response[0]['motor_rate_3_frame_1']);
        $this->assertSame('50.60', $response[0]['motor_rate_3_frame_2']);
        $this->assertSame('58.02', $response[0]['motor_rate_3_frame_3']);
        $this->assertSame('52.87', $response[0]['motor_rate_3_frame_4']);
        $this->assertSame('48.78', $response[0]['motor_rate_3_frame_5']);
        $this->assertSame('55.06', $response[0]['motor_rate_3_frame_6']);
        $this->assertSame(59, $response[0]['boat_number_frame_1']);
        $this->assertSame(40, $response[0]['boat_number_frame_2']);
        $this->assertSame(37, $response[0]['boat_number_frame_3']);
        $this->assertSame(71, $response[0]['boat_number_frame_4']);
        $this->assertSame(66, $response[0]['boat_number_frame_5']);
        $this->assertSame(73, $response[0]['boat_number_frame_6']);
        $this->assertSame('0.00', $response[0]['boat_rate_2_frame_1']);
        $this->assertSame('22.22', $response[0]['boat_rate_2_frame_2']);
        $this->assertSame('44.44', $response[0]['boat_rate_2_frame_3']);
        $this->assertSame('0.00', $response[0]['boat_rate_2_frame_4']);
        $this->assertSame('0.00', $response[0]['boat_rate_2_frame_5']);
        $this->assertSame('0.00', $response[0]['boat_rate_2_frame_6']);
        $this->assertSame('0.00', $response[0]['boat_rate_3_frame_1']);
        $this->assertSame('44.44', $response[0]['boat_rate_3_frame_2']);
        $this->assertSame('66.67', $response[0]['boat_rate_3_frame_3']);
        $this->assertSame('0.00', $response[0]['boat_rate_3_frame_4']);
        $this->assertSame('0.00', $response[0]['boat_rate_3_frame_5']);
        $this->assertSame('0.00', $response[0]['boat_rate_3_frame_6']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultViaDatabase()
    {
        $response = $this->boatrace->getRaceResultViaDatabase();
        $this->assertSame(20170707, $response[0]['date']);
        $this->assertSame(24, $response[0]['place_id']);
        $this->assertSame(1, $response[0]['race_id']);
        $this->assertSame('差し', $response[0]['technique']);
        $this->assertSame(2, $response[0]['arrival_1_frame']);
        $this->assertSame(1, $response[0]['arrival_2_frame']);
        $this->assertSame(4, $response[0]['arrival_3_frame']);
        $this->assertSame(5, $response[0]['arrival_4_frame']);
        $this->assertSame(3, $response[0]['arrival_5_frame']);
        $this->assertSame(6, $response[0]['arrival_6_frame']);
        $this->assertSame(1, $response[0]['course_1_frame']);
        $this->assertSame(2, $response[0]['course_2_frame']);
        $this->assertSame(3, $response[0]['course_3_frame']);
        $this->assertSame(4, $response[0]['course_4_frame']);
        $this->assertSame(5, $response[0]['course_5_frame']);
        $this->assertSame(6, $response[0]['course_6_frame']);
        $this->assertSame('.18', $response[0]['course_1_start_timing']);
        $this->assertSame('.18', $response[0]['course_2_start_timing']);
        $this->assertSame('.21', $response[0]['course_3_start_timing']);
        $this->assertSame('.17', $response[0]['course_4_start_timing']);
        $this->assertSame('.25', $response[0]['course_5_start_timing']);
        $this->assertSame('.19', $response[0]['course_6_start_timing']);
        $this->assertSame('曇り', $response[0]['weather']);
        $this->assertSame('3m', $response[0]['wind']);
        $this->assertSame('2cm', $response[0]['wave']);
        $this->assertSame('30.0℃', $response[0]['temperature']);
        $this->assertSame('28.0℃', $response[0]['water_temperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramOne()
    {
        $response = $this->boatrace->getRaceProgram(20170707);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('富士通フロンテック杯', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame('1800m', $response[24][1]['basic']['distance']);
        $this->assertSame('2', $response[24][1]['racer'][1]['frame']);
        $this->assertSame('/racerphoto/4251.jpg', $response[24][1]['racer'][1]['photo']);
        $this->assertSame('4251', $response[24][1]['racer'][1]['id']);
        $this->assertSame('B1', $response[24][1]['racer'][1]['rank']);
        $this->assertSame('川崎 誠志', $response[24][1]['racer'][1]['name']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['branch']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['graduate']);
        $this->assertSame('34歳', $response[24][1]['racer'][1]['age']);
        $this->assertSame('51.0kg', $response[24][1]['racer'][1]['weight']);
        $this->assertSame('F0', $response[24][1]['racer'][1]['flying']);
        $this->assertSame('L0', $response[24][1]['racer'][1]['late']);
        $this->assertSame('0.23', $response[24][1]['racer'][1]['startTiming']);
        $this->assertSame('3.77', $response[24][1]['racer'][1]['nationwideRate1']);
        $this->assertSame('14.75', $response[24][1]['racer'][1]['nationwideRate2']);
        $this->assertSame('27.87', $response[24][1]['racer'][1]['nationwideRate3']);
        $this->assertSame('4.56', $response[24][1]['racer'][1]['localRate1']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['localRate2']);
        $this->assertSame('55.56', $response[24][1]['racer'][1]['localRate3']);
        $this->assertSame('24', $response[24][1]['racer'][1]['motorNumber']);
        $this->assertSame('38.55', $response[24][1]['racer'][1]['motorRate2']);
        $this->assertSame('50.60', $response[24][1]['racer'][1]['motorRate3']);
        $this->assertSame('40', $response[24][1]['racer'][1]['boatNumber']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['boatRate2']);
        $this->assertSame('44.44', $response[24][1]['racer'][1]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramTwo()
    {
        $response = $this->boatrace->getRaceProgram(20170707, 24);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('富士通フロンテック杯', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame('1800m', $response[24][1]['basic']['distance']);
        $this->assertSame('2', $response[24][1]['racer'][1]['frame']);
        $this->assertSame('/racerphoto/4251.jpg', $response[24][1]['racer'][1]['photo']);
        $this->assertSame('4251', $response[24][1]['racer'][1]['id']);
        $this->assertSame('B1', $response[24][1]['racer'][1]['rank']);
        $this->assertSame('川崎 誠志', $response[24][1]['racer'][1]['name']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['branch']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['graduate']);
        $this->assertSame('34歳', $response[24][1]['racer'][1]['age']);
        $this->assertSame('51.0kg', $response[24][1]['racer'][1]['weight']);
        $this->assertSame('F0', $response[24][1]['racer'][1]['flying']);
        $this->assertSame('L0', $response[24][1]['racer'][1]['late']);
        $this->assertSame('0.23', $response[24][1]['racer'][1]['startTiming']);
        $this->assertSame('3.77', $response[24][1]['racer'][1]['nationwideRate1']);
        $this->assertSame('14.75', $response[24][1]['racer'][1]['nationwideRate2']);
        $this->assertSame('27.87', $response[24][1]['racer'][1]['nationwideRate3']);
        $this->assertSame('4.56', $response[24][1]['racer'][1]['localRate1']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['localRate2']);
        $this->assertSame('55.56', $response[24][1]['racer'][1]['localRate3']);
        $this->assertSame('24', $response[24][1]['racer'][1]['motorNumber']);
        $this->assertSame('38.55', $response[24][1]['racer'][1]['motorRate2']);
        $this->assertSame('50.60', $response[24][1]['racer'][1]['motorRate3']);
        $this->assertSame('40', $response[24][1]['racer'][1]['boatNumber']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['boatRate2']);
        $this->assertSame('44.44', $response[24][1]['racer'][1]['boatRate3']);

        $response = $this->boatrace->getRaceProgram(20170707, null, 1);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('富士通フロンテック杯', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame('1800m', $response[24][1]['basic']['distance']);
        $this->assertSame('2', $response[24][1]['racer'][1]['frame']);
        $this->assertSame('/racerphoto/4251.jpg', $response[24][1]['racer'][1]['photo']);
        $this->assertSame('4251', $response[24][1]['racer'][1]['id']);
        $this->assertSame('B1', $response[24][1]['racer'][1]['rank']);
        $this->assertSame('川崎 誠志', $response[24][1]['racer'][1]['name']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['branch']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['graduate']);
        $this->assertSame('34歳', $response[24][1]['racer'][1]['age']);
        $this->assertSame('51.0kg', $response[24][1]['racer'][1]['weight']);
        $this->assertSame('F0', $response[24][1]['racer'][1]['flying']);
        $this->assertSame('L0', $response[24][1]['racer'][1]['late']);
        $this->assertSame('0.23', $response[24][1]['racer'][1]['startTiming']);
        $this->assertSame('3.77', $response[24][1]['racer'][1]['nationwideRate1']);
        $this->assertSame('14.75', $response[24][1]['racer'][1]['nationwideRate2']);
        $this->assertSame('27.87', $response[24][1]['racer'][1]['nationwideRate3']);
        $this->assertSame('4.56', $response[24][1]['racer'][1]['localRate1']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['localRate2']);
        $this->assertSame('55.56', $response[24][1]['racer'][1]['localRate3']);
        $this->assertSame('24', $response[24][1]['racer'][1]['motorNumber']);
        $this->assertSame('38.55', $response[24][1]['racer'][1]['motorRate2']);
        $this->assertSame('50.60', $response[24][1]['racer'][1]['motorRate3']);
        $this->assertSame('40', $response[24][1]['racer'][1]['boatNumber']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['boatRate2']);
        $this->assertSame('44.44', $response[24][1]['racer'][1]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceProgramThree()
    {
        $response = $this->boatrace->getRaceProgram(20170707, 24, 1);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('大村', $response[24][1]['basic']['place']);
        $this->assertSame('富士通フロンテック杯', $response[24][1]['basic']['name']);
        $this->assertSame('めざまし戦一般', $response[24][1]['basic']['type']);
        $this->assertSame('1800m', $response[24][1]['basic']['distance']);
        $this->assertSame('2', $response[24][1]['racer'][1]['frame']);
        $this->assertSame('/racerphoto/4251.jpg', $response[24][1]['racer'][1]['photo']);
        $this->assertSame('4251', $response[24][1]['racer'][1]['id']);
        $this->assertSame('B1', $response[24][1]['racer'][1]['rank']);
        $this->assertSame('川崎 誠志', $response[24][1]['racer'][1]['name']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['branch']);
        $this->assertSame('山口', $response[24][1]['racer'][1]['graduate']);
        $this->assertSame('34歳', $response[24][1]['racer'][1]['age']);
        $this->assertSame('51.0kg', $response[24][1]['racer'][1]['weight']);
        $this->assertSame('F0', $response[24][1]['racer'][1]['flying']);
        $this->assertSame('L0', $response[24][1]['racer'][1]['late']);
        $this->assertSame('0.23', $response[24][1]['racer'][1]['startTiming']);
        $this->assertSame('3.77', $response[24][1]['racer'][1]['nationwideRate1']);
        $this->assertSame('14.75', $response[24][1]['racer'][1]['nationwideRate2']);
        $this->assertSame('27.87', $response[24][1]['racer'][1]['nationwideRate3']);
        $this->assertSame('4.56', $response[24][1]['racer'][1]['localRate1']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['localRate2']);
        $this->assertSame('55.56', $response[24][1]['racer'][1]['localRate3']);
        $this->assertSame('24', $response[24][1]['racer'][1]['motorNumber']);
        $this->assertSame('38.55', $response[24][1]['racer'][1]['motorRate2']);
        $this->assertSame('50.60', $response[24][1]['racer'][1]['motorRate3']);
        $this->assertSame('40', $response[24][1]['racer'][1]['boatNumber']);
        $this->assertSame('22.22', $response[24][1]['racer'][1]['boatRate2']);
        $this->assertSame('44.44', $response[24][1]['racer'][1]['boatRate3']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultOne()
    {
        $response = $this->boatrace->getRaceResult(20170707);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('差し', $response[24][1]['basic']['technique']);
        $this->assertSame('1', $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame('2', $response[24][1]['arrival'][0]['frame']);
        $this->assertSame('4251', $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('川崎 誠志', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame('2', $response[24][1]['course'][1]['frame']);
        $this->assertSame('.18', $response[24][1]['course'][1]['startTiming']);
        $this->assertSame('差し', $response[24][1]['course'][1]['technique']);
        $this->assertSame('曇り', $response[24][1]['weather']['weather']);
        $this->assertSame('3m', $response[24][1]['weather']['wind']);
        $this->assertSame('2cm', $response[24][1]['weather']['wave']);
        $this->assertSame('30.0℃', $response[24][1]['weather']['temperature']);
        $this->assertSame('28.0℃', $response[24][1]['weather']['waterTemperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultTwo()
    {
        $response = $this->boatrace->getRaceResult(20170707, 24);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('差し', $response[24][1]['basic']['technique']);
        $this->assertSame('1', $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame('2', $response[24][1]['arrival'][0]['frame']);
        $this->assertSame('4251', $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('川崎 誠志', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame('2', $response[24][1]['course'][1]['frame']);
        $this->assertSame('.18', $response[24][1]['course'][1]['startTiming']);
        $this->assertSame('差し', $response[24][1]['course'][1]['technique']);
        $this->assertSame('曇り', $response[24][1]['weather']['weather']);
        $this->assertSame('3m', $response[24][1]['weather']['wind']);
        $this->assertSame('2cm', $response[24][1]['weather']['wave']);
        $this->assertSame('30.0℃', $response[24][1]['weather']['temperature']);
        $this->assertSame('28.0℃', $response[24][1]['weather']['waterTemperature']);

        $response = $this->boatrace->getRaceResult(20170707, null, 1);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('差し', $response[24][1]['basic']['technique']);
        $this->assertSame('1', $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame('2', $response[24][1]['arrival'][0]['frame']);
        $this->assertSame('4251', $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('川崎 誠志', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame('2', $response[24][1]['course'][1]['frame']);
        $this->assertSame('.18', $response[24][1]['course'][1]['startTiming']);
        $this->assertSame('差し', $response[24][1]['course'][1]['technique']);
        $this->assertSame('曇り', $response[24][1]['weather']['weather']);
        $this->assertSame('3m', $response[24][1]['weather']['wind']);
        $this->assertSame('2cm', $response[24][1]['weather']['wave']);
        $this->assertSame('30.0℃', $response[24][1]['weather']['temperature']);
        $this->assertSame('28.0℃', $response[24][1]['weather']['waterTemperature']);
    }

    /**
     * @return void
     */
    public function testGetRaceResultThree()
    {
        $response = $this->boatrace->getRaceResult(20170707, 24, 1);
        $this->assertSame(20170707, $response[24][1]['basic']['date']);
        $this->assertSame('差し', $response[24][1]['basic']['technique']);
        $this->assertSame('1', $response[24][1]['arrival'][0]['arrival']);
        $this->assertSame('2', $response[24][1]['arrival'][0]['frame']);
        $this->assertSame('4251', $response[24][1]['arrival'][0]['racerId']);
        $this->assertSame('川崎 誠志', $response[24][1]['arrival'][0]['racerName']);
        $this->assertSame('2', $response[24][1]['course'][1]['frame']);
        $this->assertSame('.18', $response[24][1]['course'][1]['startTiming']);
        $this->assertSame('差し', $response[24][1]['course'][1]['technique']);
        $this->assertSame('曇り', $response[24][1]['weather']['weather']);
        $this->assertSame('3m', $response[24][1]['weather']['wind']);
        $this->assertSame('2cm', $response[24][1]['weather']['wave']);
        $this->assertSame('30.0℃', $response[24][1]['weather']['temperature']);
        $this->assertSame('28.0℃', $response[24][1]['weather']['waterTemperature']);
    }
}
