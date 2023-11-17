<html>
    <head>
        <title> Realize seu login </title>
        <!-- Compiled and minified CSS -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">

        <!-- Compiled and minified JavaScript -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
                
    </head>
    <body>
        <h2> FAÇA SEU LOGIN </h2>
        <form action="usuario.php" method="post">
            <label for="email"> Email </label>
            <input type="text" id="email" required name="email"></br>
            <label for="senha"> senha </label>
            <input type="text" id="senha" required name="senha"></br>
          
            <label for="telefone"> Telefone </label>
            <input type="text" id="telefone" required name="telefone"></br>
            <label for="nome"> Nome </label>
            <input type="text" id="nome" required name="nome"></br>
            <input type="submit" value="Logar">
        </form>
    </body>
</html>