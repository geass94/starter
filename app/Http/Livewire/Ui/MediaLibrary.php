<?php

namespace App\Http\Livewire\Ui;

use App\Models\Folder;
use App\Models\Media;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class MediaLibrary extends Component
{
    use WithFileUploads;
    public $for;
    public $user;
    public $files = [];
    public $media = [];
    public $folder = ['id' => null, 'name' => ''];
    public $folders = [];
    public $cwd = null;
    public $selected = [];

    public function mount($id) {
        $this->for = $id;
        $this->user = Auth::user();
        $this->media = Media::query()->where('folder_id', '=', $this->cwd)->get();
        $this->folders = Folder::query()->whereNull('parent_id')->with('children')->get();
    }

    public function listLibrary($id) {
        $this->cwd = $id != 'root' ? $id : null;
        $this->updateMedia();
    }

    public function deleteFolder($id) {
        $folder = Folder::find($id);
        $directories = Storage::allDirectories("public/".$folder->structure());
        foreach ($directories as $item) {
            Storage::deleteDirectory($item);
        }
        $folder->delete();
    }

    public function upload() {
        $structure = 'files';
        $folder = Folder::find($this->cwd);
        if ($folder) {
            $structure = $folder->structure();
        }
        foreach ($this->files as $file) {
            $path = $file->store($structure, 'public');
            $media = Media::create([
                'name' => $file->hashName(),
                'original_name' => $file->getClientOriginalName(),
                'mime' => 'test',
                'extension' => $file->extension(),
                'size' => Storage::size("public/".$path),
                'url' => Storage::url("public/".$path),
                'folder_id' => $this->cwd
            ]);
            $media->owner()->associate($this->user);
        }
        $this->updateMedia();
    }

    public function createFolder() {
        $folder = (object)$this->folder;
        if (isset($folder->id) && $folder->id != 'root')
            $parent = $folder->id;
        else
            $parent = null;
        $fldr = Folder::create([
            'name' => $folder->name,
            'slug' => Str::slug($folder->name, '_'),
            'parent_id' => $parent
        ]);
        $fldr->owner()->associate($this->user);
        $this->folders = Folder::query()->whereNull('parent_id')->with('children')->get();
    }

    public function render()
    {
        return view('livewire.ui.media-library');
    }

    private function updateMedia() {
        $this->media = Media::query()->where('folder_id', '=', $this->cwd)->get();
    }
}
