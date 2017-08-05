<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceResultCrawler extends Crawler
{
    /**
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * @param  array $response
     * @param  int   $date
     * @param  int   $place
     * @param  int   $race
     * @return array
     */
    public function crawl(array $response, int $date, int $place, int $race)
    {
        $basicData   = [];
        $arrivalData = [];
        $courseData  = [];
        $weatherData = [];

        if (is_null($date)) {
            $date = $this->instances['datetime']->format('Ymd');
        }

        $url = sprintf('%s/owpc/pc/race/raceresult?hd=%s&jcd=%02d&rno=%d', $this->baseUrl, $date, $place, $race);
        $crawler = $this->instances['goutte']->request('GET', $url);

        $crawler->filter('table.is-w495 tbody')->each(function ($element) use (&$arrivalData) {
            if (
                count($element->filter('td.is-fs14')) &&
                count($element->filter('td.is-fs14.is-fBold')) &&
                count($element->filter('td.is-p20-0 span.is-fs12')) &&
                count($element->filter('td.is-p20-0 span.is-fs18.is-fBold'))
            ) {
                $arrival   = $element->filter('td.is-fs14')->text();
                $frame     = $element->filter('td.is-fs14.is-fBold')->text();
                $racerId   = $element->filter('td.is-p20-0 span.is-fs12')->text();
                $racerName = $element->filter('td.is-p20-0 span.is-fs18.is-fBold')->text();

                list($lastName, $firstName) = $this->splitName($racerName);
                $racerName = sprintf('%s %s', $lastName, $firstName);
                $arrival = (int)trim(mb_convert_kana($arrival, 'n', 'utf-8'));
                $frame   = (int)trim(mb_convert_kana($frame, 'n', 'utf-8'));
                $racerId = (int)trim(mb_convert_kana($racerId, 'n', 'utf-8'));

                $arrivalData[] = [
                    'arrival'   => $arrival,
                    'frame'     => $frame,
                    'racerId'   => $racerId,
                    'racerName' => $racerName,
                ];
            }
        });

        $crawler->filter('table.is-w495.is-h414 tbody.is-p10-0 tr')->each(function ($element) use (&$courseData) {
            if (
                count($element->filter('div.table1_boatImage1 span.table1_boatImage1Number')) &&
                count($element->filter('div.table1_boatImage1 span.table1_boatImage1TimeInner'))
            ) {
                $frame = $element->filter('div.table1_boatImage1 span.table1_boatImage1Number')->text();
                $start = $element->filter('div.table1_boatImage1 span.table1_boatImage1TimeInner')->text();

                list($startTiming, $technique) = $this->splitName($start);
                $frame       = (int)trim(mb_convert_kana($frame, 'n', 'utf-8'));
                $startTiming = (int)ltrim(trim(mb_convert_kana($startTiming, 'n', 'utf-8')), '.');
                $technique   = $this->convertTechnique(trim(mb_convert_kana($technique, 'n', 'utf-8')));

                $courseData[] = [
                    'frame'       => $frame,
                    'startTiming' => $startTiming,
                    'technique'   => $technique,
                ];
            }
        });

        if (
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-direction span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-weather span.weather1_bodyUnitLabelTitle')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wind span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-waterTemperature span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wave span.weather1_bodyUnitLabelData')) &&
            count($crawler->filter('table.is-w243.is-h168 td.is-fs16'))
        ) {
            $temperature      = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-direction span.weather1_bodyUnitLabelData')->text();
            $weather          = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-weather span.weather1_bodyUnitLabelTitle')->text();
            $wind             = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wind span.weather1_bodyUnitLabelData')->text();
            $waterTemperature = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-waterTemperature span.weather1_bodyUnitLabelData')->text();
            $wave             = $crawler->filter('div.weather1_body div.weather1_bodyUnit.is-wave span.weather1_bodyUnitLabelData')->text();
            $technique        = $crawler->filter('table.is-w243.is-h168 td.is-fs16')->text();

            $temperature      = (float)rtrim(trim(mb_convert_kana($temperature, 'n', 'utf-8')), '℃');
            $weather          = $this->convertWeather(trim(mb_convert_kana($weather, 'n', 'utf-8')));
            $wind             = (int)rtrim(trim(mb_convert_kana($wind, 'n', 'utf-8')), 'm');
            $waterTemperature = (float)rtrim(trim(mb_convert_kana($waterTemperature, 'n', 'utf-8')), '℃');
            $wave             = (int)rtrim(trim(mb_convert_kana($wave, 'n', 'utf-8')), 'cm');
            $technique        = $this->convertTechnique(trim(mb_convert_kana($technique, 'n', 'utf-8')));

            $basicData = [
                'date'      => $date,
                'technique' => $technique,
            ];

            $weatherData = [
                'weather'          => $weather,
                'wind'             => $wind,
                'wave'             => $wave,
                'temperature'      => $temperature,
                'waterTemperature' => $waterTemperature,
            ];
        }

        if ($basicData && $arrivalData && $courseData && $weatherData) {
            $response[$place][$race]['basic']   = $basicData;
            $response[$place][$race]['arrival'] = $arrivalData;
            $response[$place][$race]['course']  = $courseData;
            $response[$place][$race]['weather'] = $weatherData;
        }

        return $response;
    }

    /**
     * @param  string $technique
     * @return int
     */
    protected function convertTechnique(string $technique)
    {
        if ($technique === '逃げ') {
            return 1;
        }

        if ($technique === '差し') {
            return 2;
        }

        if ($technique === 'まくり' || $technique === 'つけまい') {
            return 3;
        }

        if ($technique === 'まくり差し') {
            return 4;
        }

        if ($technique === '抜き') {
            return 5;
        }

        if ($technique === '恵まれ') {
            return 6;
        }

        return 7;
    }

    /**
     * @param  string $weather
     * @return int
     */
    protected function convertWeather(string $weather)
    {
        if ($weather === '晴') {
            return 1;
        }

        if ($weather === '曇り') {
            return 2;
        }

        if ($weather === '雨') {
            return 3;
        }

        if ($weather === '雪') {
            return 4;
        }

        if ($weather === '霧') {
            return 5;
        }

        return 6;
    }
}
