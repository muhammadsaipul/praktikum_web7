<?php

namespace App\Http\Controllers;

// Import model product
use App\Models\Product;

// Import return type View
use Illuminate\View\View;

// Import return type RedirectResponse
use Illuminate\Http\RedirectResponse;

// Import Http Request
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the products.
     *
     * @return View
     */
    public function index(): View
    {
        // Get all products
        $products = Product::latest()->paginate(10);

        // Render view with products
        return view('products.index', compact('products'));
    }

    /**
     * Show the form for creating a new product.
     *
     * @return View
     */
    public function create(): View
    {
        return view('products.create');
    }

    /**
     * Store a newly created product in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request): RedirectResponse
    {
        // Validate form
        $request->validate([
            'image'       => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);

        // Upload image
        $image = $request->file('image');
        $image->storeAs('public/products', $image->hashName());

        // Create product
        Product::create([
            'image'       => $image->hashName(),
            'title'       => $request->title,
            'description' => $request->description,
            'price'       => $request->price,
            'stock'       => $request->stock,
        ]);

        // Redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }
    /**
     * Display the specified product.
     *
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        // Get product by ID
        $product = Product::findOrFail($id);

        // Render view with product
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     *
     * @param string $id
     * @return View
     */
    public function edit(string $id): View
    {
        // Get product by ID
        $product = Product::findOrFail($id);

        // Render view with product
        return view('products.edit', compact('product'));
    }

    /**
     * Update the specified product in storage.
     *
     * @param Request $request
     * @param string $id
     * @return RedirectResponse
     */
    public function update(Request $request, string $id): RedirectResponse
    {
        // Validate form
        $request->validate([
            'image'       => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'title'       => 'required|min:5',
            'description' => 'required|min:10',
            'price'       => 'required|numeric',
            'stock'       => 'required|numeric',
        ]);

        $product = Product::findOrFail($id);

        // Check if image is uploaded
        if ($request->hasFile('image')) {
            // Upload new image
            $image = $request->file('image');
            $image->storeAs('public/products', $image->hashName());

            // Delete old image
            if ($product->image) {
                Storage::delete('public/products/' . $product->image);
            }

            // Update product with new image
            $product->update([
                'image'       => $image->hashName(),
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
            ]);
        } else {
            // Update product without image
            $product->update([
                'title'       => $request->title,
                'description' => $request->description,
                'price'       => $request->price,
                'stock'       => $request->stock,
            ]);
        }

        // Redirect to index
        return redirect()->route('products.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }
    public function destroy($id): RedirectResponse
        {
        //get product by ID
        $product = Product::findOrFail($id);
        //delete image
        Storage::delete('public/products/'. $product->image);
        //delete product
        $product->delete();
        //redirect to index
        return redirect()->route('products.index')->with(['success' =>
        'Data Berhasil Dihapus!']);
        }
}