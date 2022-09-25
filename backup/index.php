<?php
    include 'database/PDO.php';

    #PDO Query
    $stmt = $connect->query("SELECT * FROM upti_activities");

    // GET ALL DATA

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo $row['activities_poid'] . "<br>";
    }

    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo $row->activities_poid . "<br>";
    }

    while ($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo $row->activities_poid . "<br>";
    }

    // POSITIONAL PARAMETERS
    $status = 'Order Delivered';

    $sql = "SELECT * FROM upti_activities WHERE activities_caption = ?";
    $stmt = $connect->prepare($sql);
    $stmt->execute([$status]);
    $orders = $stmt->fetchAll();

    // Name Parameterrs
    $sql = "SELECT * FROM upti_activities WHERE activities_caption = :activities_caption";
    $stmt = $connect->prepare($sql);
    $stmt->execute(['activities_caption' => $status]);
    $orders = $stmt->fetchAll();
    foreach ($orders as $order) {
        echo $order->activities_poid . "<br>";
    }

    // Getting Number of rows
    $sql = "SELECT * FROM upti_activities WHERE activities_caption = :activities_caption";
    $stmt = $connect->prepare($sql);
    $stmt->execute(['activities_caption' => $status]);
    $stmt_data_count = $stmt->rowCount();

    echo $stmt_data_count;

    $country = 'Samplesasas';
    $id = 12;
    #### PDO CRUD OPERATION
    $sql_insert = "INSERT INTO upti_country_currency (cc_country) VALUES (:country_name)";
    $stmt = $connect->prepare($sql_insert);
    $stmt->execute(['country_name' => $country]); #OR $stmt->execute(['country_name' => $country, 'country_price' => $counrty_price]);
    echo $stmt_data_count = $stmt->rowCount();

    $sql_update = "UPDATE upti_country_currency SET cc_country = :country_name WHERE id = :id";
    $stmt = $connect->prepare($sql_update);
    $stmt->execute(['country_name' => $country, 'id' => $id]);
    echo $stmt_data_count = $stmt->rowCount();

    $sql_delete = "DELETE FROM upti_country_currency WHERE id = ?";
    $stmt = $connect->prepare($sql_delete);
    $stmt->execute([$id]);  #OR $stmt->execute([$country, $counrty_price]);
    echo $stmt_data_count = $stmt->rowCount();

    $search = "%AN%";
    $sql_search = "SELECT * FROM upti_country_currency WHERE cc_country LIKE ?";
    $stmt = $connect->prepare($sql_search);
    $stmt->execute([$search]);  #OR $stmt->execute([$country, $counrty_price]);
    $rows = $stmt->fetchAll();
    $stmt_data_count = $stmt->rowCount();
    foreach ($rows as $row) {
        echo $row->cc_country . "<br>";
    }
?>