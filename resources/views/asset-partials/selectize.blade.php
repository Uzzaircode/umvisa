@section('selectize-js')
<script  src="{{asset('js/vendors/selectize.min.js')}}"></script>
<script>
   $('.selectize').selectize({
					create: true,
					sortField: {
						field: 'text',
						direction: 'asc'
					},
					dropdownParent: 'body'
				});
</script>

@endsection