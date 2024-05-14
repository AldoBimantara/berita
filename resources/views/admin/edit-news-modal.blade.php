<div class="modal fade" id="edit-news_modal" tabindex="-1" aria-labelledby="edit-news_modal" aria-hidden="true"
    data-backdrop="static">
    <div class="modal-dialog modal-lg">
        <div class="modal-content p-3">
            <div class="modal-header">
                <h5 class="modal-title">Edit News</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" id="form-edit_news" enctype="multipart/form-data">
                    @csrf
                     @method('PUT')
                    <div class="form-modal mb-3">
                        <label for="name">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="edit_name"
                            name="edit_name" placeholder="Enter name">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>
                    <div class="form-modal mb-3">
                        <label for="tagline">Tagline</label>
                        <input type="text" class="form-control @error('tagline') is-invalid @enderror"
                            id="edit_tagline" name="edit_tagline" placeholder="Enter tagline">
                        @error('tagline')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <label for="categories">Categories</label>
                    <div class="form-modal d-flex justify-content-around">
                        @foreach ($categories as $category)
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="edit_category{{ $category->id }}"
                                    name="edit_categories[]" value="{{ $category->id }}">
                                <label class="badge bg-dark p-2 fw-bold" for="edit_category{{ $category->id }}">
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
                        <textarea class="form-control @error('description') is-invalid @enderror" id="edit_description" name="edit_description"
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
                            id="edit_image" name="edit_image" accept="image/*"
                            onchange="previewImage(this, 'edit-image-preview', 'edit-image-preview-container')">
                        @error('image')
                            <span class="invalid-feedback" role="alert">
                                {{ $message }}
                            </span>
                        @enderror
                    </div>

                    <div class="form-modal d-none mt-2" id="edit-image-preview-container">
                        <img id="edit-image-preview" src="#" alt="Image Preview"
                            style="max-width: 100%; max-height: 200px;">
                    </div>

                    <div class="w-100 d-flex justify-content-start mt-3">
                        <button type="submit" id="edit-submit-button" class="btn btn-primary">Save
                            Changes</button>
                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn btn-light"
                            id="edit-cancel_button">Cancel</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
