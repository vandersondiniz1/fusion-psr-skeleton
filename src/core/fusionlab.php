<?php

require_once(__DIR__ . '\..\utils\utils.php');
require_once(__DIR__ . '\..\utils\console.php');
require_once(__DIR__ . '\bugfix.php');
require_once(__DIR__ . '\hotfix.php');
require_once(__DIR__ . '\feature.php');

date_default_timezone_set('America/Sao_Paulo');

$msg = true;
$bugfix = false;
$hotfix = false;
$feature = false;
$branch = null;
$eng_bug = new Bugfix();
$eng_hotfix = new Hotfix();
$eng_feature = new Feature();

Console::log('Executing application', 'green');
logMsg('->Executing application ', 'info', 'fusionlab.php', '-');

/* FIXME: quando a aplicação é executada, acessamos o diretorio do 
repositorio externamente e nao neste mesmo terminal. Verificar a 
melhor forma de fazer isso. */

for ($i = 0; $i < $argc; $i++) {
    if ($argc == 1) {
        $modules = true;
        wellCome();
        logMsg('->Showing available modules', 'info', 'fusionlab.php', '-');
    }
}

for ($i = 1; $i < $argc; $i++) {
    if (strtolower($argv[2]) == 'bugfix') {
        $bugfix = true;
        $git = true;
        if (!empty($argv[3])) {
            $eng_id = preg_replace("/[^0-9]/", "", $argv[3]);
            if (empty($argv[4])) {
                $branch = 'master';
            }
        } else {
            echo Console::yellow('The eng number cannot be null', 'reverse') . "\n";
            logMsg('->The eng number cannot be null', 'info', 'fusionlab.php', '-');
            wellCome();
            return false;
        }
    } else
    if (strtolower($argv[2]) == 'hotfix') {
        $hotfix = true;
        if (!empty($argv[3])) {
            $eng_id = preg_replace("/[^0-9]/", "", $argv[3]);
            if (empty($argv[4])) {
                $branch = 'master';
            }
        } else {
            echo Console::yellow('The eng number cannot be null', 'reverse') . "\n";
            logMsg('->The eng number cannot be null', 'info', 'fusionlab.php', '-');
            wellCome();
            return false;
        }
    } else 
    if (strtolower($argv[2]) == 'feature') {
        $feature = true;
        if (!empty($argv[3])) {
            $eng_id = preg_replace("/[^0-9]/", "", $argv[3]);
            if (empty($argv[4])) {
                $branch = 'master';
            }
        } else {
            echo Console::yellow('The eng number cannot be null', 'reverse') . "\n";
            logMsg('->The eng number cannot be null', 'info', 'fusionlab.php', '-');
            wellCome();
            return false;
        }
    } else {
        echo Console::yellow('Invalid parameter', 'reverse') . "\n";
        logMsg('->Invalid parameter', 'info', 'fusionlab.php', '-');
        wellCome();
        return false;
    }
}

if ($bugfix) {
    $ret = $eng_bug->engBugfix($branch, $eng_id);
    if ($ret) {
        echo ('->Actual branch: ' . $ret . "\n");
        logMsg("->Actual branch:$ret", 'info', 'fusionlab.php', '-');
    } else {
        echo Console::yellow('Some info occurred on the execution process. Check the logs', 'reverse') . "\n";
        logMsg('->Some info occurred on the execution process. Check the logs', 'info', 'fusionlab.php', '-');
    }
}

if ($hotfix) {
    $ret = $eng_hotfix->engHotfix($branch, $eng_id);
    if ($ret) {
        echo ('->Actual branch: ' . $ret . "\n");
        logMsg("->Actual branch:$ret", 'info', 'fusionlab.php', '-');
    } else {
        echo Console::yellow('Some info occurred on the execution process. Check the logs', 'reverse') . "\n";
        logMsg('->Some info occurred on the execution process. Check the logs', 'info', 'fusionlab.php', '-');
    }
}

if ($feature) {
    $ret = $eng_feature->engFeature($branch, $eng_id);
    if ($ret) {
        echo ('->Actual branch: ' . $ret . "\n");
        logMsg("->Actual branch:$ret", 'info', 'fusionlab.php', '-');
    } else {
        echo Console::yellow('Some info occurred on the execution process. Check the logs', 'reverse') . "\n";
        logMsg('->Some info occurred on the execution process. Check the logs', 'info', 'fusionlab.php', '-');
    }
}

Console::log('Ending application', 'green');
logMsg('->Ending application ', 'info', 'fusionlab.php', '-');
