<?php

namespace App\Jobs;

use App\Models\Image;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Spatie\Image\Manipulations;
use Spatie\Image\Image as SpatieImage;

class WaterMark implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $article_image_id;


    /**
     * Create a new job instance.
     */
    public function __construct($article_image_id)
    {
        $this->article_image_id = $article_image_id;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $i = Image::find($this->article_image_id);
        if (!$i) {
            return;
        }
        $temp = explode('/', $i->path);
        $temp[2]='crop_400x400_' . $temp[2];
        $path = implode('/', $temp);
        $srcPath = storage_path('app/public/' . $path);
        $image = file_get_contents($srcPath);
        $image = SpatieImage::load($srcPath);

        $image->watermark(base_path('resources/img/Presto.it_watermarks.png'))
            ->watermarkOpacity(30)
            ->watermarkPosition(Manipulations::POSITION_CENTER)
            ->watermarkPadding(10, 10, Manipulations::UNIT_PERCENT)
            ->watermarkHeight(50, Manipulations::UNIT_PERCENT)
            ->watermarkWidth(50, Manipulations::UNIT_PERCENT);

        $image->save();
    }
}
