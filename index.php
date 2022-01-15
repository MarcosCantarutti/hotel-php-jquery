<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Site Hotel" name="description">
    <link rel="stylesheet" href="./style/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/themes/base/jquery-ui.min.css" integrity="sha512-okE4owXD0kfXzgVXBzCDIiSSlpXn3tJbNodngsTnIYPJWjuYhtJ+qMoc0+WUwLHeOwns0wm57Ka903FqQKM1sA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Hotel</title>
</head>

<body>
    <div class="topo-pagina">
        <div class="base-pagina">

            <div class="pagina">

                <div class="main">

                    <div class="header">
                        <div class="header-topo">
                            <h1>Hotel</h1>
                            <h2>A rede de hotéis com tudo que voce precisa para seu descanso e lazer</h2>
                        </div>
                        <div class="header-base">
                            <p>Usuario:</p>
                        </div>
                        <div class="barra-menu">
                            <div class="dropdown">
                                <button class="dropbutton">Consulta</button>
                            </div>
                            <div class="dropdown">
                                <button class="dropbutton">Cadastro</button>
                            </div>
                            <div class="dropdown">
                                <button class="dropbutton">Reserva</button>
                            </div>
                            <div class="dropdown">
                                <button class="dropbutton">Histórico</button>
                            </div>
                            <div class="dropdown">
                                <button class="dropbutton">Login</button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="conteudo-corpo">
                    <div class="coluna-esquerda" id="conteudo">
                        <?php
                        require_once("./classBancoDados.php");
                        $conexao_bd = new classBancoDados("localhost");
                        if (!$conexao_bd->AbrirConexao()) {
                            echo "<p>Erro na conexão com o banco de dados! <br>" . $conexao_bd->MensagemErro() . "</p>";
                        } else {
                            $conexao_bd->setSelect("*", "hoteis", "UF, Cidade");
                            if ($conexao_bd->ExecSelect()) {
                                $NumeroRegistros = $conexao_bd->TotalRegistros();
                                $DataSet = $conexao_bd->GetDataSet();

                                if ($NumeroRegistros > 0) {
                                    while ($Registros = $DataSet->fetch_assoc()) {
                                        $EnderecoHotel = "<p><b>" . trim($Registros["Endereco"]) . "," . trim($Registros["Numero"]) . "<br>";
                                        $EnderecoHotel .= trim($Registros["Bairro"]) . "-" . $Registros["Cidade"] . "<br>";
                                        $EnderecoHotel .= $Registros["UF"] . "- Fone:" . $Registros["Telefone"] . "<br></b></p>";
                                        echo $EnderecoHotel;
                                    }
                                }
                            } else {
                                echo "<p>Erro na execução do comando SELECT</p>";
                            }
                        }
                        $conexao_bd->FecharConexao();
                        ?>
                    </div>
                    <div class="coluna-direita">
                        <div class="linha1-coluna-direita">
                            <div class="calendario" align="center" id="calendario"></div>
                        </div>
                        <div class="separacao-linhas">

                        </div>
                        <div class="linha2-coluna-direita">
                            <p>Segunda linha da coluna</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="rodape-pagina">
                <div align="center">
                    <p>&copy; Copyright 2016. Designed by William Pereira Alves</p>
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>

    <script src="./scripts/script.js"></script>
</body>

</html>