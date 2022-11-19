<html>
    <head>
        <title>Prueba</title>
    </head>
    <body>
        <form>
            <input type="text" name="passwd" />
            <select name="machine">
                <option value="">Elige una opción</option>
                <option value="CPU">CPU</option>
                <option value="GPU">GPU</option>
                <option value="GRID">GRID</option>
            </select>
            <input type="submit" name="submit" value="Enviar" />
        </form>
        <?php
        if (isset($_GET['submit'])) {
            $passwd = filter_input(INPUT_GET,'passwd');
            $machine = filter_input(INPUT_GET,'machine');
            if (!empty($passwd) && !empty($machine)) {
                require 'resource/PasswordResource.php';
                $passwordResource = new PasswordResource();
                $ocurrences = $passwordResource->getTime($passwd, $machine);

                echo "<h3>Se tardaría en descifrar la contraseña: </h3>";
                echo "<p>";
                foreach ($ocurrences as $key => $value) {
                    if ($value > 0) {
                        echo $value . " " . $key . "<br>";
                    }
                }
                echo "</p>";

                $passwordResource->persist($passwd, $_SERVER['REMOTE_ADDR']);

                echo $passwords = $passwordResource->getPasswords();
            } else {
                echo "<p style='color:red'>Introduzca una contraseña y una máquina</p>";
            }
        }
        ?>
    </body>
</html>

