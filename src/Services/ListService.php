<?php

namespace Mjderoode\ClickupApi\Services;

use Illuminate\Support\Collection;
use Mjderoode\ClickupApi\Client;

class ListService extends Client
{
    protected string $extended_base = 'list/';

    public function getList(int $list_id): Collection
    {
        $response = $this->getData(endpoint: "$list_id");

        return collect(['list' => $response->json()]);
    }

    public function updateList(int $list_id, array $data): Collection
    {
        $response = $this->putData(endpoint: "$list_id", data: $data);

        return collect(['updated_list' => $response->json()]);
    }

    public function deleteList(int $list_id): Collection
    {
        $this->deleteData(endpoint: "$list_id");

        return collect(['deleted_list_id' => $list_id]);
    }

    // copy command
    public function addTaskToList(int $list_id, string $task_id): Collection
    {
        $this->postData(endpoint: "$list_id/task/$task_id");

        return collect(['copied_task' => "$task_id to $list_id"]);
    }

    public function removeTaskFromList(int $list_id, string $task_id): Collection
    {
        $this->deleteData(endpoint: "$list_id/task/$task_id");

        return collect(['deleted_task' => "$task_id from $list_id"]);
    }

    public function getTasksForList(int $list_id): Collection
    {
        $response = $this->getData(endpoint: "$list_id/task");

        return collect(collect($response->json())->get('tasks'));
    }

    public function createTaskInList(int $list_id, array $data): Collection
    {
        $response = $this->postData(endpoint: "$list_id/task", data: $data);

        return collect(['created_task' => $response->json()]);
    }
}
