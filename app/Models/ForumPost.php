<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class ForumPost extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'content'];

    // Relasi ke User
    public function user() { return $this->belongsTo(User::class); }

    // Relasi ke Tags
    public function tags() { return $this->belongsToMany(Tag::class, 'forum_post_tag'); }

    // Relasi ke Likes
    public function likes() { return $this->hasMany(ForumPostLike::class); }

    // Relasi ke Comments
    public function comments() { return $this->hasMany(Comment::class)->latest(); }

    // Helper: Cek apakah user yg login sudah like post ini?
    public function isLikedByAuthUser() {
        return $this->likes()->where('user_id', Auth::id())->exists();
    }
}