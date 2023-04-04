<?php

// TODO: Replace hardcoded data with .tsv source

// TODO: Code is a mess. Convert to this coding conventions: https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/


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

function get_data_from_google_sheet()
{
    $url = 'https://docs.google.com/spreadsheets/d/1wo_D2bJji_Sbq_tmuvOIlzbSst7Mbl5_TjoB769xVLI/export?format=tsv';

    $data_str = file_get_contents($url);
    if ($data_str === false) {
        return Null;
    } else {

        // Transform string we got from file_get_contents() into a stream type
        $stream = fopen('php://memory', 'r+');
        fwrite($stream, $data_str);
        rewind($stream);

        return transform_tsv_data_into_promises($stream);
    }
}

function get_data_from_tsv_file($filename)
{
    $list_of_promises = array();

    //$filename = 'test_data/test_data.tsv';
    $file = fopen($filename, 'r');

    $count = 0;

    if ($file) {
        $list_of_promises = transform_tsv_data_into_promises($file);

        fclose($file);
    }

    return $list_of_promises;
}

// Receives file/stream containing TSV data and outputs a list of "promise" structs
function transform_tsv_data_into_promises($data_stream)
{
    $list_of_promises = array();

    if ($data_stream) {
        while (($row = fgetcsv($data_stream, 0, "\t")) !== false) {
            // $row is an array of the values in the current row
            // do something with the values, such as print them
            //print_r($row);

            $count++;

            // Skip first row
            if ($count == 1) continue;

            if ($count == 100) {
                continue;
            }

            if (empty($row[2]) /*Mayor*/ || empty($row[3]) /*City*/)
            {
                continue;
            }

            $promise  = create_promise($row[0] /*Datum*/, $row[1] /*Category*/, $row[2] /*Mayor*/, $row[3] /*City*/, $row[9] /*status*/, $row[4] /*name*/, $row[5], $row[6], $row[7], $row[8], $row[9], $row[10]);

            array_push($list_of_promises, $promise);
        }
    }

    return $list_of_promises;
}

function get_hardcoded_data() {
    $promise1  = create_promise("4. 8. 2021.",    "Environment",      "Jane Smith",   "Seattle",      "DONE_DELAYED",                 "Reduce carbon emissions by 50%", "Launch a city-wide initiative to reduce carbon emissions",                                           "http://example.com/promise456", "Seattle",         "The initiative is currently being planned and will be launched soon", "The city expects to achieve its goal within the next 5 years");
    $promise2  = create_promise("5. 8. 2021.",    "Healthcare",       "Jane Smith",   "Los Angeles",  "DONE_ONTIME",                  "Build a new hospital", "Launch a project to build a new hospital in Los Angeles",                                                      "http://example.com/promise789", "Los Angeles",     "The hospital construction is underway", "The hospital is expected to be completed within the next 3 years");
    $promise3  = create_promise("2. 7. 2022.",    "Education",        "Jane Smith",   "Seattle",      "INPROGRESS_PARTIAL_DELAYED",   "Increase funding for public schools by 20%", "Propose a new budget allocation for public schools in San Francisco",                    "http://example.com/promise012", "San Francisco",   "The budget proposal is being reviewed by the city council", "The increased funding is expected to improve the quality of education in San Francisco schools");
    $promise4  = create_promise("27. 1. 2022.",   "Crime",            "Jane Smith",   "Seattle",      "INPROGRESS_PARTIAL_ONTIME",    "Reduce crime rates by 30%", "Launch a new crime prevention program in Chicago",                                                        "http://example.com/promise345", "Chicago",         "The crime prevention program is being implemented in high-crime areas", "The program is expected to reduce crime rates by 30% within the next 2 years");
    $promise5  = create_promise("5. 8. 2021.",    "Transportation",   "Susan Davis",  "Boston",       "NA",                           "Improve public transportation by 25%", "Launch a new project to upgrade public transportation infrastructure in Boston",               "http://example.com/promise678", "Boston",          "The project is currently being planned and will be launched soon", "The improved infrastructure is expected to increase ridership and reduce traffic congestion in Boston");
    $promise6  = create_promise("11. 11. 2021.",  "Energy",           "Mark Johnson", "Austin",       "NOTDONE_DELAYED",              "Implement renewable energy sources for city buildings", "Develop a plan to power all city buildings with renewable energy sources",    "http://example.com/promise123", "Austin",          "The plan is currently being developed by a team of experts", "The use of renewable energy sources will help reduce the city's carbon footprint");
    $promise7  = create_promise("8. 8. 2022.",    "Public safety",    "Emily Lee",    "New York",     "NOTDONE_ONTIME",               "Increase police presence in high-crime areas", "Launch a new initiative to increase police patrols in high-crime areas of the city",   "http://example.com/promise456", "New York City",   "The initiative is currently being implemented and has shown promising results", "The increased police presence is expected to deter crime and improve safety in those areas");
    $promise8  = create_promise("8. 8. 2022.",    "Infrastructure",   "John Brown",   "Houston",      "DONE_DELAYED",                 "Repair and upgrade city roads and bridges", "Allocate funds for repairing and upgrading city roads and bridges",                       "http://example.com/promise789", "Houston",         "The budget proposal for the road and bridge repairs is being reviewed by the city council", "The repaired and upgraded infrastructure will improve safety and convenience for drivers");
    $promise9  = create_promise("8. 8. 2022.",    "Environment",      "Sophia Kim",   "San Diego",    "DONE_ONTIME",                  "Increase the number of public parks and green spaces", "Develop a plan to create more public parks and green spaces in the city",      "http://example.com/promise012", "San Diego",       "The plan is currently being developed by a team of experts", "The increase in green spaces will improve the quality of life for residents and reduce the city's carbon footprint");
    $promise10 = create_promise("8. 8. 2022.",    "Environment",      "Jane Smith",   "Los Angeles",  "DONE_ONTIME",                  "Increase the number of public parks and green spaces", "Develop a plan to create more public parks and green spaces in the city",      "http://example.com/promise012", "San Diego",       "The plan is currently being developed by a team of experts", "The increase in green spaces will improve the quality of life for residents and reduce the city's carbon footprint");

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
    array_push($list_of_promises, $promise10);

    return $list_of_promises;
}


