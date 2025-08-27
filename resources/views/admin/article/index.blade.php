<x-app-layout>
    <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header d-flex justify-content-between align-items-center">
                    <h4>Articles</h4>
                    <a href="{{ route('admin.article.create') }}" class="btn btn-primary">Add new</a>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              #
                            </th>
                            <th>Title</th>
                            <th>Image</th>
                            <th>Views</th>
                            <th>Status</th>
                          </tr>
                        </thead>
                        <tbody>
                         @foreach ($articles as $i => $article)
                          <tr>
                            <td>{{ $i + 1 }}</td>
                            <td>{{$article->title}}</td>

                            <td><img height="80" src="{{ asset($article->logo) }}" alt="{{ $article->name }}" ></td>
                            {{-- <td>{{$article->image}}</td> --}}

                            <td>{{$article->views}}</td>

                            <td>{{$article->status}}</td>

                            <td>
                              <a href="{{ route('admin.article.edit', $article->id) }}" class="btn btn-warning">Edit</a>
                              <form action="{{ route('admin.article.destroy', $article->id) }}" method="post" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>
                          </tr>

                         @endforeach


                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
</x-app-layout>
