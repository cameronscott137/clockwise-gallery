<?php

namespace App\Nova;

use Illuminate\Http\Request;
use Laravel\Nova\Fields\Text;
use Laravel\Nova\Fields\ID;
use Laravel\Nova\Fields\Image;
use Laravel\Nova\Fields\Trix;
use Laravel\Nova\Http\Requests\NovaRequest;
use Illuminate\Support\Str;

use Storage;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Intervention\Image\Facades\Image as InterventionImage;
use Laravel\Nova\Fields\Number;
use Laravel\Nova\Fields\Select;

class GalleryImage extends Resource
{
    /**
     * The model the resource corresponds to.
     *
     * @var string
     */
    public static $model = 'App\GalleryImage';

    /**
     * The single value that should be used to represent the resource when being displayed.
     *
     * @var string
     */
    public static $title = 'name';

    /**
     * The columns that should be searched.
     *
     * @var array
     */
    public static $search = [
        'id',
        'name',
        'slug',
        'description'
    ];

    /**
     * Get the fields displayed by the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function fields(Request $request)
    {
        return [
            ID::make()->sortable(),
            Text::make('Slug')
                ->creationRules('required', 'unique:gallery_images,slug')
                ->resolveUsing(function ($slug) {
                    return Str::slug($slug, '-');
                }),
            Text::make('Name')
                ->help('This is for internal reference, and will not appear in the gallery itself.')
                ->rules('required'),
            Trix::make('Description')
                ->rules('required'),
            Number::make('Number of Colors', 'num_colors')
                ->help('If the image is a digital print, mark the number of colors as "1"')
                ->rules('required'),
            Select::make('Print Method')->options([
                'screenprinting' => 'Screenprinting',
                'embroidery' => 'Embroidery',
                'digital' => 'Digital'
            ])->displayUsingLabels(),
            Select::make('Category')->options([
                'tees' => 'Tees',
                'hats' => 'Hats',
                'hoodies' => 'Hoodies',
                'zip-ups' => 'Zip-ups',
                'sweatshirts' => 'Sweatshirts',
                'polos' => 'Polos',
                'shorts' => 'Shorts',
                'longsleeves' => 'Longsleeves',
                'totes' => 'Totes',
                'beanies' => 'Beanies',
                'vests' => 'Vests',
                'baby' => 'Baby',
                'bags' => 'Bags'
            ])->displayUsingLabels(),
            Image::make(str_repeat(' ', 8), 'image_url')
                ->disk('s3')
                ->creationRules('required', 'mimes:jpeg,jpg')
                ->help('Please upload a .jpg image that is at least 1600 pixels wide. The image will be automatically be cropped to fit.')
                ->store(function (Request $request, $model) {
                    $time = time();
                    $fileSmall = "media/gallery/{$this->id}_{$time}_sm." . $request->image_url->getClientOriginalExtension();
                    $fileLarge = "media/gallery/{$this->id}_{$time}_lg." . $request->image_url->getClientOriginalExtension();

                    $imageSmall = InterventionImage::make($request->image_url)->resize(800, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->interlace()
                    ->encode('jpg', 85);

                    $imageLarge = InterventionImage::make($request->image_url)->resize(1500, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })
                    ->interlace()
                    ->encode('jpg', 100);

                    // Store on S3
                    Storage::disk('s3')->put($fileSmall, (string) $imageSmall, 'public');
                    Storage::disk('s3')->put($fileLarge, (string) $imageLarge, 'public');
                    return [
                        'small_image_url' => Storage::disk('s3')->url($fileSmall),
                        'large_image_url' => Storage::disk('s3')->url($fileLarge),
                    ];
                })
                ->deletable()
                ->thumbnail(function () {
                    return $this->small_image_url;
                })->preview(function () {
                    return $this->small_image_url;
                }),

        ];
    }

    /**
     * Get the cards available for the request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function cards(Request $request)
    {
        return [];
    }

    /**
     * Get the filters available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function filters(Request $request)
    {
        return [];
    }

    /**
     * Get the lenses available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function lenses(Request $request)
    {
        return [];
    }

    /**
     * Get the actions available for the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function actions(Request $request)
    {
        return [];
    }
}
