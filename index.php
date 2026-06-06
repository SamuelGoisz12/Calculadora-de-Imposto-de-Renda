    <!DOCTYPE html>
    <html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Calculadora de IR</title>
        <link rel="stylesheet" href="styles.css">
    </head>
    <body>

        <header class="hero">
            <div class="hero-content">
                <span class="tag">Projeto Acadêmico • PHP</span>
                <h1>Calculadora de Imposto de Renda</h1>
                <p>
                    Sistema desenvolvido para simular o cálculo do Imposto de Renda
                    com base em diferentes faixas salariais, utilizando lógica de programação em PHP.
                </p>

                <a href="#calculadora" class="hero-button">
                    Acessar Calculadora
                </a>
            </div>
        </header>

        <main>

            <section class="sobre">
                <div class="section-title">
                    <h2>O que é o Imposto de Renda?</h2>
                    <p>
                        O Imposto de Renda é um tributo cobrado pelo governo sobre os ganhos
                        de pessoas físicas e jurídicas. Seu objetivo é arrecadar recursos
                        para investimentos públicos em áreas como saúde, educação,
                        infraestrutura e segurança.
                    </p>
                </div>

                <div class="cards">
                    <div class="card">
                        <h3>Tributação Progressiva</h3>
                        <p>
                            O valor do imposto varia conforme a renda da pessoa.
                            Quanto maior o salário, maior pode ser a alíquota aplicada.
                        </p>
                    </div>

                    <div class="card">
                        <h3>Simulação Realista</h3>
                        <p>
                            Este sistema utiliza os valores reais da tabela de incidência mensal divulgada pela Receita Federal para 2026.
                        </p>
                    </div>

                    <div class="card">
                        <h3>Lógica Matemática</h3>
                        <p>
                            O projeto foi desenvolvido com estruturas condicionais,
                            cálculos percentuais e tratamento de formulários.
                        </p>
                    </div>
                </div>
            </section>

            <section class="tabela-section">
                <div class="section-title">
                    <h2>Faixas utilizadas no sistema</h2>
                    <p>
                        A calculadora aplica porcentagens diferentes conforme o salário informado.
                    </p>
                    <p>Fonte:</p>
                    <a href="https://www.gov.br/receitafederal/pt-br/assuntos/meu-imposto-de-renda/tabelas/2026" target="_blank">Tabela de Incidência Mensal 2026 - Receita Federal.</a>
                </div>

                <div class="table-container">
                    <table>
                        <thead>
                            <tr>
                                <th>Faixa Salarial</th>
                                <th>Alíquota</th>
                                <th>Dedução</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Até R$ 2.428,80</td>
                                <td>-</td>
                                <td>-</td>
                            </tr>

                            <tr>
                                <td>De R$ 2.428,81 até R$ 2.826,65</td>
                                <td><strong>7,5%</strong></td>
                                <td>R$ 182,16</td>
                            </tr>

                            <tr>
                                <td>De R$ 2.826,66 até R$ 3.751,05</td>
                                <td><strong>15%</strong></td>
                                <td>R$ 394,16</td>
                            </tr>

                            <tr>
                                <td>De R$ 3.751,06 até R$ 4.664,68</td>
                                <td><strong>22,5%</strong></td>
                                <td>R$ 675,49</td>
                            </tr>

                            <tr>
                                <td>Acima de R$ 4.664,68</td>
                                <td><strong>27,5%</strong></td>
                                <td>R$ 908,73</td>
                            </tr>
                        </tbody>
                </table>
        </div>
    <br>
        <div class="tutorial">
                    <p>O cálculo do imposto de renda é feito da seguinte maneira: <br> <br>
                    Salário Bruto X Alíquota(%) = Imposto. <br>
                    Imposto - Dedução = Valor Descontado. <br>
                    Salário Bruto - Valor descontado = Salário Líquido.
                </p>

            </div>
            </section>

            <section class="calc-section" id="calculadora">

                <div class="calc-info">
                    <span class="mini-tag">Calculadora</span>
                    <h2>Faça sua simulação</h2>

                    <p>
                        Insira o valor do salário bruto para descobrir qual seria
                        o desconto aplicado e o valor líquido restante.
                    </p>
                </div>

                <div class="container">

                    <!--Lógica que abre o formulário-->
                    <form action="#calculadora" method="post">

                        <label for="salario">Salário bruto:</label>

                        <input 
                            type="number"
                            step="0.01"
                            min="1"
                            max="1000000"
                            placeholder="Insira seu salário bruto"
                            required
                            name="salario"
                            id="salario"
                        >

                        <button type="submit">
                            Calcular imposto de renda
                        </button>

                    </form>

                    <div class="resultado">

    <!--Lógica que calcula imposto de renda com base no salário informado-->
    <?php 
        if (isset($_POST['salario'])){
            $salario = $_POST['salario'];

            if ($salario <= 2428.80){
                echo "Você está isento do imposto de renda.";
            }

            elseif($salario <= 2826.65){
                $imposto = $salario * 0.075;
                $deducao = 182.16;
                $calculo_deducao = $imposto - $deducao;
                $liquido = $salario - $calculo_deducao;

                echo "<strong>Salário Bruto</strong>= R$" . number_format($salario, 2, ",", ".") . "<br>";
                echo "<strong>Imposto</strong>= R$" . number_format($imposto, 2, ",", ".") . " (7,5%)" . "<br>";
                echo "<strong>Dedução</strong>= R$" . number_format($deducao, 2, ",", ".") . "<br>";
                echo "<strong>Valor a ser descontado</strong>= R$" . number_format($imposto, 2, ",", ".") . " - " . "R$" . number_format($deducao, 2, ",", ".") . " = " . "R$" . number_format($calculo_deducao, 2, ",", ".") . "<br>" . "<br>";
                echo "<strong>Salário Liquido</strong>= " . "R$" . number_format($liquido, 2, ",", ".") . "<br>";
                
            }

            elseif($salario <= 3751.05){
                $imposto = $salario * 0.15;
                $deducao = 394.16;
                $calculo_deducao = $imposto - $deducao;
                $liquido = $salario - $calculo_deducao;

                echo "<strong>Salário Bruto</strong>= R$" . number_format($salario, 2, ",", ".") . "<br>";
                echo "<strong>Imposto</strong>= R$" . number_format($imposto, 2, ",", ".") . " (15%)" . "<br>";
                echo "<strong>Dedução</strong>= R$" . number_format($deducao, 2, ",", ".") . "<br>";
                echo "<strong>Valor a ser descontado</strong>= R$" . number_format($imposto, 2, ",", ".") . " - " . "R$" . number_format($deducao, 2, ",", ".") . " = " . "R$" . number_format($calculo_deducao, 2, ",", ".") . "<br>" . "<br>";
                echo "<strong>Salário Liquido</strong>= " . "R$" . number_format($liquido, 2, ",", ".") . "<br>";
                
            }

            elseif($salario <= 4664.68){
                $imposto = $salario * 0.225;
                $deducao = 675.49;
                $calculo_deducao = $imposto - $deducao;
                $liquido = $salario - $calculo_deducao;

                echo "<strong>Salário Bruto</strong>= R$" . number_format($salario, 2, ",", ".") . "<br>";
                echo "<strong>Imposto</strong>= R$" . number_format($imposto, 2, ",", ".") . " (22,5%)" . "<br>";
                echo "<strong>Dedução</strong>= R$" . number_format($deducao, 2, ",", ".") . "<br>";
                echo "<strong>Valor a ser descontado</strong>= R$" . number_format($imposto, 2, ",", ".") . " - " . "R$" . number_format($deducao, 2, ",", ".") . " = " . "R$" . number_format($calculo_deducao, 2, ",", ".") . "<br>" . "<br>";
                echo "<strong>Salário Liquido</strong>= " . "R$" . number_format($liquido, 2, ",", ".") . "<br>";
                
            }

            elseif($salario > 4664.68 && $salario <= 1000000){
                $imposto = $salario * 0.275;
                $deducao = 908.73;
                $calculo_deducao = $imposto - $deducao;
                $liquido = $salario - $calculo_deducao;

                echo "<strong>Salário Bruto</strong>= R$" . number_format($salario, 2, ",", ".") . "<br>";
                echo "<strong>Imposto</strong>= R$" . number_format($imposto, 2, ",", ".") . " (27,5%)" . "<br>";
                echo "<strong>Dedução</strong>= R$" . number_format($deducao, 2, ",", ".") . "<br>";
                echo "<strong>Valor a ser descontado</strong>= R$" . number_format($imposto, 2, ",", ".") . " - " . "R$" . number_format($deducao, 2, ",", ".") . " = " . "R$" . number_format($calculo_deducao, 2, ",", ".") . "<br>" . "<br>";
                echo "<strong>Salário Liquido</strong>= " . "R$" . number_format($liquido, 2, ",", ".") . "<br>";
                
            }

            elseif($salario > 1000000){

                echo "Valor informado fora da faixa suportada pela calculadora. Digite um salário entre R$ 0,00 e R$ 1.000.000,00.";
            }
        }
        
        ?>

                    </div>

                </div>

            </section>

        </main>

    </body>
    </html>
