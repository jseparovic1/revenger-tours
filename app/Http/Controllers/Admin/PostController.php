<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Admin\ViewModel\PostViewModel;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PostResourceRequest;
use App\Post;
use App\Services\ImageUploader;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostController extends Controller
{
    protected $resourceRouteKey = 'posts';
    protected $resourceName = 'Post';
    protected $identifier = 'slug';
    protected $fields = ['title', 'description', 'updated_at'];
    protected $imageFields = ['cover'];
    protected $resource = Post::class;
    protected $viewModel = PostViewModel::class;
    protected $requestClass = PostResourceRequest::class;

    /**
     * @var ImageUploader
     */
    private $imageUploader;

    public function __construct(ImageUploader $imageUploader)
    {
        $this->imageUploader = $imageUploader;
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("admin.{$this->resourceRouteKey}.index", [
            'fields' => $this->fields,
            'headers' => property_exists($this, 'headers')
                ? $this->headers
                : array_merge(
                    array_map(function ($header) {
                        return Str::ucfirst($header);
                    }, $this->fields),
                    ['Actions']
                ),
            'resourceName' => $this->resourceName,
            'resourceRouteKey' => $this->resourceRouteKey,
            'resources' => $this->resource::all()->map(function ($resource) {
                return $this->viewModel::createFromModel($resource);
            }),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.{$this->resourceRouteKey}.create", [
            'resourceName' => $this->resourceName,
            'imageFields' => $this->imageFields
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = (app($this->requestClass))->validated();

        $dataWithoutImages = array_filter($validatedData, function ($key) {
            return ! in_array($key, $this->imageFields);
        }, ARRAY_FILTER_USE_KEY);

        $resource = $this->resource::create($dataWithoutImages);

        foreach ($this->imageFields as $imageField) {
            $images = array_pull($validatedData, $imageField);
            $this->imageUploader->uploadForResource($resource, $imageField, $images);
        }

        $request->session()->flash('status', "{$this->resourceName} created successfully.");

        return redirect()->route("admin.{$this->resourceRouteKey}.edit", [
            Str::lower($this->resourceName) => $resource->{$this->identifier}
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {
        $resource = $this->resource::where(
            $this->identifier,
            $request->route(Str::lower($this->resourceName))
        )->firstOrFail();

        return view("admin.{$this->resourceRouteKey}.edit", [
            'resource' => $resource
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $resource = $this->resource::where(
            $this->identifier,
            $request->route(Str::lower($this->resourceName))
        )->firstOrFail();

        $validatedData = (app($this->requestClass))->validated();
        $resource->update($validatedData);

        foreach ($this->imageFields as $imageField) {
            $images = array_pull($validatedData, $imageField);
            $this->imageUploader->uploadForResource($resource, $imageField, $images);
        }

        $request->session()->flash('status', "{$this->resourceName} edited successfully.");

        return redirect()->route("admin.{$this->resourceRouteKey}.edit", [
            Str::lower($this->resourceName) => $resource->{$this->identifier}
        ]);
    }

    /**
     * Remove the specified resource from storage.
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        $resource = $this->resource::where(
            $this->identifier,
            $request->route(Str::lower($this->resourceName))
        )->firstOrFail();

        $resource->delete();

        $request->session()->flash('status', "{$this->resourceName} deleted successfully.");

        return redirect()->route("admin.{$this->resourceRouteKey}.index");
    }
}
