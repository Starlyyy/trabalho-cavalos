<?php 

require_once('modelo/Bem.php');
require_once('modelo/Dinheiro.php');
require_once('modelo/Cavalos.php');
require_once('modelo/Aposta.php');

function listarCavalos($cavalos){
    foreach ($cavalos as $i => $cavalo) {
        printf("%d- Número do cavalo | %s | Saúde do cavalo: %d/10\n", $i + 1, $cavalo->getNomeCavalo(), $cavalo->getSaudeCavalo());
    }
}

function listarApostas($apostas){
    if(count($apostas) > 0){
        foreach ($apostas as $i => $aposta) {

            printf("%d- ", $i+1);
    
            if ($aposta instanceof Dinheiro) {
                printf("Aposta em dinheiro:\nValor: %2.f | Data da aposta: %s | Cavalo apostado: %d\n", $aposta->getValor(), $aposta->getDataAposta(), $aposta->getCavalo()->getNumCavalo());
            } elseif ($aposta instanceof Bem) {
                printf("Aposta com bem:\nTipo do bem: %s | Qualidade do bem: %s | Data da aposta: %s | Cavalo apostado: %d\n", $aposta->getTipoBem(), $aposta->getQualidade(), $aposta->getDataAposta(), $aposta->getCavalo()->getNumCavalo());
            } 
        }
    } else {
        echo "Nao ha nenhuma aposta registrada.";
    }
    
}

function apostasVencedoras($apostas){

    $cavaloVencedor = rand(1,9);
    $resultado = "";

    if (count($apostas) > 0) {
        foreach ($apostas as $aposta) {

            if ($aposta instanceof Dinheiro) {
                $resultado .= apostaDinheiro($aposta, $cavaloVencedor);
            } elseif ($aposta instanceof Bem) {
                $resultado .= apostaBem($aposta, $cavaloVencedor);
            } 

        }
    } else {
        $resultado = "Não há nenhuma aposta vencedora, pois não há nenhuma registrada.\n";
    }

    return $resultado;
    
}

function apostaDinheiro($aposta, $cavaloVencedor){
    $cavalo = $aposta->getCavalo();
    $mensagem = "\nA aposta no cavalo " . $cavalo->getNomeCavalo() . " de número " . $cavalo->getNumCavalo();

    if ($cavaloVencedor == $cavalo->getNumCavalo()) {
        $mensagem .= " foi uma aposta..\nVENCEDORA!!\n";

        $valorAposta = $aposta->getValor();

        $premio = ($cavalo->getNumCavalo() <= 5) ?
            $valorAposta * $cavalo->getNumCavalo() :
            $valorAposta * ($cavalo->getNumCavalo() / 5); //operador ternario - se a sentenca for verdadeira ent, blablabla, se nao, blablabla.

        $mensagem .= "Seu retorno será de R$ " . round($premio, 2) . ".\n\n";
    } else {
        $mensagem .= " foi uma aposta..\nperdedora...\nQuem sabe na próxima :D\n\n";
    }

    return $mensagem;
}

function apostaBem($aposta, $cavaloVencedor){
    $cavalo = $aposta->getCavalo();
    $mensagem = "\nA aposta no cavalo " . $cavalo->getNomeCavalo() . " de número " . $cavalo->getNumCavalo();

    if ($cavaloVencedor == $cavalo->getNumCavalo()) {
        $mensagem .= " foi uma aposta..\nVENCEDORA!!\n";
        $qualidade = $aposta->getQualidade();
        $mensagem .= "Você ganhará de volta seu bem apostado (" . $aposta->getTipoBem() . ") e...\n";

        switch ($qualidade) {
            case 1:
                $mensagem .= "Como a qualidade é 1, vai ganhar só isso mesmo, nada extra.\n\n";
                break;
            case 2:
                $mensagem .= "Como a qualidade é 2, ganhou um bombom também!\n\n";
                break;
            case 3:
                $mensagem .= "Como a qualidade é 3, ganhou um vale-gás!!\n\n";
                break;
            case 4:
                $mensagem .= "Como a qualidade é 4, ganhou um passeio no Parque das Aves!! Totalmente GRÁTIS!\n\n";
                break;
            case 5:
                $mensagem .= "Como a qualidade é 5, ganhou uma camisa autografada pelo Loco Abreu!\n\n";
                break;
        }
        
    } else {
        $mensagem .= " foi uma aposta..\nperdedora...\nQuem sabe na próxima :D\n\n";
    }

    return $mensagem;
}


