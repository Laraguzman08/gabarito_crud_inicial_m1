<?php
    session_start();

    include("infra/db/connect.php");

    if($_SERVER['REQUEST_METHOD'] == "POST"){

        $usuario = $_POST["usuario"];
        $senha = $_POST["senha"];
        
        $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND senha = '$senha'";

        $resultado = $conn->query($sql);

        if ($resultado->num_rows > 0){
            $_SESSION["usuario"] = $usuario;
            header("Location: public/home.php");
            exit();
        }else{
            $erro = "Usuário ou senha inválidos!";
        }
    }
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="assets/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body class="body1">

    <main class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-lg-4">
                <div class="card p-4 shadow-lg">
                    <div class="position-relative mb-4">
                        <h1 style="font-size: 35px;">Sitema de Login Simples</h1>
                        <form method="POST">
                            <label class="form-label" style="font-size: 18px;">Usuário:</label>
                            <input type="text" name="usuario">
                            <br>
                            <label class="form-label" style="font-size: 18px;">Senha:</label>
                            <input type="password" name="senha">
                            <br>
                            <?php
                            
                                if(isset($erro)){
                                    echo $erro;
                                };
                        
                                // esse erro serve ara alguma coisa
                            
                            ?>
                            <br>
                            <button class="btn btn-primary w-100 shadow" type="submit">Entrar</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </main>
    
</body>
</html>