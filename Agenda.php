<!doctype html>

<html>
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8">
        <title>Agendita de contactos </title>
    </head>
    <body>
        <?php

if (isset($_GET['agenda'])) //si la agenda existe recúperala de al global get
$agenda = $_GET['agenda'];
else
$agenda = []; // si no existe créate un array vacío


if (isset($_GET['submit'])) //si se ha enviado el form
{
$nuevo_nombre = filter_input(INPUT_GET,'nombre');
$nuevo_telefono = filter_input(INPUT_GET,'teléfono');
if (empty($nuevo_nombre))
{
    echo "<p><b>Debe introducir un nombre!!</b></p><br />";
}
elseif (empty($nuevo_telefono))
{
    unset($agenda[$nuevo_nombre]);
}
else
{
    $agenda[$nuevo_nombre] = $nuevo_telefono;
}
}
?>

<h2>Nuevo contacto</h2>

        <form>
            <!-- Metemos los contactos ya existentes ocultos en el formulario -->
            <div style="align-items: left">
                <?php
                foreach ($agenda as $nom => $telf) {
                    echo '<input type="hidden" name="agenda[' . $nom . ']" ';
                    echo 'value="' . $telf . '"/>';
                }
                ?>
                <label>Nombre:<input type="text" name="nombre"/></label><br />
                <label>Teléfono:<input type="number" name="teléfono" placeholder= "teléfono" /></label><br />
                <input type="submit" name='submit' value="Envíe los datos"/><br />
            </div>
        </form>
        <br />

        <h2>Agenda</h2>
        <?php
        if (count($agenda) == 0)
        {
            echo "<p>No hay contactos en la agenda.</p>";
        }
        else
        {
            echo "<ul>";
            foreach ($agenda as $nom => $telf) {
                echo "<li>" . $nom . ': ' . $telf . "</li>";
            }
            echo "</ul>";
        };
        ?> 
    </body>
</html>