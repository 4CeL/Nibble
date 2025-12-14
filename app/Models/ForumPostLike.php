<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class ForumPostLike extends Model
{
    protected $table = 'forum_post_likes'; // Definisikan nama tabel manual
    protected $fillable = ['user_id', 'forum_post_id'];
    public $timestamps = false; // Biasanya tabel like gak butuh timestamp
}