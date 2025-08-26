<x-app-layout>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Category Create</h4>
                    <a href="{{ route('admin.category.index') }}" class="btn btn-primary">Go Back</a>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.category.store')}}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div class="row">
                            <div class="my-3 col-6">
                                <label for="title">Title <span class="text-danger">*</span></label>
                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" required>
                                @error('title')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-3 col-6">
                                <label for="slug">Slug <span class="text-danger">*</span></label>
                                <input type="text" id="slug" name="slug" class="form-control" value="{{ old('slug') }}" required>
                                @error('slug')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>



                            <div class="my-3 col-12">
                                <button type="submit" class="btn btn-success">Save Record</button>
                            </div>

                        </div>

                    </form>

                  </div>
                </div>
              </div>
            </div>
</x-app-layout>
