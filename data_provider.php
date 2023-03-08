<?php

// TODO: Merge data returned in these functions into a single source of hardcoded data
// TODO: Replace hardcoded data with csv/xml source




////////////////// Getters //////////////////////////////////////////////////

function get_all_mayors_overview() {

    class MayorOverview {
        public $mayor_name;
        public $city_name;
        public $num_of_promises;
        public $num_of_fulfilled_promises;
    }

    function createMayorOverview($name, $city, $num_of_fulfilled_promises, $num_of_promises) {
        $obj = new MayorOverview();
        $obj->mayor_name = $name;
        $obj->city_name = $city;
        $obj->num_of_promises = $num_of_promises;
        $obj->num_of_fulfilled_promises = $num_of_fulfilled_promises;

        return $obj;
    }

    $listOfMayors = array();

    array_push($listOfMayors, createMayorOverview("Mayor_1", "City_1", 5, 28));
    array_push($listOfMayors, createMayorOverview("Mayor_2", "City_2", 10, 29));
    array_push($listOfMayors, createMayorOverview("Mayor_3", "City_3", 15, 30));

    return $listOfMayors;
}


function get_all_mayors_comparison() {

    class MayorPromisesOverview {
        public $mayor_name;
        public $city_name;

        # Za pocetak samo hardcodirati sve kategorije, kasnije refaktorirati da sve dinamicki generira
        public $num_of_promises;
        public $num_of_fulfilled_promises;
    }

    function createMayorOverview_for_promises($name, $city, $promises) {
        $obj = new MayorPromisesOverview();
        $obj->mayor_name = $name;
        $obj->city_name = $city;
        $obj->promises = $promises;

        return $obj;
    }

    $promises = array(
        "Ekonomija i gospodarstvo"  => [1, 2],
        "Okoliš i zaštita prirode"  => [3, 4],
        "Urbanizam i stanovanje"    => [5, 6],
        "Promet"              => [7, 8],
        "Obrazovanje"         => [9, 9],
        "Kultura"             => [1, 2],
        "Zdravstvo"           => [3, 4],
        "Socijalna politika"  => [5, 6],
        "Sigurnost"           => [7, 8],
        "Mladi"               => [9, 9],
        "Civilno društvo"     => [1, 2],
        "Sport"               => [3, 4],
        "Mjesna samouprava"   => [5, 6],
        "Gradska uprava i upravljanje"  => [7, 8],
    );

    $listOfMayors = array();

    array_push($listOfMayors, createMayorOverview_for_promises("Gradonacelnik_1", "Grad_1", $promises));
    array_push($listOfMayors, createMayorOverview_for_promises("Gradonacelnik_2", "Grad_2", $promises));
    array_push($listOfMayors, createMayorOverview_for_promises("Gradonacelnik_3", "Grad_3", $promises));

    return $listOfMayors;
}


// TODO: mayor_name is currently ignored and data hardcoded
function get_single_mayor_data($mayor_name) {

    class Promise {
        public $name;
        public $category;
        public $description;
        public $url;
        public $location;
        public $result;
    }

    function createPromise($name, $category, $description, $url, $location, $result) {
        $obj = new Promise();
        $obj->name = $name;
        $obj->category = $category;
        $obj->description = $description;
        $obj->url = $url;
        $obj->location = $location;
        $obj->result = $result;

        return $obj;
    }

    $listOfPromises = array();

    # TODO: Convert category string values into enum values
    array_push($listOfPromises, createPromise("Promise_1", "Gradska uprava i upravljanje", "Description_1", "URL_1", "location_1", "result_1"));
    array_push($listOfPromises, createPromise("Promise_2", "Ekonomija i gospodarstvo", "Description_1", "URL_2", "location_1", "result_1"));
    array_push($listOfPromises, createPromise("Promise_3", "Urbanizam i stanovanje", "Description_1", "URL_3", "location_1", "result_1"));

    return $listOfPromises;
}

?>