function get_data() {
    //return get_hardcoded_data();

    //return get_data_from_tsv_file("test_data/test_data.tsv");

    //return get_data_from_tsv_file("test_data/data_23_03_08.tsv");

    return get_data_from_google_sheet();
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


    $all_promises = get_data();

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

            if ($promise->status == "DONE_ONTIME" || $promise->status == "DONE_DELAYED") {
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
        public $promises;
    }

    class Comparison_Data {
        public $list_of_categories;
        public $list_of_mayors;
    }

    function createMayorOverview_for_promises($name, $city, $promises) {
        $obj = new MayorPromisesOverview();
        $obj->mayor_name = $name;
        $obj->city_name = $city;
        $obj->promises = $promises;

        return $obj;
    }

    $all_promises = get_data();

    // Data that will be returned by the function
    $comparison_data = new Comparison_Data();

    $list_of_categories = array();
    $mayors_dict = array();

    // Find all distict mayors and count their fullfilled promises for each category
    foreach($all_promises as $promise) {

        // Remeber all dinstict categories
        if ( ! in_array($promise->category, $list_of_categories)) {
            array_push($list_of_categories, $promise->category);
        }

        // TODO: A lot of code is identical between get_all_mayors_overview() and this function. Maybe share it
        $mayor_obj = null;

        $mayor_name = $promise->mayor_name;
        $mayor_city = $promise->city;

        $dict_key = $mayor_name . '_' . $mayor_city;

        // If dictionary entry exists then return it, create it if not
        if (array_key_exists($dict_key, $mayors_dict)) {
            $mayor_obj = $mayors_dict[$dict_key];
        } else {
            $mayor_obj = createMayorOverview_for_promises($mayor_name, $mayor_city, array());

            $mayors_dict[$dict_key] = $mayor_obj;
        }

        $mayor_promises = &$mayor_obj->promises;

        if ( ! array_key_exists($promise->category, $mayor_promises)) {
            // TODO: Turn this into structured data
            $mayor_promises[$promise->category] = array();
            $mayor_promises[$promise->category][0] = 0;
            $mayor_promises[$promise->category][1] = 0;
        }

        $mayor_promises[$promise->category][1] += 1;

        if ($promise->status == "DONE_ONTIME" || $promise->status == "DONE_DELAYED") {
            $mayor_promises[$promise->category][0] += 1;
        }
    }

    $comparison_data->list_of_mayors = $mayors_dict;
    $comparison_data->list_of_categories = $list_of_categories;

    return $comparison_data;
}


// TODO: mayor_name is currently ignored and data hardcoded
function get_single_mayor_data($mayor_name, $mayor_city) {

    // TODO: Remove this harcoded data and implement argument parsing from the URL
    // $mayor_name = "Jane Smith";
    // $mayor_city = "Seattle";

    if (($mayor_name == NULL) || ($mayor_city == NULL)) {
        return array();
    }

    // Get hardcoded list of promises
    $all_promises = get_data();

    // The list of promises to be returned
    // TODO: Rename this to better name
    $listOfPromises = array();

    // Find all distict mayors and count their fullfilled promises

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

    return $listOfPromises;
}

?>
