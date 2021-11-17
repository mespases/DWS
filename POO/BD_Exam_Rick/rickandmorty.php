<?php
include('BD_R.php');
$sql = new BD_R();

// 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
$seed = 5284; //TODO: LAST 4 NUMBERS OF YOUR DNI.
$api_url = "https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?seed=" . $seed . "&data=";

//NOTE: Arrays unsorted
//$characters = json_decode(file_get_contents($api_url . "characters"), true);
//$episodes = json_decode(file_get_contents($api_url . "episodes"), true);
//$locations = json_decode(file_get_contents($api_url . "locations"), true);

$characters = $sql->mapEpXCh();
$episodes = $sql->selectEpisodes();
$locations = $sql->selectLocations();

//insert($characters, $episodes, $locations);
function insert($characters, $episodes, $locations) {
    global $sql;

    for ($j = 0; $j < count($episodes); $j++) {
        $sql->insertEpisodes($episodes[$j]["id"], $episodes[$j]["name"], $episodes[$j]["air_date"], $episodes[$j]["episode"], $episodes[$j]["created"]);
    }

    for ($i = 0; $i < count($characters); $i++) {
        $sql->insertCharacters($characters[$i]["id"], $characters[$i]["name"], $characters[$i]["status"], $characters[$i]["species"], $characters[$i]["type"],
        $characters[$i]["gender"], $characters[$i]["origin"], $characters[$i]["location"], $characters[$i]["image"], $characters[$i]["created"], $characters[$i]["episodes"]);
    }

    for ($k = 0; $k < count($locations); $k++) {
        $sql->insertLocalicaciones($locations[$k]["id"], $locations[$k]["name"], $locations[$k]["type"], $locations[$k]["dimension"], $locations[$k]["created"]);
    }
}

function getSortedCharactersById($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if (isset($characters[$j+1]) && $characters[$j]["id"] > $characters[$j+1]["id"]) {
                $idmayor = $characters[$j];
                $idmenor = $characters[$j+1];

                $characters[$j] = $idmenor;
                $characters[$j+1] = $idmayor;
            }
        }
    }

    return $characters;
}

function getSortedCharactersByOrigin($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if (isset($characters[$j+1]) && $characters[$j]["origin"] > $characters[$j+1]["origin"]) {
                $idmayor = $characters[$j];
                $idmenor = $characters[$j+1];

                $characters[$j] = $idmenor;
                $characters[$j+1] = $idmayor;
            }
        }
    }

    return $characters;
}

function getSortedCharactersByStatus($characters)
{
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($characters); $j++) {
            if ( isset($characters[$j+1]) && ($characters[$j["status"]] != "Alive" && $characters[$j+1]["status"] == "Alive")) {
                $idmayor = $characters[$j];
                $idmenor = $characters[$j+1];

                $characters[$j] = $idmenor;
                $characters[$j+1] = $idmayor;
            }
        }
    }

    return $characters;
}

//NOTE: OPTIONAL FUNCTION
function getSortedLocationsById($locations)
{
    for ($i = 0; $i < count($locations); $i++) {
        for ($j = 0; $j < count($locations); $j++) {
            if (isset($locations[$j+1]) && $locations[$j]["id"] > $locations[$j+1]["id"]) {
                $idmayor = $locations[$j];
                $idmenor = $locations[$j+1];

                $locations[$j] = $idmenor;
                $locations[$j+1] = $idmayor;
            }
        }
    }

    return $locations;
}

//NOTE: OPTIONAL FUNCTION
function getSortedEpisodesById($episodes)
{
    for ($i = 0; $i < count($episodes); $i++) {
        for ($j = 0; $j < count($episodes); $j++) {
            if (isset($episodes[$j+1]) && $episodes[$j]["id"] > $episodes[$j+1]["id"]) {
                $idmayor = $episodes[$j];
                $idmenor = $episodes[$j+1];

                $episodes[$j] = $idmenor;
                $episodes[$j+1] = $idmayor;
            }
        }
    }

    return $episodes;
}

function mapCharacters($characters)
{
    global $locations;
    global $episodes;
    $charactersCopy = $characters; // Copiamos la array para que los bucles siempre usen la array original sin modificaciones

    // Mapeamos el origin
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($locations); $j++) {
            if ($characters[$i]["origin"] == $locations[$j]["id"] && $charactersCopy[$i]["origin"] !== 0) {
                $charactersCopy[$i]["origin"] = $locations[$j]["name"];

            } else if ($characters[$i]["origin"] == 0) {
                $charactersCopy[$i]["origin"] = "unknown";
            }
        }
    }

    // Mapeamos la location
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($locations); $j++) {
            if (($characters[$i]["location"] == $locations[$j]["id"]) && $charactersCopy[$i]["location"] !== 0){
                $charactersCopy[$i]["location"] = $locations[$j]["name"];

            } else if ($characters[$i]["location"] == 0) {
                $charactersCopy[$i]["location"] = "unknown";
            }
        }
    }

    // Mapeamos los episodios
    for ($i = 0; $i < count($characters); $i++) {
        for ($j = 0; $j < count($episodes); $j++) {
            for ($k = 0; $k < count($characters[$i]["episodes"]); $k++) {
                if (($characters[$i]["episodes"][$k] == $episodes[$j]["id"]) && $charactersCopy[$i]["episodes"][$k] !== 0) {
                    $charactersCopy[$i]["episodes"][$k] = $episodes[$j]["name"];

                } else if ($characters[$i]["episodes"][$k] == 0) {
                    $charactersCopy[$i]["episodes"][$k] = "unknown";
                }
            }
        }
    }

    return $charactersCopy;
}

