<?php 

require_once('modelo/Bem.php');
require_once('modelo/Dinheiro.php');
require_once('modelo/Cavalos.php');
require_once('modelo/Aposta.php');

function listarCavalos($cavalos){
    foreach ($cavalos as $i => $cavalo) {
        printf("%d- Número do cavalo | %s | Saúde do cavalo: %d / 10", $i + 1, $cavalo->getNumCavalo(), $cavalo->getNomeCavalo(), $cavalo->getSaudeCavalo());
    }
}

$cavalos = [
    new Cavalos(1, 10, 'Clóvis'),
    new Cavalos(2, 7, 'Bernadete'),
    new Cavalos(3, 8, 'Sirigaita'),
    new Cavalos(4, 3, 'Pé de Meia'),
    new Cavalos(5, 5, 'Trote do Saci'),
    new Cavalos(6, 10, 'Tio Maricas'),
    new Cavalos(7, 9, 'Leite Texana'),
    new Cavalos(8, 1, 'Rita Banana'),
    new Cavalos(9, 1, 'Jeromo')
];

do {
    echo "\n\n-----------MENU-----------\n";
    echo "1- Apostar\n";
    echo "2- Excluir aposta\n";
    echo "3- Listar apostas \n";
    echo "0- Sair\n";
    echo "--------------------------\n";
    $opcao = readline("Informe a opção: ");

    echo "\n";

    switch($opcao) {
        case 1:

            echo "Olá! Qual é o tipo de item que será apostado? \n1-Dinheiro\n2-Bens materiais\n\n";
            $op = (int)readline();

            switch($op) {
                case 1:

                    $dinheiro = New Dinheiro();
                    $dinheiro->setValor(readline('Qual é o valor que seŕa apostado?'))->setDataAposta(readline('Que dia é hoje/Qual é a data da aposta?'));

                    listarCavalos($cavalos);
                    
                    //mudar para do-while

                    $id = readline('Informe o índice do cavalo que deseja apostar: ');

                    
                    for ($i=0; $i < count($cavalos); $i++) { 
                        
                        if ($id == $cavalos[$i]->getNumCavalo()) {
                            $dinheiro->setCavalo($cavalos[$i]);
                            break;
                        }                        
                    }


                case 2: 



            }
            
            break;

        case 2:

            
            
            break;

        case 3:

            

            break;

        case 0:
            echo "Programa encerrado!\n";
            break;

        default:
            echo "Opção inválida!\n";

    }

} while($opcao != 0);
