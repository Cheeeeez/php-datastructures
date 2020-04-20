<?php
include_once "Dancer.php";

$maleQueue = new SplQueue();
$femaleQueue = new SplQueue();

$maleDancer1 = new Dancer('Sergei Polunin', 'male');
$maleDancer2 = new Dancer('Roberto Bolle', 'male');
$maleDancer3 = new Dancer('Carlos Acosta', 'male');
$maleDancer4 = new Dancer('Julio Bocca', 'male');

$femaleDancer1 = new Dancer('Thandie Newton', 'female');
$femaleDancer2 = new Dancer('Sharon Leal', 'female');
$femaleDancer3 = new Dancer('Heather Hemmens', 'female');
$femaleDancer4 = new Dancer('Idina Menzel', 'female');
$femaleDancer5 = new Dancer('Bridget Moynahan', 'female');
$femaleDancer6 = new Dancer('April Bowlby', 'female');

$maleQueue->enqueue($maleDancer1);
$maleQueue->enqueue($maleDancer2);
$maleQueue->enqueue($maleDancer3);
$maleQueue->enqueue($maleDancer4);

$femaleQueue->enqueue($femaleDancer1);
$femaleQueue->enqueue($femaleDancer2);
$femaleQueue->enqueue($femaleDancer3);

echo createPairs() . "<br>";
echo createPairs() . "<br>";
echo createPairs() . "<br>";
echo createPairs() . "<br>";
$femaleQueue->enqueue($femaleDancer4);
$femaleQueue->enqueue($femaleDancer5);
$femaleQueue->enqueue($femaleDancer6);
echo createPairs() . "<br>";
echo createPairs() . "<br>";
echo "Waiting dancer: " . ($femaleQueue->count() + $maleQueue->count());

function createPairs()
{
    global $maleQueue;
    global $femaleQueue;
    if ($maleQueue->isEmpty() || $femaleQueue->isEmpty()) {
        return 'Waiting for partner';
    } else {
        return $maleQueue->dequeue()->name . ' - ' . $femaleQueue->dequeue()->name;
    }
}