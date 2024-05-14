<div class="modal fade" id="add-news_modal" tabindex="-1" aria-labelledby="add-news_modal" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Add News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-add_news" enctype="multipart/form-data">
                    @csrf
                    <div class="form-modal mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                            name="name" placeholder="Enter name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-modal mb-3">
                        <label for="tagline">Tagline</label>
                        <input type="text" class="form-control @error('tagline') is-invalid @enderror" id="tagline"
                            name="tagline" placeholder="Enter tagline">
                        @error('tagline')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <label for="categories">Categories</label>
                    <div class="form-modal mb-3 d-flex justify-content-around">
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="category{{ $category->id }}"
                                    name="categories[]" value="{{ $category->id }}">
                                <label class="badge bg-dark p-2 fw-bold" for="category{{ $category->id }}">
                                    {{ $category->name }}
                                </label>
                            </div>
                        @endforeach
                        @error('categories')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-modal mb-3">
                        <label for="description">Description</label>
                        <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
                            rows="4" placeholder="Enter description"></textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-modal">
                        <label for="image">Image</label>
                        <input type="file" class="form-control-file @error('image') is-invalid @enderror"
                            id="image" name="image" accept="image/*"
                            onchange="previewImage(this, 'image-preview', 'image-preview-container')">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-modal d-none mt-2" id="image-preview-container">
                        <img id="image-preview" src="#" alt="Image Preview"
                            style="max-width: 100%; max-height: 200px;">
                    </div>


                    <div class="w-100 d-flex justify-content-end gap-2 mt-3">
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn mr-3 btn-light"
                            id="cancel-button">Cancel</button>
                        <button type="submit" id="add-submit-button" class="btn btn-primary">Add News</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
