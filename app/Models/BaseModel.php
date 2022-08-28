<?php /** @noinspection ALL */

    namespace App\Models;

    use Illuminate\Database\Eloquent\Model as Eloquent;
    use Spatie\MediaLibrary\HasMedia;
    use Spatie\MediaLibrary\InteractsWithMedia;

    class BaseModel extends Eloquent implements HasMedia
    {
        use InteractsWithMedia;
        protected $guarded = ['id'];
    }
