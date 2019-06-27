<?php

//TODO make it less abstract
abstract class Controller
{
    abstract function actionDefault($params = false);
}