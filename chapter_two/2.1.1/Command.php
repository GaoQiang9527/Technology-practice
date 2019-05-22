<?php

interface Command
{
    public function execute();
}

class MealCommand implements Command
{
    private $cook;

    public function __construct(Cook $cook)
    {
        $this->cook = $cook;
    }

    public function execute()
    {
        $this->cook->meal();  // 把消息传递给厨师，让厨师做饭
    }
}

class DrinkCommand implements Command
{
    private $cook;

    public function __construct(Cook $cook)
    {
        $this->cook = $cook;
    }

    public function execute()
    {
        $this->cook->drink();
    }
}

class Cook
{
    public function meal()
    {
        echo '番茄炒蛋', PHP_EOL;
    }

    public function drink()
    {
        echo '紫菜蛋花汤', PHP_EOL;
    }

    public function ok()
    {
        echo '完毕', PHP_EOL;
    }
}

class cookControl
{
    private $mealCommand;
    private $dirnkCommand;

    public function addCommand(MealCommand $mealCommand, DrinkCommand $drinkCommand)
    {
        $this->mealCommand = $mealCommand;
        $this->dirnkCommand = $drinkCommand;
    }

    public function callmeal()
    {
        $this->mealCommand->execute();
    }

    public function calldrink()
    {
        $this->dirnkCommand->execute();
    }
}

$control = new cookControl();
$cook = new Cook();
$mealCommand = new MealCommand($cook);
$drinkCommand = new DrinkCommand($cook);
$control->addCommand($mealCommand, $drinkCommand);
$control->callmeal();
$control->calldrink();
