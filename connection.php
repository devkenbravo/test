<?php

$db = new mysqli('localhost', 'root', '', 'school_management');

if (isset($_POST['surname'])) {
    insert();
}

if (isset($_GET['info'])) {
    get();
}

function insert()
{
    global $db;

    extract($_POST);
    $sql = $db->query("INSERT INTO students(surname,firstname,othernames,school,phone,class,gender,lga,state,address)VALUES('$surname','$firstname','$othernames','$school','$phone','$class','$gender','$lga','$state','$address')");

    $id = $db->insert_id;
    $output = array(
        'id' => $id,
        'surname' => $surname,
        'firstname' => $firstname,
        'othername' => $othernames,
        'gender' => $gender,
        'phone' => $phone,
        'school' => $school
    );
    echo json_encode($output);
    return;
}

function get()
{
    global $db;
    extract($_GET);

    $sql = $db->query("SELECT * FROM students WHERE id ='$info'");
    $row = mysqli_fetch_assoc($sql);
    echo json_encode($row);
}
