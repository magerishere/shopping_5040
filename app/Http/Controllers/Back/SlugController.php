<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Http\Requests\Back\SlugMakeContentRequest;
use App\Models\Product;
use App\Services\SlugService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class SlugController extends BackController
{

    public function __construct(protected SlugService $slugService)
    {

    }

    /**
     * @param SlugMakeContentRequest $request
     * @return JsonResponse|string
     */
    public function makeContentForProduct(SlugMakeContentRequest $request, ?Product $product = null): JsonResponse|string
    {
        $content = $this->slugService->useModel($product)->makeContent($request->get('value'));

        if ($request->expectsJson()) {
            return response()->json([
                'content' => $content
            ]);
        }

        return $content;
    }
}
