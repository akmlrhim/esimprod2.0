<?php

namespace App\Http\Controllers\Admin;

use App\Models\GuideBook;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class GuideBookController extends Controller
{
	public function index()
	{
		$data = [
			'title' => 'Buku Panduan',
			'guideBook' => GuideBook::get()
		];

		return view('admin.guidebook.index', $data);
	}

	public function store(Request $request)
	{
		$request->validate([
			'file' => 'required|file|mimes:pdf|max:2048',
		], [
			'file.required' => 'File wajib diisi.',
			'file.file' => 'File harus berupa file.',
			'file.mimes' => 'File harus dalam format pdf.',
			'file.max' => 'Ukuran file maksimal adalah 2MB.',
		]);

		if ($request->hasFile('file')) {
			$file = $request->file('file');
			$filename = time() . '.' . $file->getClientOriginalExtension();
			$file->storeAs('uploads/guidebook', $filename, 'public');
			$data['file'] = $filename;
		}

		GuideBook::create([
			'uuid' => Str::uuid(),
			'file' => $data['file'],
			'status' => 'unused'
		]);

		notify()->success('Guidebook berhasil diupload !');
		return redirect()->back();
	}

	public function unused(string $uuid)
	{
		GuideBook::where('uuid', $uuid)
			->firstOrFail()
			->update('status', 'unused');

		notify()->warning('Guidebook tidak digunakan !');
		return redirect()->back();
	}

	public function used(string $uuid)
	{
		GuideBook::where('uuid', $uuid)
			->firstOrFail()
			->update('status', 'used');

		notify()->success('Guidebook digunakan !');
		return redirect()->back();
	}
}
