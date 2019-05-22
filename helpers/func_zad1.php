<?php

function studentTable($lang, $conn, $id_student)
{
//get data from $dm
    $DB_select = " SELECT `zoznam_predmetov`.`nazov`,`hodnotenie_predmetu`.`json_object`
FROM `zoznam_predmetov`
JOIN `hodnotenie_predmetu`
on `zoznam_predmetov`.`id_predmet` = `hodnotenie_predmetu`.`id_predmet`
WHERE `hodnotenie_predmetu`.`id_user` = $id_student ;";
//commit queries
    $DB_result = $conn->query($DB_select);
    $predmety = [];
    while ($row = $DB_result->fetch_assoc()) {
//decode object change to array and merge with identity
        $obj = json_decode($row['json_object']);
        $znamky = [];

        foreach ($obj as $key2 => $value2) {
            $znamky[$key2] = $value2;
        }
        $predmety[$row['nazov']] = $znamky;

    }
    table($predmety, true);

}

function tableAdmin($lang, $conn, $id_select = -1)
{
//get data from db
    data_Cookie($conn, $id_select);

    $data = $_COOKIE['admin_data'];

    table($data);
}

function table($data, $student = false)
{
//todo ziskaj meno alebo aj id z ineho z zdroja ako z pola<=>(DB)
    echo '<div class="table-responsive-sm tab2">';


    foreach ($data as $name => $users) {
        //            nazov predmetu
        echo '<h3>' . $name . ' </h3>';
        echo '<table class="table table-hover table-sm">';


        echo '<thead style="background-color: rgb(90, 0, 0);color: white;">';
        $headers = [];
        if ($student) {
            //get headers for student
            $headers = array_keys($users);
            echo '<tr>';
            foreach ($headers as $col) {
                //select weight
                echo '<th scope="col">' . $col . '</th>';
            }
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            //print user data
            foreach ($users as $key => $value) {
                echo '<td>' . $value . '</td>';
            }
            echo '</tr>';

        } else {
            foreach ($users as $id => $user) {
                //                create header cols
                if (count($headers) == 0) {

                    $headers = array_keys($user);
                    echo '<tr>';
                    echo '<th scope="col">ID</th>';
                    foreach ($headers as $col) {
                        //select weight
                        echo '<th scope="col">' . $col . '</th>';

                    }
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';
                }
                //print user data
                echo '<tr><td>' . $id . '</td>';//ID is key to user data

                foreach ($user as $key => $value) {
                    echo '<td>' . $value . '</td>';
                }
                echo '</tr>';
            }
        }
        echo '</tbody>';
        echo '</table>';
    }
    echo '</div>';
}

//id = -1 => select all
function data_Cookie($conn, $id_select = -1)
{

//GET ALL DATA FROM DB
    $DB_predmety = "select * from `zoznam_predmetov`";

//select only one student
    if ($id_select != -1) {
        $DB_predmety .= " where  `id_predmet` = $id_select";
    }
    $DB_result = $conn->query($DB_predmety);

    $predmety = [];
    while ($row = $DB_result->fetch_assoc()) {

        $predmety[$row['id_predmet']] = $row['nazov'];
    }


    $data = [];
//get data for esch line
    foreach ($predmety as $key => $value) {
        $DB_predmety = "SELECT `id_user`,`meno`,`json_object` FROM `hodnotenie_predmetu` WHERE `id_predmet` = " . intval($key);
        $DB_result = $conn->query($DB_predmety);
//data[pred1 = users[user1=>[znamky1],...usern=>[znamky2]]
        $data[$value] = array();

        while ($row = $DB_result->fetch_assoc()) {
            $identity = array('id_user' => $row['id_user'], 'meno' => $row['meno']);
//decode object change to array and merge with identity
            $obj = json_decode($row['json_object']);
            $znamky = [];

            foreach ($obj as $key2 => $value2) {
                $znamky[$key2] = $value2;
            }
            $data[$value][$identity['id_user']] = array_merge(array('meno' => $identity['meno']), $znamky);
        }

    }
//    var_dump($data);

    $_COOKIE['admin_data'] = $data;
//generate pdf
}

?>