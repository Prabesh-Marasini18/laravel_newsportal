<x-app-layout>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Company Edit</h4>
                    <a href="{{ route('admin.company.index') }}" class="btn btn-primary">Go Back</a>
                  </div>
                  <div class="card-body">
                    <form action="{{route('admin.company.update', $company->id)}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="row">
                            <div class="my-3 col-6">
                                <label for="name">Name <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="form-control" value="{{ $company->name }}" required>
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-3 col-6">
                                <label for="email">Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="form-control" value="{{ $company->email }}" required>
                                @error('email')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-3 col-6">
                                <label for="phone">Phone <span class="text-danger">*</span></label>
                                <input type="text" id="phone" name="phone" class="form-control" value="{{ $company->phone }}" required>
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>

                            <div class="my-3 col-6">
                                <label for="facebook">Facebook</label>
                                <input type="text" id="facebook" name="facebook" class="form-control" value="{{ $company->facebook }}">
                            </div>

                            <div class="my-3 col-6">
                                <label for="instagram">Instagram</label>
                                <input type="text" id="instagram" name="instagram" class="form-control" value="{{ $company->instagram }}">
                            </div>

                            <div class="my-3 col-6">
                                <label for="logo">Logo <span class="text-danger">*</span></label>
                                <input type="file" id="logo" name="logo" class="form-control" >
                                <img height="80" src="{{ asset($company->logo) }}" alt="{{ $company->name }}" >

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
