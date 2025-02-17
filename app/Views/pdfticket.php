<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="<?= ROOTURL ?>/public/styles/ticket.css">

    <title>Evento - Ticket</title>
</head>

<body>

    <div class="box">
        <?php
        $data = [
            'title' => 'Concert Live 2025',
            'price' => 49.99,
            'username' => 'John Doe',
            'local' => 'Paris, France',
            'date' => '2025-03-15',
            'tikcetId' => 'EVT123456'
        ];
        ?>
        <div class="ticket">
            <span class="airline">Evento</span>
            <span class="airline airlineslip">######</span>
            <div class="content">

                <span class="jfk"><?= htmlspecialchars($data['title']) ?></span>

                <span class="jfk jfkslip">Prix : </span>
                <span class="sfo sfoslip"><?= htmlspecialchars($data['price']) ?>$</span>
                <div class="sub-content">
                    <span class="watermark">Evento</span>
                    <span class="name">Nom Participant<br><span><?= htmlspecialchars($data['username']) ?></span></span>
                    <span class="flight">Localisation<br><span><?= htmlspecialchars($data['local']) ?></span></span>

                    <span class="boardingtime">Date
                        Evenement<br><span><?= htmlspecialchars($data['date']) ?></span></span>

                    <span class="number flightslip">Ticket
                        N&deg;<br><span><?= htmlspecialchars($data['tikcetId']) ?></span></span>
                </div>
            </div>
            <div class="barcode"></div>
            <div class="barcode slip"></div>
        </div>
    </div>
</body>

</html>