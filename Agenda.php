<!doctype html>

<html>

<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <title>Contacts agenda </title>
</head>

<body>
    <?php

    if (isset($_GET['agenda'])) // if agenda does exist, get it from global variable GET
        $agenda = $_GET['agenda'];
    else
        $agenda = ["Berta" => "763667366732"]; // if it does not exist make one, it'll start with my phone number (array)


    if (isset($_GET['submit'])) // if form is sent

    {
        $added_name = filter_input(INPUT_GET, 'name');
        $added_phone = filter_input(INPUT_GET, 'phone');
        if (empty($added_name)) // if added name is empty echo a warning message
        {
            echo "<p style='color: red'><b>Please, add a new name!!</b></p><br />";
        } elseif (empty($added_phone)) {
            echo "<p style=' color: red'><b>Please, add a new phone number!!</b></p><br />";
        } else {
           //add contact to agenda
            $agenda[$added_name] = $added_phone;
        }
    }
    ?>

    <h2>Add a new contact</h2>

    <form>
        <div style="align-items: left">
            <?php
            foreach ($agenda as $name => $telf) {
                echo '<input type="hidden" name="agenda[' . $name . ']" ';
                echo 'value="' . $telf . '"/>';
            }
            ?>
            <label>Name:<input type="text" name="name" /></label><br />
            <label>Phone:<input type="number" name="phone" placeholder="phone" /></label><br />
            <input type="submit" name='submit' value="Submit <3" /><br />
        </div>
    </form>
    <br />

    <h2>Agenda</h2>
    <?php

    function printContact($name, $telf)
    {
        echo "<li>" . $name . ': ' . $telf . "</li>";
    }

    if (count($agenda) == 0) {
        echo "<p>There is no contacts in agenda.</p>"; //shouldn't be necessary as I initialized agenda w my phone
    } else {
        echo "<ul>";
        foreach ($agenda as $name => $telf) {
            printContact($name, $telf);
        }
        echo "</ul>";
    }

    ?>
</body>

</html>