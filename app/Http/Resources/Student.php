<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Services\LinksGenerator;

class Student extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

        $links = new LinksGenerator;

        $links->addGet('self', route('students.show', $this->id));
        $links->addPut('update', route('students.update', $this->id));
        $links->addDelete('delete', route('students.destroy', $this->id));

        return [
            'id' => $this->id,
            'name' => $this->name,
            'birth' => $this->birth,
            'gender' => $this->gender,
            'classroom' => new Classroom($this->classroom),
            'links' => $links->toArray()
        ];
    }
}
