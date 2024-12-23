<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Catalog;
use App\Models\CatalogImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Yajra\DataTables\DataTables;

class CatalogController extends Controller
{
    public $title = 'Produk';

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.catalog.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.catalog.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'product_name'  => 'required',
            'product_owner' => 'required',
            'product_price' => 'required|numeric',
            'product_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'product_name.required' => 'Nama tidak boleh kosong!',
            'product_owner.required' => 'Owner tidak boleh kosong!',
            'product_price.required' => 'Harga tidak boleh kosong!',
            'product_price.numeric' => 'Harga harus berisi angka!',
            'product_images.image' => 'File harus berupa gambar!',
            'product_images.mimes' => 'Gambar harus berformat jpeg, jpg, atau png!',
            'product_images.max' => 'Ukuran gambar maksimal 2MB!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        \DB::beginTransaction();
        try {
            // Create new object
            $cat = new Catalog();
            $cat->product_name = $request->product_name;
            $cat->product_owner = $request->product_owner;
            $cat->product_price = $request->product_price;
            $cat->product_description = $request->product_description;
            $cat->product_link = $request->product_link;
            $cat->published = $request->published == 'on' ? 1 : 0;

            // Store into database
            $cat->save();

            // Upload image
            if ($request->hasFile('product_images')) {
                $files = $request->file('product_images');
                if (count($files) > 4) {
                    return back()->with('errors', 'Maksimal 4 gambar yang dapat diupload!')->withInput();
                }

                foreach ($files as $file) {
                    $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                    $file->move(public_path('media/products'), $filename);

                    $catalogImage = new CatalogImage();
                    $catalogImage->catalog_id = $cat->id;
                    $catalogImage->image_path = $filename;
                    $catalogImage->save();
                }
            }

            \DB::commit();
            return redirect()->route('admin.catalog.index')->with('success', 'Penambahan ' . $this->title . ' baru berhasil');
        } catch (\Exception $e) {
            \DB::rollBack();
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali')->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect()->route('admin.catalog.edit', ['catalog' => $id]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Catalog::findOrFail($id);
        return view('admin.catalog.form')
            ->with('data', $cat);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cat = Catalog::find($id);
        if (!$cat) {
            return back()->with('errors', 'Terjadi kesalahan, ' . $this->title . ' tidak ditemukan')->withInput();
        }

        $validator = Validator::make($request->all(), [
            'product_name'  => 'required',
            'product_owner' => 'required',
            'product_price' => 'required|numeric',
            'product_images.*' => 'image|mimes:jpeg,png,jpg|max:2048',
        ],[
            'product_name.required' => 'Nama tidak boleh kosong!',
            'product_owner.required' => 'Owner tidak boleh kosong!',
            'product_price.required' => 'Harga tidak boleh kosong!',
            'product_price.numeric' => 'Harga harus berisi angka!',
            'product_images.image' => 'File harus berupa gambar!',
            'product_images.mimes' => 'Gambar harus berformat jpeg, jpg, atau png!',
            'product_images.max' => 'Ukuran gambar maksimal 2MB!',
        ]);

        if ($validator->fails()) {
            return back()->with('errors', $validator->messages()->all()[0])->withInput();
        }

        $cat->product_name = $request->product_name;
        $cat->product_owner = $request->product_owner;
        $cat->product_price = $request->product_price;
        $cat->product_description = $request->product_description;
        $cat->product_link = $request->product_link;
        $cat->published = $request->published == 'on' ? 1 : 0;

        // Upload image
        if ($request->hasFile('product_images')) {
            $files = $request->file('product_images');
            $existingImagesCount = CatalogImage::where('catalog_id', $cat->id)->count();
            $totalImagesCount = $existingImagesCount + count($files);

            if ($totalImagesCount > 4) {
                return back()->with('errors', 'Total gambar yang disimpan tidak boleh lebih dari 4!')->withInput();
            }

            foreach ($files as $file) {
                $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('media/products'), $filename);

                $catalogImage = new CatalogImage();
                $catalogImage->catalog_id = $cat->id;
                $catalogImage->image_path = $filename;
                $catalogImage->save();
            }
        }

        if ($cat->update()) {
            return redirect()->route('admin.catalog.index')->with('success', 'Perubahan ' . $this->title . ' berhasil');
        } else {
            return back()->with('errors', 'Terjadi kesalahan, silahkan coba kembali')->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // Display list in json
    public function json(Request $request)
    {
        if ($request->ajax()) {
            $data = Catalog::orderBy('created_at', 'DESC')->get();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    $cols = '<div class="d-flex">';
                    $cols .= '<a href="' . route('admin.catalog.edit', ['catalog' => $row->id]) . '" class="btn-sm btn-primary mx-1" title="Edit"><i class="fas fa-pen"></i></a>';
                    $cols .= '<a href="" data-url="' . route('admin.catalog.delete', ['catalog' => $row->id]) . '" data-text="' . $this->title . '" class="btn-sm btn-danger mx-1" onclick="deleteConfirm(event, this)" title="Hapus"><i class="fas fa-trash"></i></a>';
                    $cols .= '</div>';
                    return $cols;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    // Delete data
    public function delete($id)
    {
        $cat = Catalog::findOrFail($id);

        $img = CatalogImage::where('catalog_id', $cat->id)->get();
        foreach ($img as $i) {
            $i->delete();
        }

        if ($cat->delete()) {
            return back()->with('success', 'Dihapus');
        } else {
            return back()->with('errors', 'Terjadi kesalahan!');
        }
    }

    // Delete image
    public function imageDelete($id)
    {
        $img = CatalogImage::findOrFail($id);
        if ($img->delete()) {
            if (file_exists(public_path('media/products/' . $img->image_path))) {
                unlink(public_path('media/products/' . $img->image_path));
            }
            return back()->with('success', 'Dihapus');
        } else {
            return back()->with('errors', 'Terjadi kesalahan!');
        }
    }
}