function render($character) {
    echo '<div class="col-md-4 col-sm-12 col-xs-12"><div class="card mb-4 box-shadow bg-light">';
    echo '<img class="card-img-top" src="'. $character["image"] .'" alt="https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/images/character_115_avatar.jpg">';
    echo '<div class="card-body"><h5 class="card-title">'. $character["name"].'</h5>';
    echo '<div class="alert alert-success" style="padding:0;" role="alert">'. $character["status"] .' - '. $character["species"] .'</div>';
    echo '<form><div class="mb-3" style="margin-bottom:0!important;">';
    echo '<label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Origin:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'.  $character["origin"] .'</div></div>';
    echo '<div class="mb-3"><label for="exampleInputEmail1" class="form-label" style="margin-bottom: 0;"><strong>Last known location:</strong></label>';
    echo '<div id="emailHelp" class="form-text" style="margin-top:0;">'. $character["location"] .'</div></div></form>';
    echo '<div class="d-flex justify-content-between align-items-center"><div class="btn-group">';
    echo '<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#characterModal_'.$character["id"].'">View episodes</button><!-- Modal -->';
    echo '<div class="modal fade" id="characterModal_'.$character["id"].'" tabindex="-1" aria-labelledby="characterModalLabel_'.$character["id"].'" aria-hidden="true">';
    echo '<div class="modal-dialog"><div class="modal-content"><div class="modal-header">';
    echo '<h5 class="modal-title" id="characterModalLabel_'.$character["id"].'">Episodes list</h5>';
    echo '<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>';
    echo '<div class="modal-body"><ol class="list-group">';

    for ($i = 0; $i < count($character["episodes"]); $i++) {
        echo '<li class="list-group-item">'. $character["episodes"][$i] .'</li>';
    }

    echo '</ol></div>';
    echo '<div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button></div></div></div></div></div>';
    echo '<small class="text-muted">'. $character["created"] .'</small></div></div></div></div>';
}

//NOTE: Function to render each character card HTML. Don't edit.
function renderCard($character)
{
    $ch = curl_init('https://dawsonferrer.com/allabres/apis_solutions/rickandmorty/api.php?data=render');
    $data = array("character" => $character);
    $postData = json_encode($data);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
    $result = curl_exec($ch);
    curl_close($ch);
    return $result;
}

//NOTE: $sortingCriteria receive the sorting criteria of the form. Don't edit
$sortingCriteria = "";
if (isset($_GET["sortingCriteria"])) {
    $sortingCriteria = $_GET["sortingCriteria"];
    switch ($sortingCriteria) {
        case "id":
            $characters = getSortedCharactersById($characters);
            break;
        case "origin":
            $characters = getSortedCharactersByOrigin($characters);
            break;
        case "status":
            $characters = getSortedCharactersByStatus($characters);
            break;
    }
}

//NOTE: Save function returns to variables and then you can use it as globals if needed. Don't edit.
$sortedLocations = getSortedLocationsById($locations);
$sortedEpisodes = getSortedEpisodesById($episodes);
$mappedCharacters = mapCharacters($characters);

$sql->closeMySQL();
?>

<html lang="es">
<head>
    <title>RMDB</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
            crossorigin="anonymous"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form class="d-flex" action="rickandmorty.php">
                <select class="form-control me-2 form-select" aria-label="Sorting criteria" name="sortingCriteria">
                    <option <?php echo($sortingCriteria == "" ? "selected" : "") ?> value="unsorted">Sorting criteria
                    </option>
                    <option <?php echo($sortingCriteria == "id" ? "selected" : "") ?> value="id">Id</option>
                    <option <?php echo($sortingCriteria == "origin" ? "selected" : "") ?> value="origin">Origin</option>
                    <option <?php echo($sortingCriteria == "status" ? "selected" : "") ?> value="status">Status</option>
                </select>
                <button class="btn btn-outline-success" type="submit">Sort</button>
            </form>
        </div>
    </div>
</nav>
<main role="main">
    <div class="py-5 bg-light">
        <div class="container">

            <div class="row">
                <?php
                    for ($i = 0; $i < count($mappedCharacters); $i++) {
                        echo render($mappedCharacters[$i]);
                    }
                ?>
            </div>
        </div>
    </div>

</main>
</body>
</html>