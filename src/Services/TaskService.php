<?php

namespace Mjderoode\ClickupApi\Services;

use Illuminate\Support\Collection;
use Mjderoode\ClickupApi\Client;

class TaskService extends Client
{
    protected string $extended_base = 'task/';

    public function getTask(string $task_id): Collection
    {
        $response = $this->getData(endpoint: "$task_id");

        return collect(['task' => $response->json()]);
    }

    public function updateTask(string $task_id, array $data): Collection
    {
        $response = $this->putData(endpoint: "$task_id", data: $data);

        return collect(['updated_task' => $response->json()]);
    }

    public function deleteTask(string $task_id): Collection
    {
        $this->deleteData(endpoint: "$task_id");

        return collect(['deleted_task_id' => $task_id]);
    }

    public function getTasksForList(int $list_id): Collection
    {
        return (new \Mjderoode\ClickupApi\Services\ListService())
            ->getTasksForList($list_id);
    }

    public function createTaskInList(int $list_id, array $data): Collection
    {
        return (new \Mjderoode\ClickupApi\Services\ListService())
            ->createTaskInList($list_id, $data);
    }

    public function getTaskTimeInStatus(string $task_id, int $team_id): Collection
    {
        throw new \Exception('"getTaskTimeInStatus" is not yet implemented');
        $response = $this->getData(endpoint: "$task_id/time_in_status", query_parameters: ['custom_task_ids' => 'true', 'team_id' => $team_id]);

        return collect(['task' => $response->json()]);
    }

    public function getTaskBulkTimeInStatus(int $team_id): Collection
    {
        throw new \Exception('"getTaskBulkTimeInStatus" is not yet implemented');
        $response = $this->getData(endpoint: 'bulk_time_in_status/task_ids', query_parameters: ['task_ids' => 'string', 'custom_task_ids' => 'true', 'team_id' => $team_id]);

        return collect(['task' => $response->json()]);
    }
}
