<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductTopic extends Model
{
    protected $table = 'product_topics';
    protected $fillable = [
        'product_id',
        'topic_description',
        'image',
        'description'
    ];

    public function addTopic($description = null, $text = null, $product_id = null){
        return $this->create([
            'product_id' => $product_id,
            'topic_description' => $description,
            'description' => $text,
            'image' => null,
        ]);
    }

    public function updateTopic($topic_id, $description, $description2){
        $topic = $this->find($topic_id);
        $topic->topic_description = $description;
        $topic->description = $description2;
        $topic->save();

        return $topic;
    }

    public function updateTopicImage($topic, $imageName = null){
        $topic->image = $imageName;
        $topic->save();
    }
}
