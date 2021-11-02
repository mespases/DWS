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
            $this->passDistritos();
            $this->resultMap();
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
                    $resultadosPartidos[$i]["acronym"], $resultadosPartidos[$i]["logo"], $resultadosPartidos[$i]["colour"]);
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

        /* Mapea en la clase resultados el acronimo, logo y color del partido */
        private function resultMap() {
            for ($i = 0; $i < count($this->resultados); $i++) {
                for ($j = 0; $j < count($this->partidos); $j++) {
                    if ($this->resultados[$i]->getPartido() == $this->partidos[$j]->getNombre()) {
                        $this->resultados[$i]->setAcronimo($this->partidos[$j]->getAcronimo());
                        $this->resultados[$i]->setLogo($this->partidos[$j]->getLogo());

                        if ($this->partidos[$j]->getColor() == "") {
                            $this->resultados[$i]->setColor("#FFFFFF");
                        } else {
                            $this->resultados[$i]->setColor($this->partidos[$j]->getColor());
                        }
                    }
                }
            }
        }

        /* Pasa todos los distritos para ir asignando todos los escaños */
        private function passDistritos() {
            for ($i = 0; $i < count($this->distritos); $i++) {
                $this->calcularEscanosDistritos($this->distritos[$i]->getNombre(), $this->distritos[$i]->getDelegados());
            }
        }

        /* @return Array de resultados filtrados por provincia */
        private function filtrarXProvincia($distrito) {
            $resultXdistrito = [];
            $cont = 0;

            for ($i = 0; $i < count($this->resultados); $i++) {
                if ($this->resultados[$i]->getDistrito() == $distrito) {
                    $resultXdistrito[$cont] = $this->resultados[$i];
                    $cont++;
                }
            }

            return $resultXdistrito;
        }

        /* Asigna los escaños y el porcentaje */
        private function calcularEscanosDistritos($distrito, $escanos) {
            $resultXdistrito = $this->filtrarXProvincia($distrito);

            // Recorremos los escaños y los asignando
           for ($j = 0; $j < $escanos; $j++) {
                $this->asignarEscanos($resultXdistrito);
           }

           // Asignamos porcentaje para el grafico
            for ($k = 0; $k < count($resultXdistrito); $k++) {
                $porcentaje = ($resultXdistrito[$k]->getEscanos()*100)/$escanos;
                $resultXdistrito[$k]->setPorcentaje($porcentaje);
            }
        }

        /* Realiza el sistema d'Hont */
        private function asignarEscanos($resultXdistrito) {
            $posicion_del_mayor = 0;
            for ($k = 0; $k < count($resultXdistrito); $k++) {

                if ($resultXdistrito[$k]->getVotos()/$resultXdistrito[$k]->getDivisor() >
                    $resultXdistrito[$posicion_del_mayor]->getVotos()/$resultXdistrito[$posicion_del_mayor]->getDivisor()) {
                    $posicion_del_mayor = $k;
                }

            }
            $escanos_actuales = $resultXdistrito[$posicion_del_mayor]->getEscanos() + 1;
            $divisor_actual = $resultXdistrito[$posicion_del_mayor]->getDivisor() + 1;
            $resultXdistrito[$posicion_del_mayor]->setEscanos($escanos_actuales);
            $resultXdistrito[$posicion_del_mayor]->setDivisor($divisor_actual);
        }

        /* Nos ordena los resultados del mayor al menor */
        private function ordenarResultados($resultXdistrito) {
            for ($i = 0; $i < count($resultXdistrito); $i++) {
                for ($j = 0; $j < count($resultXdistrito); $j++) {
                    if (isset($resultXdistrito[$j+1]) && $resultXdistrito[$j]->getEscanos() < $resultXdistrito[$j+1]->getEscanos()) {
                        $resulpeque = $resultXdistrito[$j];
                        $resulgrande = $resultXdistrito[$j+1];
                        $resultXdistrito[$i] = $resulgrande;
                        $resultXdistrito[$i+1] = $resulpeque;
                    }
                }
            }

            return $resultXdistrito;
        }

        /* @return Array de resultados, mientras su porcentaje de votos, sea mayor a 0% */
        private function eliminarPorcentaje($resultXdistrito) {
            $resultProcentaje = [];

            $cont = 0;
            for ($i = 0; $i < count($resultXdistrito); $i++) {
                if ($resultXdistrito[$i]->getPorcentaje() != 0) {
                    $resultProcentaje[$cont] = $resultXdistrito[$i];
                    $cont++;
                }
            }

            return $resultProcentaje;
        }

        public function getProvincias() {
            return $this->distritos;
        }

        public function getPartidos() {
            return $this->partidos;
        }

        /* @param provincia ej->"Madird" @return result de distritos */
        public function getResultxProvincias($provincia) {
            $resultXdistrito = $this->filtrarXProvincia($provincia);
            $resultXdistrito = $this->eliminarPorcentaje($resultXdistrito);
            return $this->ordenarResultados($resultXdistrito);
        }
    }

?>