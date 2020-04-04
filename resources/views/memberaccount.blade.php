@extends('layouts.app')

@section('content')
<section class="bg-trans">
    <div class="container">
        
        <div class="row">
            
            <div class="col-md-12">
                <div class="gym-name-stats mb-3">
                    <nav class="nav nav-pills">
                        <a class="nav-link rounded-0 border border-primary active"  href="#subscriptions" aria-selected="true">Subscriptions</a>
                        <a class="nav-link rounded-0 border border-primary"  href="{{ route('student_details') }}">Account Details</a>
                        <a class="nav-link rounded-0 border border-primary" href="#">Favorite Videos</a>
                    </nav>
                </div>
                <div class="subscriptions" id="subscriptions">
                    <p><a href="{{ route('student_account') }}">My Account</a> <i class="fas fa-angle-right"></i> Subscriptions</p>
                    <h2 class="page-sub-title">My Subscriptions</h2>
                    <a href="{{ route('add_gym') }}" class="btn btn-primary rounded-0">Add Gym</a>
                    <div class="table-responsive">
                        <table class="table table-striped dtBasicExample m-table" width="100%">
                            <thead>
                                <tr>
                                    <th scope="col">Gym Name</th>
                                    <th scope="col">Gym Owner</th>
                                    <th scope="col">Videos</th>
                                    <th scope="col">Latest Entry</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($members->sortByDesc('updated_at') as $key => $member)
                                <tr>
                                    <td scope="row">
                                        <span class="m-title">Gym Name: </span>
                                        <span class="m-data"><a href="{{ route('view_gym', ['gym_id'=>$member->id]) }}">{{ $member -> gym_name }}</a></span>
                                    </td>
                                    <td>
                                        <span class="m-title">Gym Owner: </span>
                                        <span class="m-data">{{ $member -> owner -> first_name}} {{ $member -> owner -> last_name}}</span>
                                    </td>
                                    <td style="padding-left:28px;">
                                        <span class="m-title">Videos: </span>
                                        <span class="m-data">{{ $member -> videos->where('status', 1)->count() }}</span>
                                    </td>
                                    <td>
                                        <span class="m-title">Latest Entry: </span>
                                        <span class="m-data">{{ $member -> updated_at->format('m/d/Y g:i A') }}</span>
                                    </td>
                                    <td>
                                        <span class="m-title">Action: </span>
                                        <span class="m-data"><a href="{{route('request_cancel', ['gym_id'=>$member->id])}}" class="text-danger calcel-request" data-toggle="tooltip" data-placement="top" title="Cancel Request"><i class="fas fa-trash"></i></a></span>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>                
            </div>

        </div><!-- //.row -->

    </div><!-- //.container -->
</section>
<!-- <section class="bg-white">
    <div class="container">
        
        

    </div>
</section> -->
<script>
		jQuery(document).ready(function(){
			$('.calcel-request').click(function(e){
				
				var r = confirm("Are you sure cancel this?");
				if(r == true){
					return;
				}else{
					e.preventDefault();
				}
            });
            var table = $('.dtBasicExample').DataTable({
                "bJQueryUI": true,
                "sPaginationType": "full_numbers",
                "bPaginate": true,
                "bFilter": true,
                "bSort": true,
                "aaSorting": [
                [3, "desc"]
                ],
                "aoColumnDefs": [{
                "bSortable": true,
                "aTargets": [0]
                }, {
                "bSortable": true,
                "aTargets": [1]
                }, {
                "bSortable": true,
                "aTargets": [2]
                }, {
                "bSortable": true,
                "aTargets": [3]
                }, {
                "bSortable": false,
                "aTargets": [4]
                }],
            });
		});
	</script>
@endsection