<?php
$hotels = [

    [
        'name' => 'Hotel Belvedere',
        'description' => 'Hotel Belvedere Descrizione',
        'parking' => true,
        'vote' => 4,
        'distance_to_center' => 10.4
    ],
    [
        'name' => 'Hotel Futuro',
        'description' => 'Hotel Futuro Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 2
    ],
    [
        'name' => 'Hotel Rivamare',
        'description' => 'Hotel Rivamare Descrizione',
        'parking' => false,
        'vote' => 1,
        'distance_to_center' => 1
    ],
    [
        'name' => 'Hotel Bellavista',
        'description' => 'Hotel Bellavista Descrizione',
        'parking' => false,
        'vote' => 5,
        'distance_to_center' => 5.5
    ],
    [
        'name' => 'Hotel Milano',
        'description' => 'Hotel Milano Descrizione',
        'parking' => true,
        'vote' => 2,
        'distance_to_center' => 50
    ],

];
//isset controlla se voto ha un valore, se ha un valore allora avrà il valore di get"voto" altrimenti 0
$filtro_voto = isset($_GET['voto']) ? ($_GET['voto']) : 0;
// qui sempre con isset controlliamo come sopra e assegna il valore quando è uguale a "1"
$filtro_parcheggio = isset($_GET['parcheggio']) && $_GET['parcheggio'] === '1';

// var_dump($filtro_voto);
// var_dump($filtro_parcheggio);

//creo un nuovo array vuoto
$hotel_filtrati = [];
// faccio un foreach per iterare sugli hotel e recuperare il singolo array nell'array, e facccio le condizioni, se il voto è uguale o maggiore del filtro_voto selezionato e
// se filtro parcheggio restituisce false oppure se restituisce il valore di parking allora questi hotel vengono pushati nell'array che viene stampato sull'html
foreach ($hotels as $hotel) {
    if (($hotel['vote'] >= $filtro_voto) && (!$filtro_parcheggio || $hotel['parking'])) {
        $hotel_filtrati[] = $hotel;
    }
}



?>




<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="card my-4 ">
            <form method="GET">
                <label>Filtro per voto:</label>
                <select name="voto" class="rounded-3">
                    <option value="1">1 stella</option>
                    <option value="2">2 stelle</option>
                    <option value="3">3 stelle</option>
                    <option value="4">4 stelle</option>
                    <option value="5">5 stelle</option>
                </select>

                <label for="parcheggio">Con parcheggio:</label>
                <input type="checkbox" name="parcheggio" value="1">

                <input type="submit" value="Filtra" class="rounded-3 btn btn-outline-secondary">
            </form>
        </div>
        <div class="card bg-danger">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">HOTEL</th>
                        <th scope="col">DESCRIZIONE</th>
                        <th scope="col">PARCHEGGIO</th>
                        <th scope="col">VOTO</th>
                        <th scope="col">DIS. CENTRO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($hotel_filtrati as $key => $hotel) {
                    ?>
                        <tr>
                            <th scope="row"><?php echo ($hotel["name"]) ?></th>
                            <td><?php echo ($hotel["description"]) ?></td>
                            <td><?php echo ($hotel["parking"]) ?></td>
                            <td><?php echo ($hotel["vote"]) ?></td>
                            <td><?php echo ($hotel["distance_to_center"]) ?> km</td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>




    <!-- bootstrap js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>

</html>