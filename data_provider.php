<?php

// TODO: Merge data returned in these functions into a single source of hardcoded data
// TODO: Replace hardcoded data with .tsv source



////////////////// Hardcoded data source //////////////////////////////////////////////////



class Promise {
    public $date;
    public $category;
    public $mayor_name;
    public $city;
    public $name;
    public $description;
    public $source_URL;     // Link na izvorno obecanje
    public $location;       // Lokacija obecanja
    public $status;
    public $status_description;
    public $analysis;        // Analiza obecanja
}

function create_promise($date, $category, $mayor_name, $city, $status, $name, $description, $source_URL, $location, $status_description, $analysis) {
    $promise = new Promise();
    $promise->date = $date;
    $promise->category = $category;
    $promise->mayor_name = $mayor_name;
    $promise->city = $city;
    $promise->name = $name;
    $promise->description = $description;
    $promise->source_URL = $source_URL;
    $promise->location = $location;
    $promise->status = $status;
    $promise->status_description = $status_description;
    $promise->analysis = $analysis;

    return $promise;
}


function get_test_data() {
    $promise1 = create_promise("4. 8. 2021.",    "Environment",      "Jane Smith",   "Seattle",      "DONE_DELAYED",                 "Reduce carbon emissions by 50%", "Launch a city-wide initiative to reduce carbon emissions",                                           "http://example.com/promise456", "Seattle",         "The initiative is currently being planned and will be launched soon", "The city expects to achieve its goal within the next 5 years");
    $promise2 = create_promise("5. 8. 2021.",    "Healthcare",       "Jane Smith",   "Los Angeles",  "DONE_ONTIME",                  "Build a new hospital", "Launch a project to build a new hospital in Los Angeles",                                                      "http://example.com/promise789", "Los Angeles",     "The hospital construction is underway", "The hospital is expected to be completed within the next 3 years");
    $promise3 = create_promise("2. 7. 2022.",    "Education",        "Jane Smith",   "Seattle",      "INPROGRESS_PARTIAL_DELAYED",   "Increase funding for public schools by 20%", "Propose a new budget allocation for public schools in San Francisco",                    "http://example.com/promise012", "San Francisco",   "The budget proposal is being reviewed by the city council", "The increased funding is expected to improve the quality of education in San Francisco schools");
    $promise4 = create_promise("27. 1. 2022.",   "Crime",            "Jane Smith",   "Seattle",      "INPROGRESS_PARTIAL_ONTIME",    "Reduce crime rates by 30%", "Launch a new crime prevention program in Chicago",                                                        "http://example.com/promise345", "Chicago",         "The crime prevention program is being implemented in high-crime areas", "The program is expected to reduce crime rates by 30% within the next 2 years");
    $promise5 = create_promise("5. 8. 2021.",    "Transportation",   "Susan Davis",  "Boston",       "NA",                           "Improve public transportation by 25%", "Launch a new project to upgrade public transportation infrastructure in Boston",               "http://example.com/promise678", "Boston",          "The project is currently being planned and will be launched soon", "The improved infrastructure is expected to increase ridership and reduce traffic congestion in Boston");
    $promise6 = create_promise("11. 11. 2021.",  "Energy",           "Mark Johnson", "Austin",       "NOTDONE_DELAYED",              "Implement renewable energy sources for city buildings", "Develop a plan to power all city buildings with renewable energy sources",    "http://example.com/promise123", "Austin",          "The plan is currently being developed by a team of experts", "The use of renewable energy sources will help reduce the city's carbon footprint");
    $promise7 = create_promise("8. 8. 2022.",    "Public safety",    "Emily Lee",    "New York",     "NOTDONE_ONTIME",               "Increase police presence in high-crime areas", "Launch a new initiative to increase police patrols in high-crime areas of the city",   "http://example.com/promise456", "New York City",   "The initiative is currently being implemented and has shown promising results", "The increased police presence is expected to deter crime and improve safety in those areas");
    $promise8 = create_promise("8. 8. 2022.",    "Infrastructure",   "John Brown",   "Houston",      "DONE_DELAYED",                 "Repair and upgrade city roads and bridges", "Allocate funds for repairing and upgrading city roads and bridges",                       "http://example.com/promise789", "Houston",         "The budget proposal for the road and bridge repairs is being reviewed by the city council", "The repaired and upgraded infrastructure will improve safety and convenience for drivers");
    $promise9 = create_promise("8. 8. 2022.",    "Environment",      "Sophia Kim",   "San Diego",    "DONE_ONTIME",                  "Increase the number of public parks and green spaces", "Develop a plan to create more public parks and green spaces in the city",      "http://example.com/promise012", "San Diego",       "The plan is currently being developed by a team of experts", "The increase in green spaces will improve the quality of life for residents and reduce the city's carbon footprint");

    $list_of_promises = array();

    array_push($list_of_promises, $promise1);
    array_push($list_of_promises, $promise2);
    array_push($list_of_promises, $promise3);
    array_push($list_of_promises, $promise4);
    array_push($list_of_promises, $promise5);
    array_push($list_of_promises, $promise6);
    array_push($list_of_promises, $promise7);
    array_push($list_of_promises, $promise8);
    array_push($list_of_promises, $promise9);

    return $list_of_promises;
}


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


    $all_promises = get_test_data();

    // Object that will be filled with "MayorOverview" instances and returned
    $mayors_dict = array();

    // Find all distict mayors and count their fullfilled promises
    {
        foreach($all_promises as $promise) {

            $mayor_obj = null;

            $mayor_name = $promise->mayor_name;
            $mayor_city = $promise->city;

            $dict_key = $mayor_name . '_' . $mayor_city;

            // If dictionary entry exists then return it, create it if not
            if (array_key_exists($dict_key, $mayors_dict)) {
                $mayor_obj = $mayors_dict[$dict_key];
            } else {
                $mayor_obj = createMayorOverview($mayor_name, $mayor_city, 0, 0);

                $mayors_dict[$dict_key] = $mayor_obj;
            }

            $mayor_obj->num_of_promises += 1;

            if ($promise->status == "DONE_ONTIME") {
                $mayor_obj->num_of_fulfilled_promises += 1;
            }
        }
    }

    return $mayors_dict;
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
function get_single_mayor_data($mayor_name, $mayor_city) {

    // TODO: Remove this harcoded data and implement argument parsing from the URL
    $mayor_name = "Jane Smith";
    $mayor_city = "Seattle";

    // Get hardcoded list of promises
    $all_promises = get_test_data();

    // The list of promises to be returned
    // TODO: Rename this to better name
    $listOfPromises = array();
    $listOfPromises["test_kategorija"] = array();

    // Find all distict mayors and count their fullfilled promises
    {
        foreach($all_promises as $promise) {

            $iter_mayor_name = $promise->mayor_name;
            $iter_mayor_city = $promise->city;

            if (($iter_mayor_name == $mayor_name) && ($iter_mayor_city == $mayor_city)) {

                if ( ! array_key_exists($promise->category, $listOfPromises)) {
                    $listOfPromises[$promise->category] = array();
                }

                array_push($listOfPromises[$promise->category], $promise);
            }
        }
    }

    # TODO: Convert category string values into enum values
    # array_push($listOfPromises, create_promise("Promise_1", "Gradska uprava i upravljanje", "Description_1", "URL_1", "location_1", "result_1"));
    # array_push($listOfPromises, create_promise("Promise_2", "Ekonomija i gospodarstvo", "Description_1", "URL_2", "location_1", "result_1"));
    # array_push($listOfPromises, create_promise("Promise_3", "Urbanizam i stanovanje", "Description_1", "URL_3", "location_1", "result_1"));

    return $listOfPromises;
}

?>