$cavalos = [
    new Cavalos(1, 10, 'Clóvis'),
    new Cavalos(2, 7, 'Bernadete'),
    new Cavalos(3, 8, 'Sirigaita'),
    new Cavalos(4, 3, 'Pé de Meia'),
    new Cavalos(5, 5, 'Trote do Saci'),
    new Cavalos(6, 10, 'Tio Maricas'),
    new Cavalos(7, 9, 'Leite Texana'),
    new Cavalos(8, 1, 'Rita Silva'),
    new Cavalos(9, 1, 'Jeromo')
];

// echo printCavalo();

$apostas = [];

do {
    echo "\n\n-------------MENU-------------\n";
    echo "|1- Criar aposta             |\n";
    echo "|2- Excluir aposta           |\n";
    echo "|3- Listar apostas           |\n";
    echo "|4- Apostas vencedoras       |\n";
    echo "|0- Sair                     |\n";
    echo "------------------------------\n";
    $opcao = readline("Informe a opção: ");

    echo "\n";

    switch($opcao) {
        case 1:

            echo "Olá! Qual é o tipo de item que será apostado? \n1-Dinheiro\n2-Bens materiais\n\n";
            $op = (int)readline();
            echo "\n"; //pra deixar o terminal mais bonitinho.

            switch($op) {
                case 1:

                    $dinheiro = New Dinheiro();
                    $dinheiro->setValor(readline('Qual é o valor que seré apostado? '))->setDataAposta(readline('Qual é a data da aposta? '));

                    listarCavalos($cavalos);

                    do {

                        $id = readline('Informe o índice do cavalo em que deseja apostar: ');
                        $encontrou = false;

                        for ($i=0; $i < count($cavalos); $i++) { 
                            
                            if ($id == $cavalos[$i]->getNumCavalo()) {
                                $dinheiro->setCavalo($cavalos[$i]);
                                $encontrou = true;
                                break;
                            }                        
                        }

                    } while (!$encontrou);

                    // $id = readline('Informe o índice do cavalo que deseja apostar: ');

                    // for ($i=0; $i < count($cavalos); $i++) { 
                        
                    //     if ($id == $cavalos[$i]->getNumCavalo()) {
                    //         $dinheiro->setCavalo($cavalos[$i]);
                    //         break;
                    //     }                        
                    // }

                    array_push($apostas, $dinheiro);

                    break;


                case 2: 

                    // print_r($apostas);

                    $bem = New Bem();
                    $bem->setTipoBem(readline("Qual é o tipo de bem que você vai apostar? "))->setDataAposta(readline("Qual e a data da aposta? "));

                    echo "Qual é a qualidade do(a) " . $bem->getTipoBem() . "?\n\n1- Péssimo\n2- Ruim\n3- Mediano\n4- Bom\n5- Ótimo\n\n";
                    $bem->setQualidade(readline());
                    echo "\n";

                    listarCavalos($cavalos);
                    echo "\n"; //pra deixar o terminal mais bonitinho.

                    do {

                        $id = readline('Informe o índice do cavalo em que deseja apostar: ');
                        $encontrou = false;

                        for ($i=0; $i < count($cavalos); $i++) { 
                            
                            if ($id == $cavalos[$i]->getNumCavalo()) {
                                $bem->setCavalo($cavalos[$i]);
                                $encontrou = true;
                                break;
                            }                        
                        }

                    } while (!$encontrou);

                    // $id = readline('Informe o índice do cavalo que deseja apostar: ');

                    // for ($i=0; $i < count($cavalos); $i++) { 
                        
                    //     if ($id == $cavalos[$i]->getNumCavalo()) {
                    //         $bem->setCavalo($cavalos[$i]);
                    //         break;
                    //     }                        
                    // }

                    array_push($apostas, $bem);

                    break;


                default:

                    echo "Opção invalida.";

            }
            
            break;

        case 2:

            listarApostas($apostas);

            if (count($apostas) > 0) {
                $id = readline("Informe o índice da aposta que deseja excluir/cancelar: ");

                if ($id > 0 && $id <= count($apostas)) {
                    array_splice($apostas, $id-1, 1);
                } else {
                    echo "Essa aposta não existe!\n";
                }
                
            } 
            
            break;

        case 3:

            foreach ($apostas as $aposta) {
                echo $aposta->getAposta();
            }

            break;

        case 4:

            echo apostasVencedoras($apostas);

            break;

        case 0:
            echo "Programa encerrando!\n";
            break;

        default:
            echo "Opção inválida!\n";

    }

} while($opcao != 0);
