<?php

namespace Boatrace;

/**
 * @author shimomo
 */
class RaceProgramCrawler extends Crawler
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
        if (is_null($date)) {
            $date = $this->instances['datetime']->format('Ymd');
        }

        $url = sprintf('%s/owpc/pc/race/racelist?hd=%s&jcd=%02d&rno=%d', $this->baseUrl, $date, $place, $race);
        $crawler = $this->instances['goutte']->request('GET', $url);

        if (
            count($crawler->filter('div.heading2_head div.heading2_title h2.heading2_titleName')) &&
            count($crawler->filter('div.heading2_head div.heading2_title span.heading2_titleDetail.is-type1')) &&
            count($crawler->filter('div.table1')->eq(0)->filter('table tbody tr')->eq(0)->filter('td')->eq($race))
        ) {
            $title         = $crawler->filter('div.heading2_head div.heading2_title h2.heading2_titleName')->text();
            $classDistance = $crawler->filter('div.heading2_head div.heading2_title span.heading2_titleDetail.is-type1')->text();
            $deadline      = $crawler->filter('div.table1')->eq(0)->filter('table tbody tr')->eq(0)->filter('td')->eq($race)->text();

            list($class, $empty, $distance) = explode("\n", trim($classDistance));
            list($hours, $minutes) = explode(':', trim($deadline));

            $title    = $this->instances['converter']->convertString($title);
            $class    = $this->instances['converter']->convertString($class);
            $distance = $this->instances['converter']->convertInt($distance);
            $deadline = $this->instances['converter']->convertInt($hours . $minutes);

            $response[$place][$race]['date']     = $date;
            $response[$place][$race]['place']    = $place;
            $response[$place][$race]['race']     = $race;
            $response[$place][$race]['title']    = $title;
            $response[$place][$race]['class']    = $class;
            $response[$place][$race]['distance'] = $distance;
            $response[$place][$race]['deadline'] = $deadline;
        }

        $racers = [];
        $crawler->filter('table tbody.is-fs12')->each(function ($element) use (&$racers) {
            if (
                count($element->filter('tr')->eq(0)->filter('td')->eq(0)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(1)->filter('a img')) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(0)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(1)->filter('a')) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(2)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(3)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(4)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(5)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(6)) &&
                count($element->filter('tr')->eq(0)->filter('td')->eq(7))
            ) {
                $frame                 = $element->filter('tr')->eq(0)->filter('td')->eq(0)->text();
                $photo                 = $element->filter('tr')->eq(0)->filter('td')->eq(1)->filter('a img')->attr('src');
                $idRank                = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(0)->text();
                $name                  = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(1)->filter('a')->text();
                $prefecturePhysical    = $element->filter('tr')->eq(0)->filter('td')->eq(2)->filter('div')->eq(2)->text();
                $flyingLateStartTiming = $element->filter('tr')->eq(0)->filter('td')->eq(3)->text();
                $nationwideRate        = $element->filter('tr')->eq(0)->filter('td')->eq(4)->text();
                $localRate             = $element->filter('tr')->eq(0)->filter('td')->eq(5)->text();
                $motorRate             = $element->filter('tr')->eq(0)->filter('td')->eq(6)->text();
                $boatRate              = $element->filter('tr')->eq(0)->filter('td')->eq(7)->text();

                list($id, $rank)                                           = explode('/', trim($idRank));
                list($prefecture, $physical)                               = explode("\n", trim($prefecturePhysical));
                list($branch, $graduate)                                   = explode('/', trim($prefecture));
                list($age, $weight)                                        = explode('/', trim($physical));
                list($flying, $late, $startTiming)                         = explode("\n", trim($flyingLateStartTiming));
                list($nationwideRate1, $nationwideRate2, $nationwideRate3) = explode("\n", trim($nationwideRate));
                list($localRate1, $localRate2, $localRate3)                = explode("\n", trim($localRate));
                list($motorNumber, $motorRate2, $motorRate3)               = explode("\n", trim($motorRate));
                list($boatNumber, $boatRate2, $boatRate3)                  = explode("\n", trim($boatRate));

                list($lastName, $firstName) = $this->splitName($name);
                $name = sprintf('%s %s', $lastName, $firstName);

                $frame           = $this->instances['converter']->convertInt($frame);
                $id              = $this->instances['converter']->convertInt($id);
                $rank            = $this->instances['converter']->convertString($rank);
                $branch          = $this->instances['converter']->convertString($branch);
                $graduate        = $this->instances['converter']->convertString($graduate);
                $age             = $this->instances['converter']->convertInt($age);
                $weight          = $this->instances['converter']->convertFloat($weight);
                $flying          = $this->instances['converter']->convertFlying($flying);
                $late            = $this->instances['converter']->convertLate($late);
                $startTiming     = $this->instances['converter']->convertStartTiming($startTiming);
                $nationwideRate1 = $this->instances['converter']->convertFloat($nationwideRate1);
                $nationwideRate2 = $this->instances['converter']->convertFloat($nationwideRate2);
                $nationwideRate3 = $this->instances['converter']->convertFloat($nationwideRate3);
                $localRate1      = $this->instances['converter']->convertFloat($localRate1);
                $localRate2      = $this->instances['converter']->convertFloat($localRate2);
                $localRate3      = $this->instances['converter']->convertFloat($localRate3);
                $motorNumber     = $this->instances['converter']->convertInt($motorNumber);
                $motorRate2      = $this->instances['converter']->convertFloat($motorRate2);
                $motorRate3      = $this->instances['converter']->convertFloat($motorRate3);
                $boatNumber      = $this->instances['converter']->convertInt($boatNumber);
                $boatRate2       = $this->instances['converter']->convertFloat($boatRate2);
                $boatRate3       = $this->instances['converter']->convertFloat($boatRate3);

                $racers[] = [
                    'frame'           => $frame,
                    'photo'           => $photo,
                    'id'              => $id,
                    'rank'            => $rank,
                    'name'            => $name,
                    'branch'          => $branch,
                    'graduate'        => $graduate,
                    'age'             => $age,
                    'weight'          => $weight,
                    'flying'          => $flying,
                    'late'            => $late,
                    'startTiming'     => $startTiming,
                    'nationwideRate1' => $nationwideRate1,
                    'nationwideRate2' => $nationwideRate2,
                    'nationwideRate3' => $nationwideRate3,
                    'localRate1'      => $localRate1,
                    'localRate2'      => $localRate2,
                    'localRate3'      => $localRate3,
                    'motorNumber'     => $motorNumber,
                    'motorRate2'      => $motorRate2,
                    'motorRate3'      => $motorRate3,
                    'boatNumber'      => $boatNumber,
                    'boatRate2'       => $boatRate2,
                    'boatRate3'       => $boatRate3,
                ];
            }
        });

        if ($racers) {
            $response[$place][$race]['racers'] = $racers;
        }

        return $response;
    }
}
