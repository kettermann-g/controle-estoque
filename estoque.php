<!DOCTYPE html>
<html lang="pt-br">
<script type="text/javascript" src="http://code.jquery.com/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="../js/tableFilter.js"></script>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="<?= $BASE_URL ?>/css/styles.css">

    <title>Entrada</title>
</head>
<body>  
    <header>
        <menu>
            <ul>
                <li class="cabecalho"><a href="www.g1.globo.com">INÍCIO</a></li>
                <li class="cabecalho"><a href="cadastro.html">CADASTRO</a></li>
                <li class="cabecalho"><a href="entrada.html">ENTRADA</a></li>
                <li class="cabecalho"><a href="saida.html">SAÍDA</a></li>
                <li class="cabecalho pg_atual">ESTOQUE</li>
            </ul>
        </menu>
    </header>

    <main>

        <div class="container" >

            <div class="content">
                <H1>ESTOQUE ATUAL</H1>
                <br>
                    <table id="tabela">
                        <thead>
                            <tr>
                                <th>Referência</th>
                                <th>Descrição</th>
                                <th>Quantidade</th>
                                <th>Valor Unitário</th>
                            </tr>
                            <tr>
                                <th><input type="text" id="txtColuna1"/></th>
                                <th><input type="text" id="txtColuna2"/></th>
                                <th><input type="text" id="txtColuna3"/></th>
                                <th><input type="text" id="txtColuna4"/></th>
                            </tr>            
                        </thead>
                        <tbody>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr><tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000001</td>
                                <td>Notebook Acer Nitro 5</td>
                                <td>3</td>
                                <td>3999.90</td>  
                            </tr>
                            <tr>
                                <td>000002</td>
                                <td>Headset Razer Kraken Lite</td>
                                <td>3</td>
                                <td>199.90</td>  
                            </tr>
                            <tr>
                                <td>000003</td>
                                <td>Teclado Redragon Kumara</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>
                            <tr>
                                <td>000004</td>
                                <td>Mouse Razer DeathAdder V2</td>
                                <td>3</td>
                                <td>299.90</td>  
                            </tr>   
                        </tbody>
                    </table>
                </div>
        </div>
    </main>
    <footer>Desenvolvido por</footer>
    
</body>
</html>