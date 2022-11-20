@extends('layouts.app')
@section('content')
    @include('global.topnav')
    @include('global.sidemenu')
    <div class="content-page">
        <div class="content">
            <div class="container-fluid">
                <div class="page-title-box">
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">iPOS Concept</a></li>
                        <li class="breadcrumb-item active">Activity Logs</li>
                    </ol>
                    <h4 class="page-title">Activity Logs</h4>
                </div>
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card-box">
                            <form class="form-inline mb-3">
                                <div class="form-group">
                                    <select id="storeID" class="form-control">
                                        <option value="">-- Select Store --</option>
                                        @foreach(App\Store::all() as $store)
                                        <option value="{{ $store->id }}">{{ $store->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mx-sm-1">
                                    <input type="hidden" id="startDate" value="{{ $today }}"/>
                                    <input type="hidden" id="endDate" value="{{ $today }}"/>
                                    <input class="form-control input-daterange-datepicker" id="daterange" type="text"value="{{ $today }} - {{ $today }}"/>
                                </div>
                            </form>
                            <div class="table-responsive" data-pattern="priority-columns">
                                <div class="sticky-table-header">
                                    <table id="log_table" class="table table-bordered dataTable no-footer table-striped">
                                        <thead>
                                            <tr class="text-center">
                                                <th>Store</th>
                                                <th>Module</th>
                                                <th>Category</th>
                                                <th>Type</th>
                                                <th>User</th>
                                                <th>Date</th>
                                            </tr>
                                        </thead>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
<script type="text/javascript">

    $(document).ready(function() {
        
        $('.input-daterange-datepicker').daterangepicker({
            locale: {
                format: 'YYYY-MM-DD'
            },
            buttonClasses: ['btn', 'btn-sm'],
            applyClass: 'btn-success',
            cancelClass: 'btn-light',
        });        

        $('#daterange').on('apply.daterangepicker', function(ev, picker) {
            var start = picker.startDate.format('YYYY-MM-DD');
            var end = picker.endDate.format('YYYY-MM-DD');

            $('#startDate').val(start);
            $('#endDate').val(end);
            
            dt.draw();
        });

        var dt = $('#log_table').DataTable({
            pagingType: "full_numbers",
            processing: true,
            serverSide: true,
            ajax: {
                url: "{{ route('logList') }}",
                data: function(data) {
                    var storeID = $('#storeID').val();
                    var startDate = $('#startDate').val();
                    var endDate = $('#endDate').val();

                    data.searchByStoreID = storeID;
                    data.searchByDate1 = startDate;
                    data.searchByDate2 = endDate;
                }
            },
            columns: [
                { data: "storename" },
                { data: "module" },
                { data: "category" },
                { data: "type" },
                { data: "name" },
                { data: "created_at" },
            ],
            columnDefs: [
                { className: 'text-center', targets: [0],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                { className: 'text-center', targets: [1],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                { className: 'text-center', targets: [2],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                { className: 'text-center', targets: [3],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                { className: 'text-center', targets: [4],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
                { className: 'text-center', targets: [5],
                    render: function(data, type, full, meta) {
                        return data;
                    }
                },
            ]

        });

        $('#storeID').change(function() {
            dt.draw();
        })
    });
</script>
@endpush