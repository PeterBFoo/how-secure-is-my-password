<html>
    <head>
        <title>How secure is my password</title>
    </head>
    <body>
    <ul>
        <h2>Contraseñas que hay en la base de datos</h2>
        <?php
        $ocurrences = ["años" => 0];
        $currences = ["años" => 0];
        $a = array_values($ocurrences);

        if(empty(array_values($ocurrences))) {
            echo "hi";
        }
        if (array_values($ocurrences) == array_values()) {
            echo "x";
        }

        ?>
    </ul>
    </body>
</html>

