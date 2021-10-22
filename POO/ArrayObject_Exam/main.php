<?php
    include ("Characters.php");
    include ("Locations.php");
    include ("Episodes.php");

    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    $api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=5284&data=";

    $charactersjson = json_decode(file_get_contents($api_url . "characters"), true);
    $episodesjson = json_decode(file_get_contents($api_url . "episodes"), true);
    $locationsjson = json_decode(file_get_contents($api_url . "locations"), true);

    function createCharacters($charactersjson) {

        for ($i = 0; $i < count($charactersjson); $i++) {
            $characters[$i] = new Characters($charactersjson[$i]["id"], $charactersjson[$i]["name"], $charactersjson[$i]["status"],
                $charactersjson[$i]["species"], $charactersjson[$i]["type"], $charactersjson[$i]["gender"], $charactersjson[$i]["origin"],
                $charactersjson[$i]["location"], $charactersjson[$i]["image"], $charactersjson[$i]["created"], $charactersjson[$i]["episodes"] );
        }

        return $characters;
    }

    function createLocations($locationsjson) {

        for ($i = 0; $i < count($locationsjson); $i++) {
            $locations[$i] = new Locations($locationsjson[$i]["id"], $locationsjson[$i]["name"], $locationsjson[$i]["type"],
                $locationsjson[$i]["dimension"], $locationsjson[$i]["created"], $locationsjson[$i]["residents"]);
        }

        return $locations;
    }

    function createEpisodes($episodesjson) {

        for ($i = 0; $i < count($episodesjson); $i++) {
            $episodes[$i] = new Episodes($episodesjson[$i]["id"], $episodesjson[$i]["name"], $episodesjson[$i]["air_date"], $episodesjson[$i]["episode"],
                $episodesjson[$i]["created"], $episodesjson[$i]["characters"]);
        }

        return $episodes;
    }

    function mapp($characters, $locations, $episodes) {
        for ($i = 0; $i < count($characters); $i++) {
            for ($j = 0; $j <count($locations); $j++) {
                if ($characters[$i]->getOrigin() == $locations[$j]->getId() && $characters[$i]->getOrigin() != "0") {
                    $characters[$i]->setOrigin($locations[$j]->getName());
                } else if ($characters[$i]->getOrigin() == "0") {
                    $characters[$i]->setOrigin("Unknown");
                }
            }

            for ($j = 0; $j < count($locations); $j++) {
                if ($characters[$i]->getLocation() == $locations[$j]->getId() && $characters[$i]->getLocation() != "0") {
                    $characters[$i]->setLocation($locations[$j]->getName());
                } else if ($characters[$i]->getLocation() == "0") {
                    $characters[$i]->getLocation("Unknown");
                }
            }

            for ($j = 0; $j < count($episodes); $j++) {
                for ($k = 0; $k < count($characters[$i]->getEpisodes()); $k++) {
                    if (($characters[$i]->getEpisodes()[$k] == $episodes[$j]->getId()) && $characters[$i]->getEpisodes()[$k] !== 0) {
                        //$characters[$i]->setEpisodes()[$k] = $episodes[$j]->getId();

                    } else if ($characters[$i]->getEpisodes()[$k] == 0) {
                        $characters[$i]->setEpisodes()[$k] = "unknown";
                    }
                }
            }
        }

        return $characters;
    }

    $characters = createCharacters($charactersjson);
    $locations = createLocations($locationsjson);
    $episodes = createEpisodes($episodesjson);

    $charactersmapp = mapp($characters, $locations, $episodes);


?>
<html>
    <head>
        <title>Mi pagina</title>
    </head>
    <body>
        <h1>Poo</h1>

        <?php

            foreach ($charactersmapp as $i => $key) {
                print_r( $key->getEpisodes() . "<br>");
            }

        ?>

    </body>
</html>
