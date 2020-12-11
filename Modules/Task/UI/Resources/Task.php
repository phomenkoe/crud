<?php

namespace Modules\Task\UI\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class Task extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'description' => $this->description,
            'status' => $this->status,
            'status_name' => $this->convertStatus($this->status),
            'created_at' => $this->created_at ? Carbon::make($this->created_at)->format('d.m.Y H:i:s') : '',
            'updated_at' => $this->updated_at ? Carbon::make($this->updated_at)->format('d.m.Y H:i:s') : ''
        ];
    }

    /**
     * @param string $status
     * @return string
     */
    private function convertStatus(string $status): string {
        $statusList = [
            'in_work' => 'Выполняется',
            'on_pause' => 'Приостановлена',
            'finished' => 'Завершена'
        ];

        return $statusList[$status] ?? '';
    }
}
