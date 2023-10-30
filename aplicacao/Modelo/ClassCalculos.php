<?php
class Calculadora {
    //quantidade de chapas para forro = (área do forro / área da chapa)
    public function QuantidadeChapasForro($area_forro){
        return ceil($area_forro / 1.2);
    }
    //quantidade massa = (área quadrada x 0,5 kg)
    public function QuantidadeMassaForro($area_forro){
        return ($area_forro * 0.5);
    }
    //quantidades fita = (área quadrada x 1,4 m)
    public function QuantidadeFitaForro($area_forro){
        return ceil(($area_forro * 1.4) / 150);
    }


    //quantidade de chapas para parede = (área da parede / área da chapa) x 2 
    public function QuantidadeChapasParede($area_parede){
        return ceil(($area_parede / 1.2) * 2);
    }
    //quantidades massa = (área quadrada x 0,5 kg x 2)
    public function QuantidadeMassaParede($area_parede){
        return ceil($area_parede * 0.5 * 2);
    }
    //quantidades fita = (área quadrada x 1,4 m x 2)
    public function QuantidadeFitaParede($area_parede){
        return ceil($area_parede * 1.4 * 2);
    }
    //quantidade de montantes parede = ((largura da parede / 0.6) + 1)
    public function QuantidadeMontantes($area_parede){
        return ceil(($area_parede / 0.6) + 1);
    }
    //quantidade de guias parede = ((largura da parede / 3)
    public function QuantidadeGuias($area_parede){
        return ceil($area_parede / 3);
    }



    //quantidade de parafusos = (n° de chapas x 50)
    public function QuantidadeParafuso($quantidade_chapas){
        return ceil($quantidade_chapas * 50);
    }
}