<?php
    $netid = '';

    function getData($field) {
        if (!isset($_POST[$field])) {
            $data = "";
        } else {
            $data = trim($_POST[$field]);
            $data = htmlspecialchars($data);
        }
        return $data;
    }

    $netid = getData('netid');

    $dataIsGood = true;
    if ($netid == '') {
        $dataIsGood = false;
    }

    // <!-- https://account.uvm.edu/support/user/ -->

    if ($dataIsGood) {
        header('Location: ' . 'https://account.uvm.edu/support/user/' . $netid);
    }
?>
<!DOCTYPE HTML>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <title>Better Account Lookup</title>
        <meta name="author" content="Aaron Perkel">
        <meta name="description" content="Fixing the broken UVM account lookup.">

        <meta name="viewport" content="width=device-width, 
        initial-scale=1.0">

        <link href="custom.css?version=<?php print time(); ?>" 
            rel="stylesheet" 
            type="text/css">

        <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    </head>
    <body>
        <header>
            <div class="header">
                <h1>Better Account Lookup</h1>
            </div>
        </header>

        <main>
            <form id="searchNetID" method="POST" enctype="multipart/form-data">
                <input type="text" name="netid" id="netid">
                <input type="submit">
            </form> 
        </main>
    </body>
</html> 