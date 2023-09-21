<!-- Button trigger modal -->
<button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#updatProduct{{ $product->id }}">
    <i class="fa-solid fa-pen-to-square"></i>
</button>

<!-- Modal -->
<div class="modal fade" id="updatProduct{{ $product->id }}" tabindex="-1"
    aria-labelledby="updatProduct{{ $product->id }}Label" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="updatProduct{{ $product->id }}Label">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action={{ route('product.update', $product) }} method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div>
                        <label for="image">Product Image:</label>
                        <input class="form-control" type="file" name="image" id="image">
                    </div>

                    <div>
                        <label for="name">Product Name:</label>
                        <input class="form-control" type="text" name="name" id="name"
                            value="{{ old('name', $product->name) }}" required>
                    </div>

                    <div>
                        <label for="stock">Product Stock: </label>
                        <input type="number" name="stock" id="stock" required
                            value="{{ old('stock', $product->stock) }}" class="form-control">
                    </div>
                    <div>
                        <label for="price">Product Price: </label>
                        <input type="number" name="price" id="price" required
                            value="{{ old('price', $product->price) }}" class="form-control">
                    </div>
                    <div>
                        <label for="category">Product Stock: </label>
                        <select required class="form-select" name="category" id="category">
                            <option disabled selected>Choose a Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->category }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label for="desc">Product Description:</label>
                        <textarea required class="form-control" name="desc" id="desc" cols="30" rows="5">{{ $product->desc }}</textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
