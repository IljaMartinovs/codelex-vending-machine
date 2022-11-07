<?php

function productCreation( string $name, float $price): stdClass {
    $products = new stdClass();
    $products->name = $name;
    $products->price = $price;
    return $products;
}

$products = [
    productCreation("Water",200),
    productCreation("Chips",70),
    productCreation("Snickers",150),
    productCreation("Candy",84),
    productCreation("Juice",76),
];

$coins = [1, 2, 5, 10, 20, 50, 100, 200];
$monets = [];
$machineCoins = [200=>0, 100=>0, 50=>0, 20=>0, 10=>1, 5=>0, 2=>3, 1=>1];

$insertedMoney = 0;
echo "To end inserting type stop\n";
echo "Insert coins : ";
$insertMoney = readline();

//Checking if coin is correct
while ($insertMoney !== "stop") {
    if ($insertMoney == '1' || $insertMoney == '2' || $insertMoney == '5' || $insertMoney == '10' || $insertMoney == '20'
        || $insertMoney == '50' || $insertMoney == '100' || $insertMoney == '200') {
        echo "Insert coins : ";
        $insertedMoney += round($insertMoney,2);
        $machineCoins[$insertMoney] += 1;
    } else {
        echo "Available coins - | 1 | 2 | 5 | 10 | 20 | 50 | 100 | 200 |"  . PHP_EOL;
    }
    $insertMoney = readline();
}

$insertedProduct = readline ("Price of products : [0]Water - 200 |
 [1]Chips - 70 |
 [2]Snickers - 150 |
 [3]Candy - 84 |
 [4]Juice - 176 : \n");

$selectedProduct = $products[$insertedProduct]->price;

//Checking if costumer has enough money for product
if($insertedMoney < $selectedProduct){
    echo 'Not enough money' . PHP_EOL;
    exit;
}
else if ($selectedProduct !== 0) {
    $insertedMoney -= $selectedProduct;

    echo "Purchased!" . " Money available {$insertedMoney}$\n";
}
$insertedChange = $insertedMoney;
$changeCoins  = $machineCoins;

//Checking if machine has money for a change
while($insertedMoney!=0) {
    if (intdiv($insertedMoney, $coins[7]) > 0 && $machineCoins[200] > 0) {
        while (intdiv($insertedMoney, $coins[7]) > 0 && $machineCoins[200] > 0) {
            $insertedMoney -= $coins[7];
            $machineCoins[200] = $machineCoins[200] - 1;
            array_push($monets, 200);
        }
    }
    else if (intdiv($insertedMoney, $coins[6]) > 0 && $machineCoins[100] > 0) {
        while (intdiv($insertedMoney, $coins[6]) > 0 && $machineCoins[100] > 0) {
            $insertedMoney -= $coins[6];
            $machineCoins[100] = $machineCoins[100] - 1;
            array_push($monets, 100);
        }
    }
    else if (intdiv($insertedMoney, $coins[5]) > 0 && $machineCoins[50] > 0) {
        while (intdiv($insertedMoney, $coins[5]) > 0 && $machineCoins[50] > 0) {
            $insertedMoney -= $coins[5];
            $machineCoins[50] = $machineCoins[50] - 1;
            array_push($monets, 50);
        }
    }
    else if (intdiv($insertedMoney, $coins[4]) > 0 && $machineCoins[20] > 0) {
        while (intdiv($insertedMoney, $coins[4]) > 0 && $machineCoins[20] > 0) {
            $insertedMoney -= $coins[4];
            $machineCoins[20] = $machineCoins[20] - 1;
            array_push($monets, 20);
        }
    }
    else if (intdiv($insertedMoney, $coins[3]) > 0 && $machineCoins[10] > 0) {
        while (intdiv($insertedMoney, $coins[3]) > 0 && $machineCoins[10] > 0) {
            $insertedMoney -= $coins[3];
            $machineCoins[10] = $machineCoins[10] - 1;
            array_push($monets, 10);
        }
    }
    else if (intdiv($insertedMoney, $coins[2]) > 0 && $machineCoins[5] > 0) {
        while (intdiv($insertedMoney, $coins[2]) > 0 && $machineCoins[5] > 0) {
            $insertedMoney -= $coins[2];
            $machineCoins[5] = $machineCoins[5] - 1;
            array_push($monets, 5);
        }
    }
    else if (intdiv($insertedMoney, $coins[1]) > 0 && $machineCoins[2] > 0) {
        while (intdiv($insertedMoney, $coins[1]) > 0 && $machineCoins[2] > 0) {
            $insertedMoney -= $coins[1];
            $machineCoins[2] = $machineCoins[2] - 1;
            array_push($monets, 2);
        }
    }
    else if (intdiv($insertedMoney, $coins[0]) > 0 && $machineCoins[1] > 0) {
        while (intdiv($insertedMoney, $coins[0]) > 0 && $machineCoins[1] > 0) {
            $insertedMoney -= $coins[0];
            $machineCoins[1] = $machineCoins[1] - 1;
            array_push($monets, 1);
        }
    }
    else {
        echo "Sorry we dont have coins!\n";
        exit;
    }
}

echo "Your change is ";
for($i=0; $i < count($monets); $i++){
    echo  $monets[$i] . "$ ";
}
echo PHP_EOL;
