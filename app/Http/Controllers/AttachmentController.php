<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Attachment;
use Storage;

class AttachmentController extends Controller
{
    public function download($id) {
        $attachment = Attachment::findOrFail($id);
        return Storage::download($attachment->file, $attachment->filename);
    }
}
