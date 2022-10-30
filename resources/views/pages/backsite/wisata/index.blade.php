@extends('layouts.default')
@section('title', 'Wisata')
@section('content')


    {{-- error --}}
    @if ($errors->any())
        <div class="alert bg-danger alert-dismissible mb-2" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>

            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- breadcumb --}}
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
            <h3 class="content-header-title mb-0 d-inline-block">Wisata</h3>
            <div class="row breadcrumbs-top d-inline-block">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">Dashboard</li>
                        <li class="breadcrumb-item active">Wisata</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    {{-- table card --}}
    {{-- @can('user_table') --}}
    <div class="content-body">
        <section id="table-home">
            <!-- Zero configuration table -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">List Wisata</h4>
                            <a href="{{ route('backsite.wisata.create') }}" class="btn btn-primary mt-1">Tambah Wisata</a>
                            <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                            <div class="heading-elements">
                                <ul class="list-inline mb-0">
                                    <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                    <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    <!-- <li><a data-action="close"><i class="ft-x"></i></a></li> -->
                                </ul>
                            </div>
                        </div>

                        <div class="card-content collapse show">
                            <div class="card-body card-dashboard">

                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered text-inputs-searching default-table">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Name</th>
                                                <th>Thumbnail</th>
                                                <th>ACTION</th>

                                                <th style="text-align:center; width:150px;">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($wisata as $key => $wisata_item)
                                                <tr data-entry-id="{{ $wisata_item->id }}">
                                                    <td>{{ $loop->iteration }}
                                                    </td>
                                                    <td>{{ $wisata_item->name ?? '' }}</td>
                                                    <td>
                                                        <img src="{{ asset('storage/' . $wisata_item->thumbnail) }}"
                                                            alt="" style="width: 100px;">
                                                    </td>
                                                    <td>
                                                        @foreach ($wisata_item->gambar_wisata as $key => $value)
                                                            <div class="col-6 pb-3">
                                                                <img src="{{ asset($value->gambar) }}" class="img-fluid"
                                                                    style="width: 100px; height: 100; object-fit:cover;"
                                                                    alt="" />
                                                            </div>
                                                        @endforeach
                                                    </td>



                                                    <td class="text-center">

                                                        <div class="btn-group mr-1 mb-1">
                                                            {{-- @can('user_show', 'user_edits', 'user_delete') --}}
                                                            <button type="button"
                                                                class="btn btn-info btn-sm dropdown-toggle"
                                                                data-toggle="dropdown" aria-haspopup="true"
                                                                aria-expanded="false">Action</button>
                                                            {{-- @endcan --}}
                                                            <div class="dropdown-menu">
                                                                {{-- @can('user_show') --}}
                                                                <a href="#mymodal" data-remote="#" data-toggle="modal"
                                                                    data-target="#mymodal" data-title="User Detail"
                                                                    class="dropdown-item">
                                                                    Show
                                                                </a>
                                                                {{-- @endcan --}}
                                                                {{-- @can('user_edit') --}}
                                                                <a class="dropdown-item" href="#">
                                                                    Edit
                                                                </a>
                                                                {{-- @endcan --}}
                                                                {{-- @can('user_delete') --}}
                                                                <form action="#" method="POST"
                                                                    onsubmit="return confirm('Are you sure want to delete this data ?');">
                                                                    <input type="hidden" name="_method" value="DELETE">
                                                                    <input type="hidden" name="_token"
                                                                        value="{{ csrf_token() }}">
                                                                    <input type="submit" class="dropdown-item"
                                                                        value="Delete">
                                                                </form>
                                                                {{-- @endcan --}}
                                                            </div>
                                                        </div>

                                                    </td>

                                                </tr>
                                            @empty
                                                not found
                                            @endforelse
                                        </tbody>
                                        <tfoot>

                                        </tfoot>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    {{-- @endcan --}}

    </div>
    </div>

    <!-- END: Content-->
@endsection
