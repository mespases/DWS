<?php
include ("partido.php");
include("circunscripcion.php");
include("resultado.php");

    class logica {

        private $api_resultados = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=results";
        private $api_partidos = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=parties";
        private $api_distritos = "https://dawsonferrer.com/allabres/apis_solutions/elections/api.php?data=districts";

        private $partidos;
        private $distritos;
        private $resultados;

        public function __construct() {
            $this->resultados = $this->generateResults(json_decode(file_get_contents($this->api_resultados), true));
            $this->partidos = $this->generatePartidos(json_decode(file_get_contents($this->api_partidos), true));
            $this->distritos = $this->generateDistritos(json_decode(file_get_contents($this->api_distritos), true));
        }

        /* @return Array de objetos -> class Resultado */
        private function generateResults($resultadosjson) {
            for ($i = 0; $i < count($resultadosjson); $i++) {
                $resultados[$i] = new Resultado($resultadosjson[$i]["district"], $resultadosjson[$i]["party"],
                    $resultadosjson[$i]["votes"]);
            }

            return $resultados;
        }

        /* @return Array de objetos -> class Partido */
        private function generatePartidos($resultadosPartidos) {
            for ($i = 0; $i < count($resultadosPartidos); $i++) {
                $partidos[$i] = new Partido($resultadosPartidos[$i]["id"], $resultadosPartidos[$i]["name"],
                    $resultadosPartidos[$i]["acronym"], $resultadosPartidos[$i]["logo"]);
            }

            return $partidos;
        }

        /* @return Array de objetos -> class Circunscripcion */
        private function generateDistritos($distritosjson) {
            for ($i = 0; $i < count($distritosjson); $i++) {
                $distritos[$i] = new Circunscripcion($distritosjson[$i]["id"], $distritosjson[$i]["name"],
                    $distritosjson[$i]["delegates"]);
            }

            return $distritos;
        }

        private function mapp() {
            // En partido hacer dos nuevas variables con array, que añadan EJ:
            // PSOE, distrito[0]->Madrid, votos[0]->88423
            // PSOE, distrito[1]->Barcelona, votos->54216

            // TODO: NO SIRVE DE NADA D: BORRAR LUEGO y borrar en partido dist y votos

            for ($i = 0; $i < count($this->partidos); $i++) {
                $dist = [];
                $votos = [];
                $cont = 0;

                for ($j = 0; $j < count($this->resultados); $j++) {
                    if ($this->partidos[$i]->getNombre() == $this->resultados[$j]->getPartido()) {
                        $dist[$cont] = $this->resultados[$j]->getDistrito();
                        $votos[$cont] = $this->resultados[$j]->getVotos();
                        $cont++;
                    }
                }
                $this->partidos[$i]->setDistrito($dist);
                $this->partidos[$i]->setVotos($votos);
            }
         var_dump($this->partidos);
        }
    }

?>