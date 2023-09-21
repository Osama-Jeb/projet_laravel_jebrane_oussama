<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#productCreate">
    Create Product
</button>

<!-- Modal -->
<div class="modal fade" id="productCreate" tabindex="-1" aria-labelledby="productCreateLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="productCreateLabel">Modal title</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{route('product.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div>
                        <label for="image">Product Image:</label>
                        <input class="form-control" type="file" name="image" id="image" required>
                    </div>

                    <div>
                        <label for="name">Product Name:</label>
                        <input class="form-control" type="text" name="name" id="name" required>
                    </div>

                    <div>
                        <label for="stock">Product Stock: </label>
                        <input type="number" name="stock" id="stock" required class="form-control">
                    </div>
                    <div>
                        <label for="price">Product Price: </label>
                        <input type="number" name="price" id="price" required class="form-control">
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
                        <textarea class="form-control" name="desc" id="desc" cols="30" rows="5" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success mt-3">Add Product</button>
                </form>
            </div>
        </div>
    </div>
</div>
