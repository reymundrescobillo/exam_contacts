@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">General Contacts</div>

                <div class="card-body">
                    @if (count($contacts))
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                            <th scope="col">Actions</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($contacts as $c)
                                <tr>
                                    <th scope="row">{{ $c->id }}</th>
                                    <td>{{ $c->name }}</td>
                                    <td>{{ $c->contact }}</td>
                                    <td><button type="button" data-url="{{ route('pc.add', ['id' => $c->id])}}" class="btn btn-sm btn-primary add">ADD</button></td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                    {!! $contacts->links() !!} 
                    @else
                    <p class="text-center">There is no contacts yet please run the seeder</p>
                    @endif
                  
                   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Personal Contacts</div>

                <div class="card-body">
                    @if (count($pc)) 
                    <table class="table" id="pc">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Contact Number</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($pc as $p)
                              <tr>
                                <th scope="row">{{ $p->contact_id }}</th>
                                <td>{{ $p->gc->name }}</td>
                                <td>{{ $p->gc->contact }}</td>
                              </tr>
                            @endforeach
                          
                        
                        </tbody>
                    </table>
                    @else
                    <p class="text-center">There is no contacts yet please add using the add button in general contacts section</p>
                    @endif
                
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(() => {
        $('.add').click(function() {
            let url = $(this).data('url');
            if (url) {
                $.ajax({
                    url: url,
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        if (res.status == false) {
                            alert(res.msg);
                        } else { 
                            alert(res.msg);
                            window.location.reload();
                        }
                    }
                }); 
            }

        });
    });
</script>
@endsection
