<?php

namespace app\commands;

use app\models\Event;
use yii\console\Controller;
use yii\console\ExitCode;

class EventController extends Controller
{
    public function actionUpdateStatuses()
    {
        $today = date('Y-m-d');

        $futureCount = Event::updateAll(
            ['status' => 'Предстоит'],
            [
                'or',
                ['>', 'start_date', $today],
                ['start_date' => null],
            ]
        );

        $pastCount = Event::updateAll(
            ['status' => 'Прошёл'],
            [
                'and',
                ['<=', 'start_date', $today],
                ['<', 'end_date', $today],
            ]
        );

        $ongoingCount = Event::updateAll(
            ['status' => 'Идёт'],
            [
                'and',
                ['<=', 'start_date', $today],
                [
                    'or',
                    ['>=', 'end_date', $today],
                    ['end_date' => null],
                ],
            ]
        );

        $this->stdout("Статусы обновлены:\n");
        $this->stdout("  Предстоит: {$futureCount}\n");
        $this->stdout("  Идёт:      {$ongoingCount}\n");
        $this->stdout("  Прошёл:    {$pastCount}\n");

        return ExitCode::OK;
    }
}