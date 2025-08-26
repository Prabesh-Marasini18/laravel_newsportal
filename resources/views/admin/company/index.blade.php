<x-app-layout>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Company</h4>
                    @if (!$company)
                        <a href="{{ route('admin.company.create') }}" class="btn btn-primary">Add</a>
                    @endif
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Logo</th>
                            <th>Action</th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($company)
                          <tr>
                            <td>1</td>
                            <td>{{$company->name}}</td>
                            <td>{{$company->email}}</td>
                            <td>{{$company->phone}}</td>
                            <td><img height="80" src="{{ asset($company->logo) }}" alt="{{ $company->name }}" ></td>
                            <td>
                              <a href="{{ route('admin.company.edit', $company->id) }}" class="btn btn-warning">Edit</a>
                              <form action="{{ route('admin.company.destroy', $company->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>

                          @endif

                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</x-app-layout>
