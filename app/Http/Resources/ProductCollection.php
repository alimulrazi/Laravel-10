<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class ProductCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->collection,
            'meta' => ['product_count' => $this->collection->count()],
        ];

        // another example to add parameter based on your requirements
        // return [
        //     'data' => $this->collection->transform(function($page){
        //         return [
        //             'id' => $page->id,
        //             'title' => $page->title,
        //             'slug' => $page->slug,
        //         ];
        //     }),
        // ];
    }
}