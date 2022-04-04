<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use App\Http\Requests\MassDestroyClientRequest;
use App\Http\Requests\StoreClientRequest;
use App\Http\Requests\UpdateClientRequest;
use App\Models\City;
use App\Models\Client;
use Gate;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Symfony\Component\HttpFoundation\Response;

class ClientController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('client_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $clients = Client::with(['city', 'media'])->get();

        $cities = City::get();

        return view('admin.clients.index', compact('cities', 'clients'));
    }

    public function create()
    {
        abort_if(Gate::denies('client_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.clients.create', compact('cities'));
    }

    public function store(StoreClientRequest $request)
    {
        $client = Client::create($request->all());

        if ($request->input('picture', false)) {
            $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
        }

        if ($request->input('cnic_pic', false)) {
            $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('cnic_pic'))))->toMediaCollection('cnic_pic');
        }

        if ($request->input('signature', false)) {
            $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('signature'))))->toMediaCollection('signature');
        }

        if ($request->input('thumb', false)) {
            $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $client->id]);
        }

        return redirect()->route('admin.clients.index');
    }

    public function edit(Client $client)
    {
        abort_if(Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $cities = City::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $client->load('city');

        return view('admin.clients.edit', compact('cities', 'client'));
    }

    public function update(UpdateClientRequest $request, Client $client)
    {
        $client->update($request->all());

        if ($request->input('picture', false)) {
            if (!$client->picture || $request->input('picture') !== $client->picture->file_name) {
                if ($client->picture) {
                    $client->picture->delete();
                }
                $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('picture'))))->toMediaCollection('picture');
            }
        } elseif ($client->picture) {
            $client->picture->delete();
        }

        if ($request->input('cnic_pic', false)) {
            if (!$client->cnic_pic || $request->input('cnic_pic') !== $client->cnic_pic->file_name) {
                if ($client->cnic_pic) {
                    $client->cnic_pic->delete();
                }
                $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('cnic_pic'))))->toMediaCollection('cnic_pic');
            }
        } elseif ($client->cnic_pic) {
            $client->cnic_pic->delete();
        }

        if ($request->input('signature', false)) {
            if (!$client->signature || $request->input('signature') !== $client->signature->file_name) {
                if ($client->signature) {
                    $client->signature->delete();
                }
                $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('signature'))))->toMediaCollection('signature');
            }
        } elseif ($client->signature) {
            $client->signature->delete();
        }

        if ($request->input('thumb', false)) {
            if (!$client->thumb || $request->input('thumb') !== $client->thumb->file_name) {
                if ($client->thumb) {
                    $client->thumb->delete();
                }
                $client->addMedia(storage_path('tmp/uploads/' . basename($request->input('thumb'))))->toMediaCollection('thumb');
            }
        } elseif ($client->thumb) {
            $client->thumb->delete();
        }

        return redirect()->route('admin.clients.index');
    }

    public function show(Client $client)
    {
        abort_if(Gate::denies('client_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->load('city', 'clientApplications');

        return view('admin.clients.show', compact('client'));
    }

    public function destroy(Client $client)
    {
        abort_if(Gate::denies('client_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $client->delete();

        return back();
    }

    public function massDestroy(MassDestroyClientRequest $request)
    {
        Client::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('client_create') && Gate::denies('client_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Client();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
